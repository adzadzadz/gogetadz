<?php 

  use yii\helpers\Html;

  $this->title = 'Click Ads';
  
  $this->registerAssetBundle(\yii\web\JqueryAsset::className(), \yii\web\View::POS_HEAD);

?>

<link rel="import" href="/polymer/src/ad-control.html">

<style>
  #ads > .content-left {
    padding: 45px;
    background: #fff;
  }
  .img-wrap {
    margin: 5px 5px 5px 5px !important;
    padding: 0 !important;
  }
</style>
<section id="ads" class="row">
  <div class="content-left col-md-9">
    <?php foreach ($ads as $ad): ?>
      <div class="col-md-3">
        <ad-control img-url="<?= $ad->image_url ?>" <?= !array_key_exists($ad->id, $userAds) ? "activate" : '' ?>>
          
          <div class="modal-content">
      
            <?= Html::beginForm( '/advertisement/done', $method = 'post', $options = [] ) ?>
              
              <?= Html::hiddenInput ( 'ad_id', $ad->id, $options = [] ) ?>

              <div class="title">
                <h3>Advertisement</h3>
              </div>
              <section class="progress-wrap">
                <div class="col-md-9">
                  <div class="progress">
                    <div id="progress-bar-<?= $ad->id ?>" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                  <div class="countdown">
                    <span id="timer-wrap-<?= $ad->id ?>">20</span> sec left
                  </div>
                </div>
                <div class="col-md-3">
                  <button id="submit-button-<?= $ad->id ?>" class="btn btn-sm btn-block btn-success" disabled>Submit</button>
                </div>
              </section>
              <section class="content">
                <img src="<?= $ad->image_url ?>" alt="" width="100%">
              </section>

            <?= Html::endForm() ?>
              
          </div>

        </ad-control>
      </div>
    <?php endforeach ?>
  </div>
  <div class="content-right col-md-3"></div>
</section>




<section id="ads-modal">
<!-- MODAL -->
<?php foreach ($ads as $each): ?>
  <div id="ad-modal-<?= $each->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
      
        <?= Html::beginForm( '/advertisement/done', $method = 'post', $options = [] ) ?>
          
          <?= Html::hiddenInput ( 'ad_id', $each->id, $options = [] ) ?>

          <div class="title">
            <h3>Advertisement</h3>
          </div>
          <section class="progress-wrap">
            <div class="row">
              <div class="col-md-9">
                <div class="progress">
                  <div id="progress-bar-<?= $each->id ?>" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <div class="countdown">
                  <span id="timer-wrap-<?= $each->id ?>">20</span> sec left
                </div>
              </div>
              <div class="col-md-3">
                <button id="submit-button-<?= $each->id ?>" class="btn btn-sm btn-block btn-success" disabled>Submit</button>
              </div>
            </div>
          </section>
          <section class="content">
            <img src="<?= $ad->image_url ?>" alt="" width="100%">
          </section>

        <?= Html::endForm() ?>

      </div>

        
    </div>
  </div>

<!-- <script>  
  $('#ad-modal-<?= $each->id ?>').on('shown.bs.modal', function (e) {
    console.log('opened');
    run(<?= $each->id ?>);
  });

  $('#ad-modal-<?= $each->id ?>').on('hide.bs.modal', function (e) {
    console.log('closed');
    resetFunc(<?= $each->id ?>);
  });

  
</script> -->
  
<?php endforeach ?>

<!-- <script>
  var moveInterval, countDownInterval;
  var reset = false;

  function resetFunc(id) {
    var submit = document.getElementById("submit-button-" + id);
    submit.disabled = true;
    reset = true;
  }

  function countDown(id) {
    var i = 20;
    countDownInterval = setInterval(timer, 1000);
    timerElem = document.getElementById('timer-wrap-' + id);
    
    function timer() {
      if (i < 1 || reset) {
        clearInterval(countDownInterval);
        reset = false;
      }
      timerElem.innerHTML = i.toString();
      i--;
    }
  }

  function move(id) {
    var progressbar = document.getElementById("progress-bar-" + id);   
    var submit = document.getElementById("submit-button-" + id);
    var width = .1;
    moveInterval = setInterval(frame, 205);
    function frame() {
      if (width >= 100 || reset) {
        clearInterval(moveInterval);
        submit.disabled = false;
        reset = false;
      } else {
        width++; 
        progressbar['aria-valuenow'] = width;
        progressbar.style.width = width + '%';
      }
    }
  }

  function run(id) {
    countDown(id);
    move(id);
  }
</script>
 
</section>-->