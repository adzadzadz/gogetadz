<?php 

  use yii\helpers\Html;
  use yii\helpers\Url;

  $this->title = 'Click Ads';
  
  $this->registerAssetBundle(\yii\web\JqueryAsset::className(), \yii\web\View::POS_HEAD);
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=758749107492947&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
  ::slotted(.submit-button-1) {
    background: pink;
  }
</style>

<section id="ads" class="row">
  <div class="content-left col-md-9">
    <?php foreach ($ads as $ad): ?>
      <div class="col-md-3">
        <ad-control 
          status="<?= array_key_exists($ad->id, $userAds) ? $userAds[$ad->id]->status : '0' ?>"
          <?= !array_key_exists($ad->id, $userAds) ? "activate" : '' ?>
          action="<?= Url::to(['/advertisement/done']) ?>" 
          value="<?= $ad->id ?>" 
          img-url="<?= $ad->image_url ?>"
          csrf-param="<?= Yii::$app->request->csrfParam; ?>"
          csrf-value="<?= Yii::$app->request->csrfToken; ?>">

          <div class="fb-page" data-href="<?= $ad->url ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?= $ad->url ?>" class="fb-xfbml-parse-ignore"><a href="<?= $ad->url ?>"><?= $ad->name ?></a></blockquote></div>

          <!-- <iframe src="http://gogetadz.dev.com" height="500">
            <p>Your browser does not support iframes.</p>
          </iframe> -->
          
        </ad-control>
      </div>
    <?php endforeach ?>
  </div>
  <div class="content-right col-md-3"></div>
</section>