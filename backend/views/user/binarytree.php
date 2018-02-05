<?php 

use yii\helpers\Url;

$this->title = 'Binary Tree';

// var_dump($users[0][0]->profile->name); exit;
// $upline = \app\models\UserNetwork::findOne(['id' => $users[0][0]->network->placement]);
$upline = null;
if (\Yii::$app->user->identity->isAdmin) {
  $upline = \app\models\User::find()->where(['id' => $users[0][0]->network->placement])->joinWith('profile')->joinWith('network')->one();
}

$u1 = isset($users[1]) ? count($users[1]) : 0;
$u2 = isset($users[2]) ? count($users[2]) : 0;
$u3 = isset($users[3]) ? count($users[3]) : 0;
$treeWidth = ($u1 + $u2 + $u3) * 100;

?>

<!--
We will create a family tree using just CSS(3)
The markup will be simple nested lists
-->

<h3>Genealogy of (<?= $users[0][0]->username ?>) <?= $users[0][0]->profile->name ?></h3>

<div class="col-md-2">
  <div class="col-md-12">
    <h2>Actions</h2>

    <?php if (\Yii::$app->user->identity->isAdmin) { ?>
    
      <a href="<?= Url::toRoute(['/user/register', 'upline_id' => $users[0][0]->id]) ?>" class="btn btn-sm btn-block btn-primary">Create Downline</a>
    
    <?php } ?>

    <?php if (isset($upline)): ?>
      <div class="binary-tree">
        <ul>
          <li>
            <a href="<?= Url::toRoute(['/network/binary-tree', 'id' => $upline->id]) ?>">
              <div><strong>Direct Upline</strong></div>
              <div><?= $upline->profile->name ?></div>
              <div><?= $upline->username ?></div>
            </a>
          </li>
        </ul>
      </div>
    <?php endif ?>
        
  </div>
</div>
<div class="col-md-10 binary-tree-wrap">
  <div class="binary-tree" style="width: <?= $treeWidth ?>px">
    <ul>
      <li>
        <a href="">
          <div><?= $users[0][0]->profile->name ?></div>
          <div><?= $users[0][0]->username ?></div>
        </a>
        <?php if (isset($users[1])): ?>
          <ul>
            <?php foreach ($users[1] as $user1): ?>
              <li>
                <a href="<?= Url::toRoute(['/network/binary-tree', 'id' => $user1->id]) ?>">
                  <div><?= $user1->profile->name ?></div>
                  <div><?= $user1->username ?></div>
                </a>
                <?php if (isset($users[2])): ?>
                  <ul>
                    <?php foreach ($users[2] as $user2): ?>
                      <?php if ($user2->network->placement == $user1->id): ?>
                        <li>
                          <a href="<?= Url::toRoute(['/network/binary-tree', 'id' => $user2->id]) ?>">
                            <div><?= $user2->profile->name ?></div>
                            <div><?= $user2->username ?></div>
                          </a>
                          <?php if (isset($users[3])): ?>
                            <ul>
                              <?php foreach ($users[3] as $user3): ?>
                                <?php if ($user3->network->placement == $user2->id): ?>
                                  <li>
                                      <a href="<?= Url::toRoute(['/network/binary-tree', 'id' => $user3->id]) ?>">
                                        <div><?= $user3->profile->name ?></div>
                                        <div><?= $user3->username ?></div>
                                      </a>
                                  </li>
                                <?php endif ?>
                              <?php endforeach ?>
                            </ul>
                          <?php endif ?>
                        </li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                <?php endif ?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </li>
    </ul>
  </div>
</div>