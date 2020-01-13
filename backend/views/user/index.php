<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\User;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


    <?
            Modal::begin([
            'header' => '<h2>Add User</h2>',
            'id' => "modal1",]);
    ?>
        <div id="mc">    </div>
    <? Modal::end(); ?>

    <?
        Modal::begin([
        'header' => '<h2>Update User</h2>',
        'id' => "modal11",]);
    ?>
    <div id="mx">

    </div>
    <? Modal::end(); ?>

<p>
    <?= Html::a('Create User', ['signup'],
     ['class' => 'btn btn-success',
      "id"=>"m2"]) 
    ?>
</p>




    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        /**/
        // 'pjax' => true,
        // 'export' => false,
        'rowOptions'=>function($model){
            if ($model->status == '9') {
                return ['class'=>'danger'];
            } else {
                return ['class'=>'success'];
            }
        },
        /** */
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',
            // 'role',
           /* [
                'label' => 'Role',
                'attribute' => 'role',
                'headerOptions' => ['style' => 'width: 10px'],
                'content' =>function($data){
                    return $data->role;
                }
            ],*/
            // 'auth_key',
            // 'password_hash',
            //'password_reset_token',
            'email:email',
           
            [ 
                // 'status',
                'label' => 'Status',
                'attribute' => 'status',
                'headerOptions' => ['style' => 'width: 10px'],
                'content' =>function($data){
                    return $data->status;
                }
            ],
            [
                // 'created_at',
                'label' => 'created_at',
                'attribute' => 'created_at',
                'headerOptions' => ['style' => 'width: 30px'],
                'content' =>function($data){
                    return $data->created_at;
                }
            ],
            'updated_at',
            //'verification_token',

         //   ['class' => 'yii\grid\ActionColumn'],

            /** */
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete} {test}',

            "buttons" => ["test"=>function ($url, $model, $key) {
               return '<a class="p11" href="'.\yii\helpers\Url::to(['user/update', 'id'=>$key]).'">
               <i class="glyphicon glyphicon-edit"></a>';
           }
            ]
     
    ],
            /** */
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
