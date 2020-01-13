<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\Teacher',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'mailer' => [
            'class'=> 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
        /** */
      /*  'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                // 'name' => '_frontendUser', // unique for frontend
                'path'=>'/frontend/web'  // correct path for the frontend app.
            ]
        ],
        'session' => [
            // 'name' => '_frontendSessionId', // unique for frontend
            'savePath' => __DIR__ . '/../runtime', // a temporary folder on frontend
        ],*/
        /** */

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

        'request' => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                
                '<action:\w+>/' => 'site/<action>'                            ,
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],

        /** */
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => 'http://edu.loc/admin',
        ],
        // return $this->redirect(Yii::$app->urlManagerBackend->createUrl('user'));
        // Yii::$app->urlManagerBackend->createUrl(...);
        /** */
    
    ],
    'params' => $params,
];