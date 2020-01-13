<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'group_name') ?>

    <?= $form->field($model, 'group_info') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?php // echo $form->field($model, 'days') ?>

    <?php // echo $form->field($model, 'time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
