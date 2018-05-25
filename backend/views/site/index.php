<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
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
	/*margin-top:22%;*/
	width:110%;
}
.block3 {
    position:relative;
	margin-top:0%;
	width:110%;
}
.block4 {
    position:relative;
	/*margin-top:40%;*/
	width:110%;
}
.container{
	/*width:1000px;*/
	position:relative;
	top:%;
	left:-3%;
  /*overflow: scroll;*/
}

</style>
<section id="update-earned-totals">
  <a href="<?= \yii\helpers\Url::toRoute(['/withdrawal/update-earnings']) ?>"><button class="btn btn-primary btn-lg">UPDATE EARNINGS</button></a>
</section><br><br>

<div class="container">
<h4 style="margin-top:2px;margin-left:4%;">Ads clicked Details</h4>
<div class="block1">
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
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= $clickCount *.001?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <div>
          Earned Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= isset($earned['ad_clicks']->value) ? $earned['ad_clicks']->value : 0 ?>
        </div>
        <div>
          Withdraw Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= \app\models\UserWithdrawal::getPrevRequests('ad_clicks') ?>
        </div>
        <div>
          Current Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> 
          <?php 

              $adCalcTotal = isset($earned['ad_clicks']->value) ? $earned['ad_clicks']->value : 0;
              echo $adCalcTotal - \app\models\UserWithdrawal::getPrevRequests('ad_clicks');

          ?>
        </div>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request', 'type' => 'ad_clicks']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
      </div>
    </div>
  </div>
</section>
</div>

<div style="margin-top:2%;float:left;margin-left:4%;width:1000%;"><h4>Binary Statement</h4></div>
<div class="block2" style="float:left">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Sign-up Bonus</span>
        <span class="info-box-number" style="text-align:center;line-height:40px">1</span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= Yii::$app->appConfig->registrationEarnings ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
   
</section>
</div>

<div class="block2" style="float:left">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Leverage Bonus</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"><??></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <??></span>
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
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= $directReferralsCount ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= $directReferrals ?> </span>
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
        <span class="info-box-text"></span>
        <span class="info-box-text">Pairing</span>
        <span class="info-box-number" style="text-align:center;line-height:40px">
          <?= min($network['left']['count'], $network['right']['count']) ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"> <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= min($network['left']['count'], $network['right']['count']) * 1; ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <div>
          Earned Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= isset($earned['binary']->value) ? $earned['binary']->value : 0 ?>
        </div>
        <div>
          Withdraw Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= \app\models\UserWithdrawal::getPrevRequests('binary') ?>
        </div>
        <div>
          Current Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> 
          <?php 

              $binaryCalcTotal = isset($earned['binary']->value) ? $earned['binary']->value : 0;
              echo $binaryCalcTotal - \app\models\UserWithdrawal::getPrevRequests('binary');

          ?>
        </div>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request', 'type' => 'binary']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
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
        <span class="info-box-text"></span>
        <span class="info-box-text">Table of Exit<br>Binary</span>
        <span class="info-box-number" style="text-align:center;line-height:40px">
          <? ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"> <?= Yii::$app->appConfig->getCurrencySymbol() ?> <? ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <div>
          Earned Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= isset($earned['binary']->value) ? $earned['binary']->value : 0 ?>
        </div>
        <div>
          Withdraw Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= \app\models\UserWithdrawal::getPrevRequests('binary') ?>
        </div>
        <div>
          Current Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> 
          <?php 

              $binaryCalcTotal = isset($earned['binary']->value) ? $earned['binary']->value : 0;
              echo $binaryCalcTotal - \app\models\UserWithdrawal::getPrevRequests('binary');

          ?>
        </div>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request', 'type' => 'binary']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
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
        <span class="info-box-text"></span>
        <span class="info-box-text">Table of Exit<br>MOnoline</span>
        <span class="info-box-number" style="text-align:center;line-height:40px">
          <? ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"> <?= Yii::$app->appConfig->getCurrencySymbol() ?> <? ?></span>
        <!--<a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <div>
          Earned Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= isset($earned['binary']->value) ? $earned['binary']->value : 0 ?>
        </div>
        <div>
          Withdraw Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> <?= \app\models\UserWithdrawal::getPrevRequests('binary') ?>
        </div>
        <div>
          Current Total: <?= Yii::$app->appConfig->getCurrencySymbol() ?> 
          <?php 

              $binaryCalcTotal = isset($earned['binary']->value) ? $earned['binary']->value : 0;
              echo $binaryCalcTotal - \app\models\UserWithdrawal::getPrevRequests('binary');

          ?>
        </div>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request', 'type' => 'binary']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
      </div>
    </div>
  </div>
</section>
</div>

<div style="margin-top:2%;float:left;margin-left:4%;width:1000%;"><h4>Unilevel Statement</h4></div>
<div class="block3" style="float:left">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">PSV</span>
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

<div class="block2"style="float:left"> 
 <section>
 <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">GSV</span>
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
        <span class="info-box-text">Total Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:30px">$ </span>
        <a href="<?= \yii\helpers\Url::to(['/withdrawal/request']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>
      </div>
    </div>
  </div>
</section>
</div>
</div>

