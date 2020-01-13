<?php

namespace backend\controllers;

use nickdenry\grid\toggle\actions\ToggleAction;

use Yii;
use common\models\Davomat;
use backend\models\Davomat as DavomatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use mPDF;
use Mpdf\Mpdf;

/**
 * DavomatController implements the CRUD actions for Davomat model.
 */
class DavomatController extends Controller
{

    public function actions()
{
   return [
        'toggle' => [
            'class' => ToggleAction::class,
            'modelClass' => 'common\models\Davomat', // Your model class
        ],
    ];
}

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
     * Lists all Davomat models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(! Yii::$app->user->identity->role == Davomat::CLIENT){

        $searchModel = new DavomatSearch();
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
 * 
 */

    public function actionPdf(){

        return $this->render('pdf');
    }

 /**
  * 
  */
    public function actionBorYoq(){

        $searchModel = new DavomatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = Davomat::find()->all();

        return $this->render('boryoq', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Davomat model.
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
    public function actionViewPdf($id)
    {
        $pdf_content = $this->renderAjax('view-pdf', [
            'model' => $this->findModel($id),
        ]);

        $mpdf = new mPDF();
        $mpdf->WriteHTML($pdf_content);
        $mpdf->Output();
        exit;
    }

    public function actionPddf(){

        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('boryoq'));
        $mpdf->Output('MyPDF.pdf', 'D');
        exit;
    }

    public function actionPdfm(){
        
        $mpdf=new mPDF();
        $mpdf->WriteHTML("WDFWFWEF sdfsd ss");
        $mpdf->Output();
        exit;

    }

    public function actionPdff(){

        $model = new Mpdf();
        $model->SetHeader('header');
        $model->WriteHTML("PDF contents");
        $model->SetFooter('footer');
        $model->Output();
        exit;
    }
    /**
     * Creates a new Davomat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Davomat();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Davomat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Davomat model.
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
     * Finds the Davomat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Davomat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Davomat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
