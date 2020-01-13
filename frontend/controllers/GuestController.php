<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class GuestController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [                       
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

}