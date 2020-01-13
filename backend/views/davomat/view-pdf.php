<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Davomat */

$this->title = $model->student->full_name;

\yii\web\YiiAsset::register($this);
?>
<div class="davomat-view">

    <h1><?= Html::encode($this->title) ?></h1>

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'group_id',
            'student_id',
            'date',
            'yes_no',
        ],
    ]) ?>

</div>
