<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Replay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="replay-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'user_id')->textInput() ?>

    <?//= $form->field($model, 'message_id')->textInput() ?>

    <?= $form->field($model, 'message_body')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'width:100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
