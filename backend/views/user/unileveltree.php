<?php 

use yii\helpers\Url;

$this->title = 'Unilevel Tree';

?>

<style>
  .container-fluid {
    background: #e5e5e5;
  }
  .group {
    /* height: 200px; */
    width: 90%;
    padding: 8px;
    overflow: auto;
    /* background: #a9a; */
  }
  .tree-user {
    width: 120px;
    height: 120px;
    display: inline-block;
    background: #787;
    margin: 5px;
  }
  .level-label {
    width: 50px;
    /* font-weight: bold; */
    background: #252D32;
    color: #e5e5e5;
  }
  .table {
    width: 100%;
  }
</style>

<div class="container-fluid">
  <table class="table table-hover table-striped">
  <thead>
    <tr>
      <td>Level</td>
      <td>Members</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>0</td>
      <td>
        <div class="tree-user">
          <?= Yii::$app->user->identity->username ?>
          <?= Yii::$app->user->identity->profile->name ?>
          <?= YIi::$app->user->identity->network->sponsor ?>
        </div>
      </td>
    </tr>
    <?php foreach ($network as $level => $group): ?>
      <tr>
        <td><?= $level ?></td>
        <td>
          <div class="group">
          <?php foreach ($group as $user): ?>

            <div class="tree-user <?= $user->id ?>">
              <div><?= $user->username ?></div>
              <div><?= $user->profile->name ?></div>
              <div><?= $user->network->sponsor ?></div>
              <div><?= $user->id ?></div>
            </div>

          <?php endforeach; ?>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  </table>

</div>