<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use backend\models\AuthItem;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\SignupForm;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        if(! Yii::$app->user->identity->role == User::CLIENT){

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    else {
        return $this->goHome();
        }
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(! Yii::$app->user->identity->role == User::CLIENT){

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    else {
        return $this->goHome();
        }
    }

    public function actionSignup()
    { 
        if(Yii::$app->user->can('admin')){
            
        $model = new SignupForm();
        $authItems = AuthItem::find()->all();

        if ($model->load( Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Registered');
            return $this->redirect(['index']);            
        }

        return $this->renderAjax('signup', [
            'model' => $model,
            'authItems' => $authItems,
        ]);
    }
    else {
        return $this->goHome();
        }
    }
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if( Yii::$app->user->can('admin')){

        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        }
        else {
            return $this->goHome();
            }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if( Yii::$app->user->can('admin')){

        $model = $this->findModel($id);

        if ($model->load( Yii::$app->request->post()) ) {

            if ($model->new_pass != '' || $model->new_pass != null) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->new_pass);
            }
        
            $model->save();
            return $this->redirect('index');
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
        }
        else {
            return $this->goHome();
            }
    }


    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if( Yii::$app->user->can('admin')){

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        }
        else {
            return $this->goHome();
            }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}