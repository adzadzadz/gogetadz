<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<style>
.block1 {
    position:relative;;
	width:110%;
	margin-top:0%;
}
.block2 {
    position:relative;
	//margin-top:22%;
	width:110%;
}
.block3 {
    position:relative;
	margin-top:0%;
	width:110%;
}
.block4 {
    position:relative;
	//margin-top:40%;
	width:110%;
}
.container{
	//width:1000px;
	position:relative;
	top:%;
	left:-3%;
    //overflow: scroll;
}
</style>
<div class="container">
<h4 style="margin-top:2px;margin-left:4%">Ads clicked Details</h1>
<div class="block1" >
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Ads Clicked</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= $clickCount ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= $totalIncome ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total clicked Earnings</span>
        <span class="info-box-number"style="text-align:center;line-height:30px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= $totalIncome ?></span>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
      </div>
    </div>
  </div>
</section>
</div>

<h4 style="margin-top:12%;margin-left:4%">Binary Statement</h1>
<div class="block2" style="float:left">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Sign-up Bonus</span>
        <span class="info-box-number"style="text-align:center;line-height:40px"></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number"style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
   
</section>
</div>
<div class="block3"style="float:left">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Direct referrals</span>
        <span class="info-box-number"style="text-align:center;line-height:40px"></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number"style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> </span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
   
</section>
</div>
 
<div class="block4"style="float:left"> 
 <section> <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pairing Bonus</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"></span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number"style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Binary Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:30px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> </span>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
      </div>
    </div>
  </div>
</section>
</div>
</div>