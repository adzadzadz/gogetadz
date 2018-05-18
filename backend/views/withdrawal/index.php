<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserWithdrawalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Withdrawals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-withdrawal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Withdrawal Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],           
                'user_id',
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function($model) {
                    return $model->profile->name;
                }
            ],
            [
                'attribute' => 'COINS PH Wallet Address',
                'format' => 'html',
                'value' => function($model) {
                    return $model->coins !== null ? $model->coins->value : 'NOT SET';
                }
            ],
            'value',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($model) {
                    return $model->status == 10 ? "COMPLETED" : "PENDING";
                }
            ],
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
