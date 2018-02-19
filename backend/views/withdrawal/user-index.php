<?php
/* @var $this yii\web\View */
$this->title = 'Withdrawal Requests';
?>

<section class="row">
  
  <div class="col-md-4">
    <a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-lg btn-primary">
        Widthraw (<?= Yii::$app->appConfig->getCurrencySymbol() ?><?= $totalIncome ?>)
    </a>
  </div>

</section>

<section id="requests" class="row">
  <div class="col-lg-8 col-md-10">
    <h3>Please wait while we process your pending requests.</h3>
    <table class="table table-condensed table-striped">
      <tr>
        <td>Amount</td>
        <td>Date / Time</td>
        <td>Status</td>
      </tr>
      <?php foreach ($requests as $request): ?>
        <tr>
          <td><?= Yii::$app->appConfig->getCurrencySymbol() . " " . $request->value ?></td>
          <td><?= date('Y-m-d H:i:s', $request->created_at) ?></td>
          <td><?= $request->status == 10 ? 'Completed' : 'Pending' ?></td>
        </tr>        
      <?php endforeach ?>
    </table>
  </div>
</section>
