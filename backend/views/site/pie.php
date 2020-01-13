<?php

use sjaakp\gcharts\PieChart;
$this->title = 'Pie';
?>
<div class="site-index">


    <div class="body-content">

    <?= PieChart::widget([
    'height' => '400px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'name:string',
        'population'
    ],
    'options' => [
        'title' => 'Countries by Population'
    ],
]) ?>
    </div>
</div>
