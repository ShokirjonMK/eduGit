<?php

namespace backend\controllers;

use Yii;
use common\models\Teacher;
use backend\models\TeacherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\helpers\Json;
use yii\web\UploadedFile;
/**
 * TeacherController implements the CRUD actions for Teacher model.
 */
class TeacherController extends Controller
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
     * Lists all Teacher models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(! Yii::$app->user->identity->role == Teacher::CLIENT){

        $searchModel = new TeacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
/*
        if ( Yii::$app->request->post('hasEditable')) {
            $teacherId = Yii::$app->request->post('editableKey');
            $teacher = Teacher::findOne($teacherId);

            $out = Json::encode(['output' => '', 'message' => '']);
            $post = [];
            $posted = current($_Post['Teachers']);
            $post['Teachers'] = $posted;
            if ( $branch->load($post) ) {
                $teacher->save();
                $output = 'my value';
                $out = Json::encode(['output' => $output, 'message' => '']);
            }
            echo $out;
            return;
        }
  */
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
     * Displays a single Teacher model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Teacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if ( Yii::$app->user->can('create') ) {
         
        $model = new Teacher();

        if ($model->load(Yii::$app->request->post()) ) {
               $model->started_at = date('Y-m-d');
            //    f:\Learn\OSPanel\domains\edu.loc\frontend\web\

             $picname = 'teacher'.$model->id;
             $model->teacher_img = UploadedFile::getInstance($model, 'teacher_img');
             $model->teacher_img->saveAs('uploads/' .$picname. '.' .$model->teacher_img->extension);

             $model->teacher_img = $picname. '.' .$model->teacher_img->extension;

            $model->save();
               
            return $this->redirect('index');
        }
 

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
        } else{
            throw new ForbiddenHttpException;
            
        }
    }

    /**
     * Updates an existing Teacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if ( Yii::$app->user->can('update') ) {
         
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);   
        } else {
            throw new ForbiddenHttpException;
            
        }
    }

    /**
     * Deletes an existing Teacher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teacher::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
