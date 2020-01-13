<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    // 'guest' => [
    //     'class'=>'yii\web\User',
    //     'identityClass' => 'common\models\Guest',
    //     'enableSession' => true,
    // ],

    // 'employee' => [
    //     'class'=>'yii\web\User',
    //     'identityClass' => 'app\models\Employee',
    //     'enableSession' => true,
    // ],
];
