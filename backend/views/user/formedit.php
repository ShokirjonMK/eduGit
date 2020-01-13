<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'role')->dropDownList([ 0=>'User', 1=>'Manager', 2=>'Admin' ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'status')->dropDownList([ 9=>'Passive', 10=>'Active', ], ['prompt' => '']) ?>
        </div>
    </div>
    <?= $form->field($model, 'password_hash')->hiddenInput(['maxlength' => true])->label(false) ?>
  
    <?= $form->field($model, 'new_pass')->textInput(['maxlength' => true])->label("New Pass <i>(If you want to change)</i>") ?>
  


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=> 'width:100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
