<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserWithdrawal */

$this->title = 'Create User Withdrawal';
$this->params['breadcrumbs'][] = ['label' => 'User Withdrawals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-withdrawal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
