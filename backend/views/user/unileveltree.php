<?php 

use yii\helpers\Url;

$this->title = 'Unilevel Tree';

?>

<style>
.user-data {
  background: #bab;
  display: inline-block;
}
.item {
  width: 70px;
  min-height: 70px;
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
    <0: <?= $id ?>>
  </div>

  <?php foreach ($user->network->downlines as $lvl1) { ?>
    <div class="user-data lvl1">
      <div class="item">
        <<?= $id ?>: <?= $lvl1->id ?>>
      </div>
    

      <?php foreach ($lvl1->network->downlines as $lvl2) { ?>

      <div class="user-data lvl2">
        <div class="item">
          <<?= $lvl1->id ?>: <?= $lvl2->id ?>>
        </div>
      </div>
    </div>
<!-- Foreach Closing Tags -->
<?php
        
    }
}
?>

</div>