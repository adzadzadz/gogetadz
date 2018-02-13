<?php
/* @var $this yii\web\View */
$this->title = 'Withdrawal Requests';
?>


<h3>Please wait while we process your pending requests.</h3>

<section id="requests">
  <div class="col-md-8">
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
