<?php 

use yii\helpers\Url;

$this->title = 'Binary Tree';

?>

<style>
  div {
    margin: 0;
    padding: 0;
  }
  .binary-user {
    /*display: inline-block;*/
    padding: 5px;
    /*margin-bottom: 10px;*/
    text-align: center;
    min-height: 100px;
  }
  .id {
    font-weight: bold;
  }
 .level {
    padding: 15px;
    height: 100%;
	margin-left:45%;
	margin-right:33%;
  }
  @media(max-width:700px){
   .level{
	margin-left:45%;
	margin-right:33%;
  }	
  }
  .level0 {
    background: ;
	margin-left:39%;
	margin-right:40%;
  }
  @media(max-width:700px){
   .level0{
	margin-left:40%;
  }	
  }
  .level0:hover {
    color:red;
  }
  .level1 {
    background: ;
	margin-left:30%;
  }
  .level1:hover {
    color:red;
  }
  .gray {
    background: ;
  }
  a.binary-link {
    color: #000;
  }
  a.binary-link:hover {
    /* font-size: 1.2em; */
	background-color: ;
  }
  .info{
	  opacity:.01;
	  margin-top:-38%;
	  border-radius:30px;
	  width:100px;height:60px;background-color:white;margin-left:-30%
	  
  }
  .info:hover{
	  opacity:1;
	  margin-top:-38%;
	  border-radius:5px;
	  width:100px;height:40px;background-color:white;margin-left:-30%
  }
</style>

<h4>LEFT: <?= $network['left']['count'] ?></h4>
<h4>RIGHT: <?= $network['right']['count'] ?></h4>
<div class="main_master">
<div class="binary-user" style="width:100%;margin-left:2%;">
  <div class="level master">
    <div style="width: 200px; margin: 0 auto;">
      <div style="background-color:lightgreen;width:60px;height:60px;border-radius:30px;text-align:center;" class="pull-left">
       <div style="line-height:60px" class="id" > ID:<?= $network['master'][$id][0][0][0]['id'] ?></div>
    
      </div>
      <div >
        <div class="username"><?= $network['master'][$id][0][0][0]['username'] ?></div>        
        <div class="name" style="margin-right:-10%"><?= $network['master'][$id][0][0][0]['name'] ?></div>
      </div>
    </div>
  </div>
</div>
</div>
<!--Left_Master-->
<div class="left_master" style="margin-left:0%">
<?php if ($network['left']['network'][$network['left']['id']][0][0][0]['id']) {?>
<div class="binary-user pull-left" style="width:50%;">
  <div class="level master">
    <div style="width: 200px; margin: 0 auto;">
      <a class="binary-link" href="<?= Url::to(['/network/binary-tree', 'id' => $network['left']['network'][$network['left']['id']][0][0][0]['id']]) ?>">
          <div style="background-color:orange;width:60px;height:60px;border-radius:30px;text-align:center;" class="pull-left">
          <div style="line-height:60px" class="id" > ID:<?= $network['left']['network'][$network['left']['id']][0][0][0]['id'] ?></div>
          <div class="info" >
            <div class="username"><?= $network['left']['network'][$network['left']['id']][0][0][0]['username'] ?></div>        
            <div class="name" style="margin-right:-10%"><?= $network['left']['network'][$network['left']['id']][0][0][0]['name'] ? $network['left']['network'][$network['left']['id']][0][0][0]['name'] : 'NO NAME' ?></div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
<?php } else { ?>
<div class="binary-user pull-left" style="width:50%;">
  <div class="filler-icon" style="font-size: 3em;">
    <a class="binary-link" href="<?= Url::to(['/user/register', 'id' => $id, 'position' => 0]) ?>">
      <i class="fa fa-user"></i>
    </a>  
  </div>
</div>
<?php } ?>
</div>

<!--Right_Master-->
<div class="right_master">
<?php if ($network['right']['network'][$network['right']['id']][0][0][0]['id']) {?>
<div class="binary-user pull-left" style="width:50%; ">
  <div class="level master">
    <div style="width: 200px; margin: 0 auto;">
      <a class="binary-link" href="<?= Url::to(['/network/binary-tree', 'id' => $network['right']['network'][$network['right']['id']][0][0][0]['id']]) ?>">
        <div style="background-color:orange;width:60px;height:60px;border-radius:30px;text-align:center;" class="pull-left">
          <div style="line-height:60px;" class="id" > ID:<?= $network['right']['network'][$network['right']['id']][0][0][0]['id'] ?></div>   
          <div class="info">
            <div class="username"><?= $network['right']['network'][$network['right']['id']][0][0][0]['username'] ?></div>        
            <div class="name" style="margin-right:-10%"><?= $network['right']['network'][$network['right']['id']][0][0][0]['name'] ? $network['right']['network'][$network['right']['id']][0][0][0]['name'] : 'NO NAME' ?></div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
<?php } else { ?>
<div class="binary-user pull-left" style="width:50%;margin-left:-1%;">
  <div class="filler-icon" style="font-size: 3em;">
    <a class="binary-link" href="<?= Url::to(['/user/register', 'id' => $id, 'position' => 1]) ?>">
      <i class="fa fa-user"></i>
    </a>  
  </div>
</div>
<?php } ?>
</div>

