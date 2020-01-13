<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Replay */

$this->title = 'Create Replay';
$this->params['breadcrumbs'][] = ['label' => 'Replays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="replay-create">

  
    <?= $this->render('form', [
        'model' => $model,
    ]) ?>

</div>
