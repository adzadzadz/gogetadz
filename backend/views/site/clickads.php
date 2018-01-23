<?php 

  use yii\helpers\Html;
  use yii\helpers\Url;

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

        </ad-control>
      </div>
    <?php endforeach ?>
  </div>
  <div class="content-right col-md-3"></div>
</section>


