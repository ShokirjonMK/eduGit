<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\StrudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><a href="<?=\yii\helpers\Url::to(['../student/create'])?>"><button class="btn btn-success"> Add Student </button></a></h1>

    <table id="example" class="table table-striped table-bordered" >
    <thead>
    <tr>
        <th>#</th>
        <th>Full name</th>
        <th>Phone number</th>
        <th>Date of birth</th>
        <th>Started at</th>
        <th>Address</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>

    <?php $i =1;  foreach ($students as $student): ?>
        
        <?php  $user = \common\models\User::find()->where(['id'=>$student->user_id])->one();?>
        
        <tbody>
    <tr <?
    if ($user->status != 10) {
        echo '"class"="danger"';
    }
    ?>
        <td><?=$i++?></td>
        <td><?=$student->full_name;?></td>
        <td><?= $student->phone_number;?></td>
        <td><?= $student->date_of_birth ?></td>
        <td><?=$student->started_at;?></td>
        <td><?=$student->address;?></td>
        <td>
            <?php 
            // echo $user->username; 
            if($user->status == 10){
                echo "Aktive";
            }else{
                echo "Passiv";
            }
            ?>
        </td>
        <td>
            <a href="<?=\yii\helpers\Url::to(['../admin/student/delete?id='.$student->id], true)?>"><span class="glyphicon glyphicon-trash"></span></a>
            <a href="<?=\yii\helpers\Url::to(['../admin/student/update?id='.$student->id])?>"><span class="glyphicon glyphicon-pencil"></span></a>
        </td>
    </tr>
    </tbody>
    <?php  endforeach; ?>
</table>

</div>
