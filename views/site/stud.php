<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Электронная информационно-образовательная среда';
?>
<!-- "<div class='wrap' style=\"background-size: cover; background-position: center; width: 100%; height: 100%; background-image: url('/img/" . $id . "/" . $canvas . "')\" >" -->
<div class="wrap">
<div class="container">
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>
<div class="body-content"> 
<nav class="navbar navbar-inverse">
  <div class="container-fluid row">
    <ul class="">
        <div class="nav navbar-nav col-sm-4"><li><?= Html::a("Контактные данные &raquo;", ['site/contactdetails']); ?></li></div>
        <div class="nav navbar-nav col-sm-4"><li><?= Html::a("Учебный план &raquo;", ['teachingplan/index']); ?></li></div>
        <div class="nav navbar-nav col-sm-4"><li><?= Html::a("Общественные достижения студента &raquo;", ['site/studentssocialachievements']); ?></li></div>
    </ul>
  </div> 
  <div class="container-fluid row">
    <ul class="">
        <div class="nav navbar-nav col-sm-4"><li></li></div>
        <div class="nav navbar-nav col-sm-4"><li><?= Html::a("Учебная работа студента &raquo;", ['studentsacademicwork/index']); ?></li></div>
        <div class="nav navbar-nav col-sm-4"><li><?= Html::a("Научные достижения студента &raquo;", ['site/studentsscientificachievements']); ?></li></div>
    </ul>
  </div>
  <div class="container-fluid row">
    <ul class=""> 
        <div class="nav navbar-nav col-sm-4"><li></li></div>
        <div class="nav navbar-nav col-sm-4"><li><?= Html::a("Статьи студента &raquo;", ['site/studentarticles']); ?></li></div>
        <div class="nav navbar-nav col-sm-4"><li><?= Html::a("Спортивные достижения студента &raquo;", ['site/studentssportingachievements']); ?></li></div>
    </ul>
  </div>
</nav>
</div>
</div>
</div>