<!-- LEFT TREE -->
<div class="tree">
<section class="pull-left col-xs-6">
<?php

  for ($level=0; $level < 2 ; $level++) {

    if($level == 0) {
      $counter1 = 1;
    }
    else if($level == 1) {
      $counter1 = 2;
    }
    else if($level == 3) {
      $counter1 = 8;
    }
    else {
      $counter1 = $level * $level;
    }

    $makegroup = -1;

    echo '<div class="clearfix">';

    for ($group=0; $group < $counter1; $group++) { 
      $prevgroup = $group;

      for ($position=0; $position < 2; $position++) {

        $makegroup = $makegroup + 1;
?>

<?php if($network['left']['network'][$network['left']['id']][$level + 1][$group][$position]['id'] == null): ?>
<div class="binary-user pull-left" style="width:<?= (100 / $counter1 / 2) ?>%;">
  <div class="level gray ?>">
    <div class="filler-icon" style="font-size: 3em;">
      <a class="binary-link" href="<?= Url::to(['/user/register', 'id' => $network['left']['network'][$network['left']['id']][$level + 1][$group][$position]['placement'], 'position' => $position]) ?>">
        <i class="fa fa-user"></i>
      </a>   
    </div>
  </div>
</div>
<?php else: ?>
<div class="binary-user pull-left" style="width:<?= (100 / $counter1 / 2) ?>%;">
  <div class="level level<?= $level ?>">
    <div style="<?= $level != 2 ? 'width: 200px; margin: 0 auto;' : '' ?>">
      <a class="binary-link" href="<?= Url::to(['/network/binary-tree', 'id' => $network['left']['network'][$network['left']['id']][$level + 1][$group][$position]['id']]) ?>">
        <div style="background-color:orange;width:60px;height:60px;border-radius:33px;" class="<?= $level != 2 ? 'pull-left' : '' ?>">
          <div style="line-height:60px" class="id">ID: <?= $network['left']['network'][$network['left']['id']][$level + 1][$group][$position]['id'] ?></div>
          <div class="info" style="">
            <div class="username"><?= $network['left']['network'][$network['left']['id']][$level + 1][$group][$position]['username'] ?></div>           
            <div class="name"><?= $network['left']['network'][$network['left']['id']][$level + 1][$group][$position]['name'] ? $network['left']['network'][$network['left']['id']][$level + 1][$group][$position]['name'] : 'NO NAME' ?></div>
          </div>
        </div>          
      </a>
        <div>           
        </div>
    </div>
  </div>
</div>
<?php endif ?>

<?php
      }

    }

    echo '</div>';

  }
?>
</section>


<!-- RIGHT TREE -->
<section class="pull-left col-xs-6">
<?php

  for ($level=0; $level < 2 ; $level++) {

    if($level == 0) {
      $counter1 = 1;
    }
    else if($level == 1) {
      $counter1 = 2;
    }
    else if($level == 3) {
      $counter1 = 4;
    }
    else {
      $counter1 = $level * $level;
    }

    $makegroup = -1;

    echo '<div class="clearfix">';

    for ($group=0; $group < $counter1; $group++) { 
      $prevgroup = $group;

      for ($position=0; $position < 2; $position++) {

        $makegroup = $makegroup + 1;
?>

<?php if($network['right']['network'][$network['right']['id']][$level + 1][$group][$position]['id'] == null): ?>
  <div class="binary-user pull-left" style="width:<?= (100 / $counter1 / 2) ?>%;">
    
      <div class="level gray ?>">
        <div class="filler-icon" style="font-size: 3em;">
    <a class="binary-link" href="<?= Url::to(['/user/register', 'id' => $network['right']['network'][$network['right']['id']][$level + 1][$group][$position]['placement'], 'position' => $position]) ?>">
          <i class="fa fa-user"></i>
    </a>   
        </div>
      </div>
    
  </div>
<?php else: ?>
  <div class="binary-user pull-left" style="width:<?= (100 / $counter1 / 2) ?>%;">
    
      <div class="level level<?= $level ?>">
        <div style="<?= $level != 2 ? 'width: 200px; margin: 0 auto;' : '' ?>">
    <a class="binary-link" href="<?= Url::to(['/network/binary-tree', 'id' => $network['right']['network'][$network['right']['id']][$level + 1][$group][$position]['id']]) ?>">
          <div style="background-color:orange;width:60px;height:60px;border-radius:33px;" class="<?= $level != 2 ? 'pull-left' : '' ?>">
      <div style="line-height:60px" class="id">ID: <?= $network['right']['network'][$network['right']['id']][$level + 1][$group][$position]['id'] ?></div>
            
         <div class="info" style="">
             <div class="username"><?= $network['right']['network'][$network['right']['id']][$level + 1][$group][$position]['username'] ?></div>           
                 <div class="name"><?= $network['right']['network'][$network['right']['id']][$level + 1][$group][$position]['name'] ? $network['right']['network'][$network['right']['id']][$level + 1][$group][$position]['name'] : 'NO NAME' ?></div>
           </div>

             </div>
           
       </a>
          <div>           
          </div>
        </div>
      </div>
   
  </div>
<?php endif ?>

<?php
      }

    }

    echo '</div>';

  }
?>
</section>
</div>