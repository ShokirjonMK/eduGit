<?php

/* @var $this yii\web\View */

$this->title = 'Edu Admin side';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Education</h1>

        <p class="lead">Admin side</p>

        <p><a class="btn btn-lg btn-success" href="#">Get started here</a></p>
    </div>
    <?
        $id = Yii::$app->user->id;
        $user = \common\models\User::find()->where(['id' => $id])->one(); 
    //    echo $user->username;
    ?>
    

    <div class="body-content">

       
    </div>
</div>
