<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\User;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class='col-md-6'>
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>    
        <div class='col-md-6'>
            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?= $form->field($model, 'info')->textarea(['rows' => 1]) ?>

    <div class="row">
        <div class='col-md-4'>
            <? 
                echo $form->field($model, 'user_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(User::find()->all(), 'id', 'username'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a user ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($model, 'status')->dropDownList([ 0=>'nol', 1=>'bir', 2=>'iikki', ], ['prompt' => '']) ?>
        </div>
    <? //= $form->field($model, 'started_at')->textInput() ?>
        <div class='col-md-5'>

            <?
            echo '<label>Start Date</label>';
            echo DatePicker::widget([
                'name' => 'started_at', 
                'value' => date('yy-m-d'),
                'options' => ['placeholder' => 'Select date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4'>
            <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4'>
            <?= $form->field($model, 'teacher_img')->fileInput();  ?>
            <?//= $form->field($model, 'teacher_img')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4'>
            <div class="form-group">
                <?= Html::submitButton(' Save ', ['class' => 'btn btn-success', 'style' => 'width:100%; margin-top:25px;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
