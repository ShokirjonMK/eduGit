<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Replay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="replay-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'message_body', ['inputOptions' => ['class' => 'form-control' , 'placeholder'=>'Replay text here ...'],])->textarea(['rows' => 4])->label(false);  ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-success', 'style' => 'width:100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
