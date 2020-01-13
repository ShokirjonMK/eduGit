<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReplaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Replays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="replay-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',

            // 'user_id',
            [
                'attribute' => 'user_id',
                'label' => 'User',
                'value' => 'user.username',
            ],
            // 'message_id',
            [
                'attribute' => 'message_id',
                'label' => 'Message From',
                'value' => 'message.first_name'
            ],
            // 'message_body:ntext',
            [
                'label' => 'Message body',
                'attribute' => 'message_body',
                'headerOptions' => ['style' => 'width:28%'],
                'content' =>function($data){
                    
                    return \yii\helpers\StringHelper::truncate($data->message_body, 40, '...');
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
