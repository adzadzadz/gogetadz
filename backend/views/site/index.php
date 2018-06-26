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
<section style="font:bold; font-size:20px;background-color: #e6e6e6;padding:5px;"><span>Total Current Members:<?= $member_count1 + $member_count2 ?></span></section><br>

<section id="update-earned-totals">
  <a href="<?= \yii\helpers\Url::toRoute(['/withdrawal/update-earnings']) ?>"><button class="btn btn-primary btn-lg">UPDATE EARNINGS</button></a><br>
</section>

<div style="margin-top:2%;float:left;margin-left:4%;width:1000%;"><h4>Table of Exit Statement</h4></div>
<div class="block3"style="float:left">
<section>  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Leverage</span>
        <span class="info-box-number" style="text-align:center;line-height:40px">
          <?= Yii::$app->appConfig->getCurrencySymbol() ?><?= (($member_count1 -16)*50)+(($member_count2)*10)?></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px"><?= Yii::$app->appConfig->getCurrencySymbol() ?> <?/*= (($member_count1-16)*5+($member_count2)*1)/($member_count1+$member_count2) */?> </span>
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
<section> 
 <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"></span>
        <span class="info-box-text">Table 1</span>
        <span class="info-box-number" style="text-align:center;line-height:20px; font-size: 18px;">

           <?php	   
if ($network['left']['count'] + $network['right']['count']  == null && $table_count==null){
	echo 0;
}else if ($network['left']['count'] + $network['right']['count'] < 6 && $table_count == null) {
    echo $network['left']['count'] + $network['right']['count'];
}else if ($network['left']['count'] + $network['right']['count'] < 6 && $table_count->table == null) {
    echo $network['left']['count'] + $network['right']['count'];
}else if ($network['left']['count'] + $network['right']['count'] == 6 ) {
    echo "Exit<br>Congratulations" ;
}else if ($table_count->table == 1){
	echo "Exit<br>Congratulations " ;
}else if ($table_count->table == 2){
	echo "Exit<br>Congratulations " ;
}else {
    echo $network['left']['count'] + $network['right']['count'];
}

?>
          
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:40px; font-size: 18px;"><?= Yii::$app->appConfig->getCurrencySymbol() ?> 		
          <?php
if ($network['left']['count'] + $network['right']['count']  == null && $table_count==null){
	echo 0;
}else if ($network['left']['count'] + $network['right']['count']  == null && $table_count->table==1){
	echo 10;
}else if ($network['left']['count'] + $network['right']['count'] == 6 ) {
  echo 10;
}else if ($table_count == null){
	echo 0;
}else if ($table_count->table == 1){
	echo 10;
}else if ($table_count->table == 2){
	echo 10;
}
else {
  echo 0 ;
}

?></span>
        
      </div>
    </div>
  </div>
</section>
</div>
<div class="block4"style="float:left"> 
<section> 
 <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-list-ol"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"></span>
        <span class="info-box-text">Table 2</span>
        <span class="info-box-number" style="text-align:center;line-height:20px; font-size: 18px;">

           <?php	   
if ($network['left']['count'] + $network['right']['count']  == null && $table_count==null){
	echo 0;
}else if ($network['left']['count'] + $network['right']['count'] < 6 && $table_count == null) {
    echo 0;
}else if ($network['left']['count'] + $network['right']['count'] < 6 && $table_count->table == 2) {
    echo $network['left']['count'] + $network['right']['count'];
}else if ($network['left']['count'] + $network['right']['count'] < 6 && $table_count->table == 1){
    echo $network['left']['count'] + $network['right']['count'];
}else if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count ==null){
    echo 0 ;
}else if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count->table == 1){                  
		echo "Exit<br>Congratulations" ;
}else if ($network['left']['count'] + $network['right']['count'] < 6 && $table_count->table == 2){
    echo $network['left']['count'] + $network['right']['count'];
}else if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count->table == 0){
    echo 0 ;
}else if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count->table == 2){
    echo "Exit<br>Congratulations" ;
}else {
    echo 0;
}

?>
          
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Earnings</span>
        <span class="info-box-number" style="text-align:center;line-height:4 0px; font-size: 18px;"><?= Yii::$app->appConfig->getCurrencySymbol() ?>        
          <?php

if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count == null) {
  echo 0;
}else if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count->table ==0) {
  echo 0;
} else if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count->table ==1) {
  echo 20;
}else if ($network['left']['count'] + $network['right']['count'] == 6 && $table_count->table ==2) {
  echo 20;
}
 else {
  echo 0 ;
}

?></span>
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
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#demo, #withdrawal {
  text-align: center;
  font-size: 15px;
  font-weight: bold;
  margin-top:0px;
  background-color: #e6e6e6;
  
  padding:1.5px 20px 1.5px;
}

</style>
</head>
<body >

<p id="demo"></p>
<a href="<?= \yii\helpers\Url::to(['/withdrawal/request', 'type' => 'binary']) ?>" >
<p id="withdrawal">withdrawal</p></a>
<script>
// Set the date we're counting down to
var countDownDate = new Date("June 14, 2018 24:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    var withdrawal = document.getElementById("withdrawal");
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
		document.getElementById("demo").style.display = "none";
		withdrawal.style.display = "block";
        
	}else {
        withdrawal.style.display = "none";
    } 
    
}, 1000);
</script>

</body>
</html>
		
        <!--<a href="#" class="btn btn-sm btn-default btn-block">Widthraw</a>
		<a href="<?= \yii\helpers\Url::to(['/withdrawal/request', 'type' => 'binary']) ?>" class="btn btn-sm btn-default btn-block">Widthraw</a>-->
      </div>
    </div>
  </div>
</section>
</div>
</div>

