<?php 

use yii\helpers\Url;

$this->title = 'Unilevel Tree';

?>

<style>
.user-data {
  width: 70px;
  height: 70px;
  background: #faf;
  margin: 4px; 
  float: left;
  position: relative;
}

.branch {
  display: inline-block;
}
</style>

<div class="user-data lvl0">
  <0: <?= $id ?>>
</div>
<?php foreach ($user->network->downlines as $lvl1) { ?>
<div class="branch">
  <div class="user-data lvl1">
    <1: <?= $lvl1->id ?>>
  </div>
  <br>
  <?php foreach ($lvl1->network->downlines as $lvl2) { ?>

  <div class="user-data lvl2">
    <2: <?= $lvl1->id ?>>
  </div>
  <br>
  <?php foreach ($lvl2->network->downlines as $lvl3) { ?>

  <div class="user-data lvl3">
    <3: <?= $lvl1->id ?>>
  </div>
</div>
<!-- Foreach Closing Tags -->
<?php
        }
    }
}
?>