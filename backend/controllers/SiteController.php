<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Group;
use yii\helpers\ArrayHelper;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'pie', 'chart', 'charts', 'user', 'teacher', 'course', 'group'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    
/***/
public function actionPie() {
    $dataProvider = new Group([
        'query' => Group::find(),
        'pagination' => false
    ]);

    return $this->render('pie', [
        'dataProvider' => $dataProvider
    ]);
}

    public function actionChart(){

        $groups = \common\models\Group::find()->all();
        $groupcount = \common\models\Group::find()->count();
        $rangevalue = [];
        $rangename = [];

        $grouparr = [];
        foreach ($groups as $group) {
            $rangevalue[] = (int)\common\models\Student::find()->where(['group_id'=>$group->id])->count();
            $rangename[] = $group->group_name;

            $grouparr[$group->group_name] = (int)\common\models\Student::find()->where(['group_id'=>$group->id])->count();
        }

        return $this->render('chart', [
            'rangevalue' =>$rangevalue,
            'rangename' => $rangename, 
            'groupcount' => $groupcount,
            'grouparr' => $grouparr,
        ]);
    }

    public function actionCharts(){

        $groups = \common\models\Group::find()->all();
        $groupcount = \common\models\Group::find()->count();
        $rangevalue = [];
        $rangename = [];

        $grouparr = [];
        foreach ($groups as $group) {
            $rangevalue[] = (int)\common\models\Student::find()->where(['group_id'=>$group->id])->count();
            $rangename[] = $group->group_name;

            $grouparr[$group->group_name] = (int)\common\models\Student::find()->where(['group_id'=>$group->id])->count();
        }

        return $this->render('charts', [
            'rangevalue' =>$rangevalue,
            'rangename' => $rangename, 
            'groupcount' => $groupcount,
            'grouparr' => $grouparr,
        ]);
    }

/***/

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
