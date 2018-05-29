<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserPv */

$this->title = 'Create User Pv';
$this->params['breadcrumbs'][] = ['label' => 'User Pvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-pv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
