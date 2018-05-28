<table class="table table-bordered table-condensed table-striped table-responsive table-hover">
  <thead>
    <tr>
      <td>Level</td>
      <td>Members</td>
      <td>Total</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($network as $nkey => $nvalue) { ?>
      <tr>
        <td><?= $nkey ?></td>
        <td>
          <?= count($nvalue) ?>
        </td>
        <td></td>
      </tr>
    <?php } ?>
    
  </tbody>
</table>