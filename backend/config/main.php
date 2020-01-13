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
    'bootstrap' => ['log'],
    'modules' => [

        // 'chartbuilder'=>[
        //     'class'=> 'yii2learning\chartbuilder\Module'
        // ],

        'gridview' => ['class' => 'kartik\grid\Module']
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'mailer' => [
            'class'=> 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
        /** */
     /*   'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_backendUser', // unique for backend
                'path'=>'/backend/web'  // correct path for the backend app.
            ]
        ],
        'session' => [
            'name' => '_backendSessionId', // unique for backend
            'savePath' => __DIR__ . '/../runtime', // a temporary folder on backend
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
        'authManager'=>
            [
                'class' => 'yii\rbac\DbManager',
                'defaultRoles' => ['guest'],
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
/**
 * 
 */
//   'modules'=>[
//             'pdfjs' => [
//                  'class' => '\yii2assets\pdfjs\Module',
//              ],
//           ],
 /**
  * 
  */
        'request' => [
            'baseUrl' => '/admin',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
     
           /** */
           'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => 'http://edu.loc',
        ],
        // return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('user'));
        // Yii::$app->urlManagerFrontend->createUrl(...);
        /** */
    ],
    'params' => $params,
];
