<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Электронная информационно-образовательная среда';
?>
<?= "<div class='wrap' style=\"background-image: url('/img/5/" . $canvas . "')\" >" ?>
    <div class="container">
<div class="site-index">
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <p><?= Html::a("Контактные данные &raquo;", ['site/contactdetails'], ['class' => 'btn btn-primary']); ?></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Учебный план &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Общественные достижения студента &raquo;</a></p>
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-4">
                <p><?= Html::a("Полотно &raquo;", ['site/canvas'], ['class' => 'btn btn-primary']); ?></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Учебная работа студента &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Научные достижения студента &raquo;</a></p>
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Портрет &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Статьи студента &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Спортивные достижения студента &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
</div>
</div>