<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">
<?php  $user = \yii\helpers\ArrayHelper::map(common\models\User::find()->all(), 'id', 'username');?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
<?/*
    <?= $form->field($model, 'week_day')
            ->dropDownList([ 1 => 'Dushanba', 2 => 'Seshanba', 3 => 'Chorshanba', 4 => 'Payshanba', 5 => 'Juma', 6 => 'Shanba', ], ['prompt' => '']) ?>
            */?>
<?= $form->field($model, 'user_id')->dropDownList($user)->label('User Id') ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'started_at')->textInput() ?>

    <?= $form->field($model, 'date_of_birth')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
<?/*
    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
*/?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
