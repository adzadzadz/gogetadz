<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Withdrawal Requests';
?>

<section class="row">
  <div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($coinsPh, 'value')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</section>

<section id="requests" class="row">
  <div class="col-lg-8 col-md-10">
    <h3>Please wait while we process your pending requests.</h3>
    <table class="table table-condensed table-striped">
      <tr>
        <!--<td>Type</td>-->
        <td>Amount</td>
        <td>Date / Time</td>
        <td>Status</td>
      </tr>
      <?php foreach ($requests as $request): ?>
        <tr>
          <!--<td><?= $request->type ?></td>-->
          <td><?= Yii::$app->appConfig->getCurrencySymbol() . " " . $request->value ?></td>
          <td><?= date('Y-m-d H:i:s', $request->created_at) ?></td>
          <td><?= $request->status == 10 ? 'Completed' : 'Pending' ?></td>
        </tr>        
      <?php endforeach ?>
    </table>
  </div>
</section>
