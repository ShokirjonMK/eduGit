<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Replay */

$this->title = 'Update Replay: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Replays', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id, 'message_id' => $model->message_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="replay-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
