<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Add user';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <? $authItem = ArrayHelper::map($authItems, 'name', 'name'); ?>
                <?= $form->field($model, 'permissions')->checkboxList($authItem); ?>

                <?/*= $form->field($model, 'permissions',[
                    'template' => "{label}\n".
                ])->checkboxList($authItem); */?>



                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary pull-right', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>