<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPv */

$this->title = 'Update User Pv: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'User Pvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-pv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
