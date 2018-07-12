<?php

use yii\filters\AccessControl;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'frontend\bootstrap\RegisterDependencies'
    ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-frontend',
                'httpOnly' => true,
                'domain' => $params['cookieDomain']
            ],
            'loginUrl' => 'login',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'frontend-backend-auth-session-cookie',
            'cookieParams' => [
                'domain' => $params['cookieDomain']
            ]
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

        'frontendUrlManager' => require(__DIR__ . '/urlManager.config.php'),
        'backendUrlManager' => require(__DIR__ . '/../../frontend/config/urlManager.config.php'),
        'urlManager' => function() {
            return \Yii::$app->get('frontendUrlManager');
        },

    ],
    'params' => $params,

//    'as access' => [
//        'class' => AccessControl::className(),
//        'rules' => [
//            [
//                'actions' => ['login', 'signup', 'error'],
//                'controllers' => ['site'],
//                'allow' => true,
//                'roles' => ['?']
//            ],
//            [
//                'allow' => true,
//                'roles' => ['@']
//            ]
//        ],
//    ]

    /*'controllerMap' => [
        'auth' => 'frontend\controllers\auth\AuthController',
    ]*/

    /*'container' => [
        'definitions' => [
            'frontend\services\EmailService',
            'yii\swiftmailer\Mailer' => function() { return 213; }
        ]
    ]*/
];
