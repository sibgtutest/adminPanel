<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Электронная информационно-образовательная среда';
?>

<div class="site-index">
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <p><?= Html::a("Контактные данные &raquo;", ['site/contactdetails', 'id'=>5]); ?></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Учебный план &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Полотно &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Портрет &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Учебная работа студента &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Научные достижения студента &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Статьи студента &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Общественные достижения студента &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Спортивные достижения студента &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
