<?php

// use miloschuman\highcharts\Highcharts;
use dosamigos\highcharts\HighCharts;

$this->title = 'Highcharts';
?>      
    <? // $id = Yii::$app->user->id;
        // $user = \common\models\User::find()->where(['id' => $id])->one(); 
        // echo $user->username; ?>
    

<div class="body-content">

    <div class="row">
        <div class="col-md-6">
        <?= \dosamigos\highcharts\HighCharts::widget([
            'clientOptions' => [
                'chart' => [
                        // 'type' => 'pie'
                        'type' => 'bar'
                        // 'type' => 'line'
                ],
                'title' => [
                    'text' => 'Users statistics'
                    ],
                'xAxis' => [
                    'categories' => $rangename
                ],
                'yAxis' => [
                    'title' => [
                        'text' => 'Edu center site stasistics'
                    ]
                ],
                'series' => [
                    ['name' => 'Groups', 'data' => $rangevalue],    
                ]
            ]
        ]);
        ?>
        </div>
        <div class="col-md-6">
            <?= \dosamigos\highcharts\HighCharts::widget([
                'clientOptions' => [
                    'chart' => [
                            // 'type' => 'pie'
                            // 'type' => 'bar'
                            'type' => 'line'
                    ],
                    'title' => [
                        'text' => 'Users statistics'
                        ],
                    'xAxis' => [
                        'categories' => $rangename
                    ],
                    'yAxis' => [
                        'title' => [
                            'text' => 'Edu center site stasistics'
                        ]
                    ],
                    'series' => [
                        ['name' => 'Groups', 'data' => $rangevalue],    
                        ['name' => 'Users', 'data' => [2, 3, 5, 6]],    

                    ]
                ]
            ]);
            ?>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <?= \dosamigos\highcharts\HighCharts::widget([
                'clientOptions' => [
                    'chart' => [
                        'type' => 'pie',
                        'options3d' => [
                            'enabled' => true,
                            'alpha' => 45,
                            'beta' => 0
                        ]
                        ],
                    'title' => [
                        'text' => 'Users statistics'
                        ],
                    'series' => [
                        ['name' => 'Groups', 'data' => $rangevalue],
                    ]
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
        <?= \dosamigos\highcharts\HighCharts::widget([
            'clientOptions' => [
                'chart' => [
                        // 'type' => 'pie'
                        'type' => 'column'
                        // 'type' => 'line'
                ],
                'title' => [
                    'text' => 'Users statistics'
                    ],
                'xAxis' => [
                    'categories' => $rangename
                ],
                'yAxis' => [
                    'title' => [
                        'text' => 'Edu center site stasistics'
                    ]
                ],
                'series' => [
                    ['name' => 'Groups', 'data' => $rangevalue],    
                    ['name' => 'User', 'data' => [3, 2, 4, 5]],
                    ['name' => 'Boshqa', 'data' => [5, 6, 2 ,1]],
                ]
            ]
        ]);
        ?>
        </div>
    </div>
</div>