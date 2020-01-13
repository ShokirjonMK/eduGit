<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Davomat */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Davomats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="davomat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Davomat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label'=>'Group Name',
                'attribute'=>'group_id',
                'value'=>'group.group_name',
            ],
           
            
            [
                'label'=>'Student Name',
                'attribute'=>'student_id',
                'value'=>'student.full_name',
            ],
           
            'date',
            'yes_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
