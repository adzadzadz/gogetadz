<?php
use yii\helpers\Url;
?>

<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <?php echo \cebe\gravatar\Gravatar::widget(
            [
                'email' => '<?= Yii::$app->user->identity->email ?>',
                'options' => [
                    'alt' => '<?= Yii::$app->user->identity->username ?>',
                ],
                'size' => 64,
            ]
        ); ?>
    </div>
    <div class="pull-left info">
        <p><?= Yii::$app->user->identity->username ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>


<!-- search form -->
<!-- <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
            <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
                        class="fa fa-search"></i></button>
        </span>
    </div>
</form> -->
<!-- /.search form -->


<?php

// prepare menu items, get all modules
$menuItems = [];

$favouriteMenuItems[] = ['label' => 'MAIN NAVIGATION', 'options' => ['class' => 'header']];

$menuItems[] = [
    'url' => [ Url::to(["/site"]) ],
    'icon' => 'cog',
    'label' => 'Home',
];

$menuItems[] = [
    'url' => [ Url::to(['/user/settings/profile']) ],
    'icon' => 'cog',
    'label' => 'Account',
];

// if (Yii::$app->) {
//     # code...
// }
$menuItems[] = [
    // 'url' => [ Url::to(['/user/settings/profile']) ],
    'icon' => 'cog',
    'label' => 'Admin Controls',
    'items' => [
        [
            'url' => [ Url::to(['/advertisement']) ],
            'icon' => 'cog',
            'label' => 'Advertisements',
        ]
    ]
];

$menuItems[] = [
    'url' => [ Url::to(["/site/click-ads"]) ],
    'icon' => 'cog',
    'label' => 'Click Ads',
];

$menuItems[] = [
    'url' => ['#'],
    'icon' => 'cog',
    'label' => 'Withdraw',
];

$menuItems[] = [
    'url' => [Url::to(['/user/security/logout'])],
    'icon' => 'cog',
    'label' => 'Logout',
];

echo dmstr\widgets\Menu::widget([
    'items' => \yii\helpers\ArrayHelper::merge($favouriteMenuItems, $menuItems),
]);
?>
