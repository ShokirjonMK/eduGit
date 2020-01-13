<?php

namespace backend\controllers;

use Yii;
use backend\models\Replay;
use backend\models\ReplaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReplayController implements the CRUD actions for Replay model.
 */
class ReplayController extends Controller
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
     * Lists all Replay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReplaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Replay model.
     * @param integer $id
     * @param integer $user_id
     * @param integer $message_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $user_id, $message_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id, $message_id),
        ]);
    }

    /**
     * Creates a new Replay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($message_id, $dir)
    {
        $model = new Replay();
        $id = Yii::$app->user->id;
        $user = \common\models\User::find()->where(['id' => $id])->one(); 

        $model->user_id = $id;
        $model->message_id = $message_id ;

        $setTo = \common\models\Message::find()->where(['id' => $message_id])->one();

        if ($model->load(Yii::$app->request->post())) {

            $value = Yii::$app->mailer->compose()
            ->setFrom([$user->email => 'Web Developer'])
            ->setTo($setTo->email)
            ->setSubject($setTo->subject)
            ->setTextBody($model->message_body)
            ->send();

            $model->save();

            return $this->redirect([$dir, 'id'=>$message_id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id, $user_id, $message_id)
    {
        $model = $this->findModel($id, $user_id, $message_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'message_id' => $model->message_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Replay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @param integer $message_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $user_id, $message_id)
    {
        $this->findModel($id, $user_id, $message_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Replay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @param integer $message_id
     * @return Replay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id, $message_id)
    {
        if (($model = Replay::findOne(['id' => $id, 'user_id' => $user_id, 'message_id' => $message_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
