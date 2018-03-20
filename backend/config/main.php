<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'layout' => 'adminlte',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityCookie' => [
                'name'     => '_backendIdentity',
                'path'     => '/',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            'name' => 'BACKENDSESSID',
            'cookieParams' => [
                'httpOnly' => true,
                'path'     => '/',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views'
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'appConfig' => [
            'class' => 'app\models\Gogetadz',
            'registrationEarnings' => 2,
            'adIncome' => 0.001,
            'currency' => 'USD',
        ]
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin', 'pax', 'adzayko'],
            'controllerMap' => [
                'admin' => 'app\controllers\UserController',
                'registration' => 'app\controllers\RegistrationController'
            ],
            'modelMap' => [
                'User' => 'app\models\User',
                'RegistrationForm' => 'app\models\RegistrationForm',
                'Profile' => 'app\models\Profile'
            ],
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    'params' => $params,
];