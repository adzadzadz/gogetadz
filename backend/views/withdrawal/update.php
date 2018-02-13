<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserWithdrawal */

$this->title = 'Update User Withdrawal: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'User Withdrawals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-withdrawal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
