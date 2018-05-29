<?php

  $userCount = 0;
  $totalPv = 0;
  $totalIncome = 0;

?>

<table class="table table-bordered table-condensed table-striped table-responsive table-hover">
  <thead>
    <tr>
      <td>Level</td>
      <td>Members</td>
      <td>Total</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($network as $level => $users) { ?>
      <tr>
        <td><?= $level ?></td>
        <td>
          <?php 

            $userCount = $userCount + count($users);
            echo count($users);

          ?>
        </td>
        <td>
          <?php 

            $levelTotalPv = 0;
            $levelTotalIncome = 0;
            foreach ($users as $user) {
              if (!empty($user->pv)) {
                foreach ($user->pv as $pv) {
                  $levelTotalPv = $levelTotalPv + $pv->value;
                }
              }
            } 
            
            $levelTotalIncome = $levelTotalIncome + ($levelTotalPv * Yii::$app->appConfig->ulEarning[$level]);
            $totalPv = $totalPv + $levelTotalPv;
            $totalIncome = $totalIncome + $levelTotalIncome;
            echo $levelTotalPv . "pv ($levelTotalIncome)";
          
          ?>
        </td>
      </tr>
    <?php } ?>
    
    <tr>
      <td>Totals</td>
      <td><?= $userCount ?></td>
      <td><?= $totalPv . "pv ($totalIncome)" ?></td>
    </tr>
  </tbody>
</table>