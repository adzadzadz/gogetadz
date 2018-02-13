<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserNetwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-network-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sponsor')->textInput() ?>

    <?= $form->field($model, 'placement')->textInput() ?>

    <?= $form->field($model, 'position')->dropDownList([0 => 'left', 1 => 'right'], []); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
