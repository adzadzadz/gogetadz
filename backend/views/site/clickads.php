<?php 
  use yii\helpers\Html;

  $this->title = 'Click Ads';
  // print_r($userAds); exit;
?>

<style>
  #ads > .content-left {
    padding: 45px;
    background: #fff;
  }
  .img-wrap {
    margin: 5px 5px 5px 5px !important;
    padding: 0 !important;
  }
  #ads .text {
    background-color: #ffefb2;
    text-align: center !important;
    padding: 10px;
    font-weight: bold;
    font-size: 1.3em;
  }
  #ads .modal .modal-content {
    padding: 25px;
  }
</style>
<section id="ads" class="row">
  <div class="content-left col-md-9">
    <?php foreach ($ads as $ad): ?>
      <div class="img-wrap col-md-2">
        <div 
          class="modal-trigger"
          data-toggle="modal"
          <?= !array_key_exists($ad->id, $userAds) ? "data-target='#ad-modal-$ad->id'" : '' ?>
          <?= !array_key_exists($ad->id, $userAds) ? "onclick='run($ad->id);'" : '' ?>
          <?= !array_key_exists($ad->id, $userAds) ? "style='cursor: pointer;'" : '' ?>          
        >

        <img src="<?= $ad->image_url ?>" alt="" width="100%">
        <div class="text">
          <?= !array_key_exists($ad->id, $userAds) ? "$0.20 / 20sec" : 'Finished' ?>
        </div>
      </div>
      </div>
    <?php endforeach ?>
  </div>
  <div class="content-right col-md-3"></div>
  
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
          </div>

          <?= Html::endForm() ?>
          
      </div>
    </div>
    
  <?php endforeach ?>
</section>

<script>
  function countDown(id) {
    var i = 20;
    var timer = setInterval(timer, 1000);
    timerElem = document.getElementById('timer-wrap-' + id);
    
    function timer() {
      if (i < 1) {
        clearInterval(timer);
      }
      timerElem.innerHTML = i.toString();
      i--;
    }
  }

  function move(id) {
    var progressbar = document.getElementById("progress-bar-" + id);   
    var submit = document.getElementById("submit-button-" + id);
    console.log(submit);
    var width = .1;
    var id = setInterval(frame, 205);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        submit.disabled = false;
      } else {
        width++; 
        progressbar['aria-valuenow'] = width;
        progressbar.style.width = width + '%';
      }
    }
  }

  function run(id) {
    console.log('run working');
    countDown(id);
    move(id);
  }
</script>