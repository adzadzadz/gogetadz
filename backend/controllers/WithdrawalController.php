<?php

namespace backend\controllers;

use Yii;
use app\models\UserWithdrawal;
use app\models\UserWithdrawalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use dektrium\user\filters\AccessRule;
use app\models\UserEarnings;

/**
 * WithdrawalController implements the CRUD actions for UserWithdrawal model.
 */
class WithdrawalController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                    [
                        'actions' => ['user-index', 'request', 'update-earnings'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionUserIndex()
    {
        $requests = UserWithdrawal::findAll(['user_id' => Yii::$app->user->id]);
        $earned = \app\models\UserEarnings::calcEarned();
        
        return $this->render('user-index', [
            'requests' => $requests,
            'totalIncome'   => $earned
        ]);
    }

    /**
     * Ads Earning Withdrawal flow
     *  - User clicks ads (earn per click)
     *  - User hits withdrawal Request
     *    # Add all ads earnings to the user_earnings table
     *    # Save currently added earning to history
     *    # Create withdrawal request
     * @param  String $type can be 'ads_clicks', 'binary', 'unilevel'
     * @return yii\web\View
     */
    public function actionRequest($type)
    {
        $earned = 0;
        if ($type == 'ad_clicks') {
            $userAd = new \app\models\UserAdvertisement;
            $totals = $userAd->getTotals();
            $earned = $totals['income'];
        } elseif ($type == 'binary') {
            $earned = UserEarnings::calcBinaryEarned();
        } else {
            return $this->redirect('user-index');
        }

        $total = $earned - UserWithdrawal::getPrevRequests($type);
        // Set earnings
        if ($total) {
            // Request withdrawal
            $withdrawal = new UserWithdrawal;
            $withdrawal->type = $type;
            $withdrawal->user_id = Yii::$app->user->id;
            $withdrawal->value = $total;
            $withdrawal->status = UserWithdrawal::STATUS_PENDING;
            $withdrawal->save();
        }

        return $this->redirect('user-index');
    }

    public function actionUpdateEarnings()
    {
        UserEarnings::updateEarnings();
        return $this->redirect('/site/index');
    }

    /**
     * Lists all UserWithdrawal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserWithdrawalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserWithdrawal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserWithdrawal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserWithdrawal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserWithdrawal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserWithdrawal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserWithdrawal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserWithdrawal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserWithdrawal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
