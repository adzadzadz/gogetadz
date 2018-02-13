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
                        'actions' => ['user-index', 'request'],
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
        return $this->render('user-index', [
            'requests' => $requests
        ]);
    }

    /**
     * Ads Earning Withdrawal flow
     *  - User clicks ads (earn per click)
     *  - User hits withdrawal Request
     *    # Add all ads earnings to the user_earnings table
     *    # Save currently added earning to history
     *    # Create withdrawal request
     * 
     * @return yii\web\View
     */
    public function actionRequest()
    {
        // Set earnings
        if ($earnings = UserEarnings::addEarnings($type = 'ad_clicks', $amount = UserEarnings::calcEarned(), $user_id = Yii::$app->user->id)) {
            // Request withdrawal
            $withdrawal = new UserWithdrawal;
            $withdrawal->type = 'full';
            $withdrawal->user_id = $earnings->user_id;
            $withdrawal->value = $earnings->value;
            $withdrawal->status = 6;
            $withdrawal->save();
        }

        return $this->redirect('user-index');
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
