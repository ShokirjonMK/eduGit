<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Davomat */

$this->title = 'Create Davomat';
$this->params['breadcrumbs'][] = ['label' => 'Davomats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="davomat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
