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
                <p><?= Html::a("Учебный план &raquo;", ['site/teachingplan'], ['class' => 'btn btn-primary']); ?></p>
            </div>
            <div class="col-lg-4">
                <p><?= Html::a("Общественные достижения студента &raquo;", ['site/studentssocialachievements'], ['class' => 'btn btn-primary']); ?></p>
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-4">
                <p><?= Html::a("Фоновое изображение &raquo;", ['site/canvas'], ['class' => 'btn btn-primary']); ?></p>
            </div>
            <div class="col-lg-4">
                <p><?= Html::a("Учебная работа студента &raquo;", ['site/studentsacademicwork'], ['class' => 'btn btn-primary']); ?></p>
            </div>
            <div class="col-lg-4">
                <p><?= Html::a("Научные достижения студента;", ['site/studentsscientificachievements'], ['class' => 'btn btn-primary']); ?></p>
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-4">
                <p><?= Html::a("Портрет &raquo;", ['site/picture'], ['class' => 'btn btn-primary']); ?></p>
            </div>
            <div class="col-lg-4">
                <p><?= Html::a("Статьи студента &raquo;", ['site/studentarticles'], ['class' => 'btn btn-primary']); ?></p>
            </div>
            <div class="col-lg-4">
                <p><?= Html::a("Спортивные достижения студента &raquo;", ['site/studentssportingachievements'], ['class' => 'btn btn-primary']); ?></p>
            </div>
        </div>

    </div>
</div>
</div>
</div>