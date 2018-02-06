<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserNetwork */

$this->title = 'Create User Network';
$this->params['breadcrumbs'][] = ['label' => 'User Networks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-network-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
