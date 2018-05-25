<?php 

use yii\helpers\Url;

$this->title = 'Unilevel Tree';

?>

<style>
.lvl0 {
  width: 100%;
  overflow: auto;
  background: #bab;
}
.lvl1 {background: #cac;}
.lvl2 {background: #787;}
.lvl3 {background: #989;}
.user-data {
  float: left;
  display: inline-block;
}
.item {
  width: 150px;
  min-height: 150px;
  background: #faf;
  margin: 4px; 
}
.branch {
  display: inline-block;
  background: #aba;
}
</style>

<div class="user-data lvl0">
  <div class="item">
    User ID: <?= $user->id ?> <br>
    Name: <?= $user->profile->name ?>
  </div>

  <?php foreach ($user->network->downlines as $lvl1) { ?>
    <div class="user-data lvl1">
      <div class="item">
        User ID: <?= $lvl1->id ?> <br>
        Name: <?= $lvl1->profile->name ?>
      </div>
    

      <?php foreach ($lvl1->network->downlines as $lvl2) { ?>

      <div class="user-data lvl2">
        <div class="item">
          User ID: <?= $lvl2->id ?> <br>
          Name: <?= $lvl2->profile->name ?>
        </div>

        <?php foreach ($lvl2->network->downlines as $lvl3) { ?>

        <div class="user-data lvl3">
          <div class="item">
            User ID: <?= $lvl3->id ?> <br>
            Name: <?= $lvl3->profile->name ?>
          </div>
        </div>

<?php
        }
?>
        </div> <!-- .user-data.lvl2 -->
<?php
    }
?>
    </div> <!-- .user-data.lvl1 -->
<?php
}
?>

</div> <!-- .user-data.lvl0 -->