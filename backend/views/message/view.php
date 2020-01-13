<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = 'Message From '. $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="message-view">

<? Modal::begin([
        'header' => '<h2>Replay to '. $model->first_name .' '. $model->last_name .'</h2>',
        'id' => "modal1",]);
?>
    <div class="containeir">
        <h3> <? echo $model->subject ?>:</h3> <? echo $model->message_body ?>
    </div>
    <div id="mc">
    </div>
<? Modal::end(); ?>
   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'first_name',
            'last_name',
            'subject',
            'email:email',
            'message_body:ntext',
            'datetime',
        ],
    ]) ?>
 <p>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-5 pl-5',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary ']) ?>
        <? $dir = '../admin/message/view' ?>
        <?= Html::a('Replay', ['../admin/replay/create', 'message_id'=>$model->id, 'dir' => $dir], ['class' => 'btn btn-primary pull-right p1', "id"=>"m2"]) ?>
        
    </p>
</div>
