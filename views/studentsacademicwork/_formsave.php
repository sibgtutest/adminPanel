<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"{items}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'userid',
            'filename',
            'description',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {save} {update} {delete}',
                'buttons' => [
                    'view' => function ($url,$model) {
                        return Html::a('<span>Посмотреть</span>', $url);
                    },
                    'update' => function ($url,$model) {
                        if ($model->status == '0') {
                            return ' | ' . Html::a('<span>Изменить</span>', $url);
                        };
                    },
                    'delete' => function ($url,$model) {
                        if ($model->status == '0') {
                            return ' | ' . Html::a('<span>Удалить</span>', $url);
                        };
                    },
                    'save' => function ($url,$model,$key) {
                        if ($model->status == '0') {
                            return ' | ' . Html::a('Сохранить', $url);
                        };
                    },
                ]
            ],
        ],
    ]); 
?>