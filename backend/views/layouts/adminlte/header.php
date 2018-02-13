<header class="main-header">
    <!-- Logo -->
    <a href="<?= \Yii::$app->homeUrl ?>" class="logo">Go Get Adz</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?= Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <?php echo \cebe\gravatar\Gravatar::widget(
                                [
                                    'email'   => Yii::$app->user->identity->email ,
                                    'options' => [
                                        'alt' => Yii::$app->user->identity->username
                                    ],
                                    'size'    => 128
                                ]
                            ); ?>
                            <p>
                                username
                                <small><?= Yii::$app->user->identity->username ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= \yii\helpers\Url::to(['/user/settings/profile']) ?>"
                                   class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= \yii\helpers\Url::to(['/user/security/logout']) ?>"
                                   class="btn btn-default btn-flat" data-method="post">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>