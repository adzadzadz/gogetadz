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
  }
  .level0 {
    background: #e6ee9c;
  }
  .level1 {
    background: #80d8ff;
  }
  .level2 {
    background: #b9f6ca;
  }
  .gray {
    background: #e0e0e0;
  }
  .master {
    background: #80deea;
  }
  a .filler-icon {
    font-size: 3em;
    color: #000;
  }
  a .filler-icon:hover {
    font-size: 5em;
  }
</style>

<div class="binary-user" style="width:100%;">
  <div class="level master">
    <div style="width: 200px; margin: 0 auto;">
      <div class="pull-left">
        <?php echo \cebe\gravatar\Gravatar::widget(
            [
                'email' => 'adzbite@gmail.com',
                'defaultImage' => 'robohash',
                'options' => [
                    'alt' => '',
                ],
                'size' => 60,
            ]
        ); ?>
      </div>
      <div>
        <div class="username"><?= $network[$id][0][0][0]['username'] ?></div>
        <div class="id">ID: <?= $network[$id][0][0][0]['id'] ?></div>
        <div class="name"><?= $network[$id][0][0][0]['name'] ?></div>
      </div>
    </div>    
  </div>
</div>

<?php

  for ($level=0; $level < 3 ; $level++) {

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

        <?php if($network[$id][$level + 1][$group][$position]['id'] == null): ?>
          <div class="binary-user pull-left" style="width:<?= (100 / $counter1 / 2) ?>%;">
            <a href="<?= Url::to(['/user/register']) ?>">
              <div class="level gray ?>">
                <div class="filler-icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </a>
          </div>
        <?php else: ?>
          <div class="binary-user pull-left" style="width:<?= (100 / $counter1 / 2) ?>%;">
            <div class="level level<?= $level ?>">
              <div style="width: 200px; margin: 0 auto;">
                <div class="pull-left">
                  <?php echo \cebe\gravatar\Gravatar::widget(
                      [
                          'email' => '',
                          'defaultImage' => 'robohash',
                          'options' => [
                              'alt' => '',
                          ],
                          'size' => 60,
                      ]
                  ); ?>
                </div>
                <div>
                  <div class="username"><?= $network[$id][$level + 1][$group][$position]['username'] ?></div>
                  <div class="id">ID: <?= $network[$id][$level + 1][$group][$position]['id'] ?></div>
                  <div class="name"><?= $network[$id][$level + 1][$group][$position]['name'] ? $network[$id][$level + 1][$group][$position]['name'] : 'NO NAME' ?></div>
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