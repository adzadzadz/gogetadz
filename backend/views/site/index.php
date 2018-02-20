<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<style>
.block1 {
    position: absolute;	
	width:100%;
	
}
.block2 {
    position: absolute;	
	top:35%;
	width:100%;
}
.block3 {
    position: absolute;	
	top:50%;
	width:100%;
}
.block4 {
    position: absolute;	
	top:65%;
	width:100%;
}
</style>
<div class="block1">
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
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= $totalIncome ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Withdraw</span>
        <span class="info-box-number"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= $totalIncome ?></span>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
      </div>
    </div>
  </div>
</section>
</div>

<div class="block2">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Sign-up Bonus</span>
        <span class="info-box-number"></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number"><?= Yii::$app->appConfig->getCurrencySymbol() ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
   
</section>
</div>
<div class="block3">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Direct referrals</span>
        <span class="info-box-number"></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number"><?= Yii::$app->appConfig->getCurrencySymbol() ?> </span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
   
</section>
</div>
 
<div class="block4"> 
 <section> <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pairing Bonus</span>
        <span class="info-box-number"></span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number"><?= Yii::$app->appConfig->getCurrencySymbol() ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Binary Earnings</span>
        <span class="info-box-number"><?= Yii::$app->appConfig->getCurrencySymbol() ?> </span>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
      </div>
    </div>
  </div>
</section>
</div>