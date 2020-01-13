<?php

use yii\helpers\Html;
use yii\grid\GridView;
// use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">
    <? Modal::begin([
        'header' => '<h2></h2>',
        'id' => "modal1",]);
    ?>
    <div id="mc"> </div>
    
    <? Modal::end();?>
    
<p>
    <?= Html::a('Create Teacher', ['create'],
     ['class' => 'btn btn-success p1',
      "id"=>"m2"]) 
    ?>
</p>

  

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        /** */

        // 'pjax' => true,
        // 'export' => false,
        'rowOptions'=>function($model){
            if ($model->status == '0') {
                return ['class'=>'danger'];
            } else 
            if ($model->status == '2') {
                return ['class'=>'success'];
            }
            else {
                return ['class'=>'info'];
            }
        },

        'options' => ['class' => 'white-space: nowrap;'],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'full_name',
            
            [
                //'subject',
                'label' => 'Subject',
                'attribute' => 'subject',
                'headerOptions' => ['style' => 'width:10%'],
                'content' =>function($data){
                    return $data->subject;
                }

            ],
            // 'info:ntext',
            [
                'label' => 'Info',
                'attribute' => 'info',
                'headerOptions' => ['style' => 'width:28%'],
                'content' =>function($data){
                    
                    return \yii\helpers\StringHelper::truncate($data->info, 40, '...');
                }
            ],
            [
                // 'user_id',
                'label' => 'User Id',
                'attribute' => 'user_id',
                'headerOptions' => ['style' => 'width:5%'],
                'content' =>function($data){
                    return $data->user_id;
                }

            ],
            [
                // 'started_at',
                'label' => 'Started At',
                'attribute' => 'started_at',
                'headerOptions' => ['style' => 'width:10%'],
                'content' =>function($data){
                    return $data->started_at;
                }
            ],
            [
                // 'salary',
                'label' => 'salary',
                'attribute' => 'salary',
                'headerOptions' => ['style' => 'width:10%'],
                'content' =>function($data){
                    return $data->salary;
                }
            ],

             [
                // 'status',
                // 'class' => 'kartik\grid\EditableColumn',
                // 'header' => 'status',
                'label' => 'status',
                'attribute' => 'status',
                'headerOptions' => ['style' => 'width:10px'],
                'value' =>function($data){
                    return $data->status;
                }
            ],
            [   'class' => 'yii\grid\ActionColumn',
                // 'header' => 'Tools',
                'template' => '{view} {delete} {update}',
            ],
           
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
