<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?
    // the grid columns setup (only two column entries are shown here
// you can add more column entries you need for your use case)
$gridColumns = [
// the name column configuration
[
    'class'=>'kartik\grid\EditableColumn',
    'attribute'=>'name',
    'pageSummary'=>true,
    'editableOptions'=> function ($model, $key, $index) {
        return [
            'header'=>'Name',
            'size'=>'md',
            'afterInput'=>function ($form, $widget) use ($model, $index) {
                return $form->field($model, "color")->widget(\kartik\widgets\ColorInput::classname(), [
                    'showDefaultPalette'=>false,
                    'options'=>['id'=>"color-{$index}"],
                    'pluginOptions'=>[
                        'showPalette'=>true,
                        'showPaletteOnly'=>true,
                        'showSelectionPalette'=>true,
                        'showAlpha'=>false,
                        'allowEmpty'=>false,
                        'preferredFormat'=>'name',
                        'palette'=>[
                            ["white", "black", "grey", "silver", "gold", "brown"],
                            ["red", "orange", "yellow", "indigo", "maroon", "pink"],
                            ["blue", "green", "violet", "cyan", "magenta", "purple"],
                        ]
                    ],
                ]);
            }
        ];
    }
],
// the buy_amount column configuration
[
    'class'=>'kartik\grid\EditableColumn',
    'attribute'=>'buy_amount',
    'editableOptions'=>[
        'header'=>'Buy Amount',
        'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
        'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]]
    ],
    'hAlign'=>'right',
    'vAlign'=>'middle',
    'width'=>'100px',
    'format'=>['decimal', 2],
    'pageSummary'=>true
],
];

// the GridView widget (you must use kartik\grid\GridView)
echo \kartik\grid\GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'columns'=>$gridColumns
]); ?>
</div>
