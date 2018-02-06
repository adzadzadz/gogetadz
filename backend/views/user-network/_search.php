<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserNetworkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-network-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'sponsor') ?>

    <?= $form->field($model, 'placement') ?>

    <?= $form->field($model, 'position') ?>

    <?= $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
