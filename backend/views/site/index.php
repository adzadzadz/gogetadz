<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>


<section>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Ads Clicked</span>
        <span class="info-box-number"><?= $clickCount ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Click Income</span>
        <span class="info-box-number"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= $totalIncome ?></span>
      </div>
    </div>
  </div>

</section>