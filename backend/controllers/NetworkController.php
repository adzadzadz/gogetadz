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
        $id = $id ? $id : Yii::$app->user->id;
        $network = UserNetwork::getBinary($id);
        // return var_dump($network);
        return $this->render('@backend/views/user/binarytree', [
            'network' => $network,
            'id'      => $id
        ]);
    }

    public function actionUnilevelTree($id = null)
    {
        $id = $id ? $id : Yii::$app->user->id;
        $user = UserNetwork::getUnilevel($id);

        // return print_r($user);
        return $this->render('@backend/views/user/unileveltree', [
            'user' => $user,
            'id'      => $id
        ]);
    }

    public function actionUnilevelStatement($id = null)
    {
        $id = $id ? $id : Yii::$app->user->id;
        $network = UserNetwork::getUnilevelStatement($id);

        return $this->render('@backend/views/user/unilevelstatement', [
            'network' => $network
        ]);
    }
}