<?
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class='container'>
    <div class='row'>
        <div class='col-md-10'>
  

    <h1>Welcome </h1>
<?// echo $user; ?>

<? 
    echo $user->username;
    echo 'asd';
?>
    <h2><? echo Yii::$app->user->identity->email;  ?></h2>
      </div>
    <div class="col-md-2">
        <?= Html::a(
            'Sign out',
            ['/site/logout'],
            ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
        ) ?>
    </div>
</div>