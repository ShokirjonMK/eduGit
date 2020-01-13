<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

use kartik\date\DatePicker;

use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Davomat */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Davomat';
?>

<?
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="davomat-index">

<div class="row">
    <div class="col-sm-12">
    <div class="col-sm-6"></div>

        <div class="col-sm-2">
<label class="control-label">Select date</label>
        </div>
        <div class="col-sm-4">
    <?

echo DatePicker::widget([
    'name' => 'dp_3',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'value' => '2019-12-01',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]);

?> 

        </div>  
        </div>
    </div>
<!-- /** */ -->

    <div class=''>
</div>
<div class='container'>
<table class="table table-striped">
  <thead class='thead-dark'>
    <tr>
      <th scope="col">T/R</th>
      <th scope="col">Name</th>
      <th scope="col">Yes/No</th>
          </tr>
  </thead>
  <tbody>
  
<? $i=0;
    foreach ($model as $key) {
$i++;
        echo  '<tr>';
        echo  '<th scope="row">'.$i.'</th>';

        echo   '<td>'.$key->student->full_name.'</td>';
        if($key->yes_no == 1) $check='checked';
        else $check = "";
        echo   '<td><label class="switch">
        <input type="checkbox" '.$check.'>
        <span class="slider round"></span>
        </label></td>';

    /*echo '<td>';
        $form = ActiveForm::begin(); 
   $form->field($key, 'yes_no')->dropDownList([ '0', '1', ], ['prompt' => '']);
  ActiveForm::end();
  echo '</td>'; */
        echo    '</tr>';
     }

     
?>
  </tbody>
</table>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

</div>
