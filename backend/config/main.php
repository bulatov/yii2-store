<?php

use yii\filters\AccessControl;

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
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-backend',
                'httpOnly' => true,
                'domain' => $params['cookieDomain'],
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'frontend-backend-auth-session-cookie',
            'cookieParams' => [
                'domain' => $params['cookieDomain'],
                'httpOnly' => true
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

        'backendUrlManager' => require(__DIR__ . '/urlManager.config.php'),
        'frontendUrlManager' => require(__DIR__ . '/../../frontend/config/urlManager.config.php'),
        'urlManager' => function() {
            return \Yii::$app->get('backendUrlManager');
        },

    ],
    'params' => $params,

    'as access' => [
        'class' => AccessControl::className(),
        'rules' => [
            [
                'actions' => ['login', 'signup', 'error'],
                'controllers' => ['site'],
                'allow' => true,
                'roles' => ['?']
            ],
            [
                'allow' => true,
                'roles' => ['@']
            ]
        ],
    ],
];

/*
 * Права доступа
 * вынести блок access из SiteController в /config/main.php
 * as access
 * except
 *
 *
 * одновременная авторизация
 * session, user, request
 * в /backend, /frontend - similar
 * название куки сессии - одинаоковое
 * session { domain: .mysite.test}
 * user.identityCookie { domain: .mysite.test }
 *
 * домен можно вынести в /config/params.php {cookieDomain => }
 *
 * одинаковый секрет кеу на фронт и бэк в config/main-local.php
 *
 *
 * URL manager*****
 * можно вынести urlManager в отдельный конфиг файл require (__DIR__ . 'urlManager.php')
 * frontendUrlManager => function() { require }
 * backendUrlManager => function() { require }
 * @alias для frontend|backend UrlManager
 */