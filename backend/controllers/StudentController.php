<?php

namespace backend\controllers;

use Yii;
use common\models\Student;
use backend\models\StrudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(! Yii::$app->user->identity->role == Student::CLIENT){

        // $searchModel = new StrudentSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $students = \common\models\Student::find()->all();
        return $this->render('index', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'students' => $students,
        ]);
        }
        else {
            return $this->goHome();
            }
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(! Yii::$app->user->identity->role == Student::CLIENT){

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
        else {
            return $this->goHome();
            }
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(! Yii::$app->user->identity->role == Student::CLIENT){

        $model = new Student();

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
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(! Yii::$app->user->identity->role == Student::CLIENT){

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
        }
        else {
            return $this->goHome();
            }
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(! Yii::$app->user->identity->role == Student::CLIENT){

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    else {
        return $this->goHome();
        }
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(! Yii::$app->user->identity->role == Student::CLIENT){

        if (($model = Student::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    else {
        return $this->goHome();
        }
    }
}
