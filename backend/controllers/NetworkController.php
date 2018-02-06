<?php 

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\UserNetwork;

class NetworkController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['binary-tree'],
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

    public function actionBinaryTree($id = null)
    {
        // return var_dump(\app\models\User::find()->where(['user_id' => 1])->joinWith('profile', 'network')->one());
        $id = $id ? $id : Yii::$app->user->id;
        $network = UserNetwork::getBinary($id);
        return $this->render('@backend/views/user/binarytree', [
            'network' => $network,
            'id'    => $id
        ]);
    }
}