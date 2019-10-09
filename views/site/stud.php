<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Электронная информационно-образовательная среда';
?>
<?= "<div class='wrap' style=\"background-image: url('/img/5/" . $canvas . "')\" >" ?>
<div class="well well-sm">Small Well</div>
<div class="site-index">

<nav class="navbar navbar-inverse">
<div class="container-fluid row">
<div class="nav navbar-nav col-sm-12">&shy;1</div>    
</div> 
<div class="container-fluid row">
<div class="nav navbar-nav col-sm-12">&shy;2</div>    
</div> 
  <div class="container-fluid row">
    <ul class="">
        <div class="nav navbar-nav col-sm-2">&shy;</div>    
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Контактные данные &raquo;", ['site/contactdetails']); ?></li></div>
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Учебный план &raquo;", ['site/teachingplan']); ?></li></div>
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Общественные достижения студента &raquo;", ['site/studentssocialachievements']); ?></li></div>
        <div class="nav navbar-nav col-sm-1">&shy;</div>
    </ul>
  </div> 
  <div class="container-fluid row">
    <ul class="">
        <div class="nav navbar-nav col-sm-2">&shy;</div>    
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Фоновое изображение &raquo;", ['site/canvas']); ?></li></div>
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Учебная работа студента &raquo;", ['site/studentsacademicwork']); ?></li></div>
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Научные достижения студента &raquo;", ['site/studentsscientificachievements']); ?></li></div>
        <div class="nav navbar-nav col-sm-1">&shy;</div>
    </ul>
  </div>
  <div class="container-fluid row">
    <ul class="">
        <div class="nav navbar-nav col-sm-2">&shy;</div>    
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Портрет &raquo;", ['site/picture']); ?></li></div>
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Статьи студента &raquo;", ['site/studentarticles']); ?></li></div>
        <div class="nav navbar-nav col-sm-3"><li><?= Html::a("Спортивные достижения студента &raquo;", ['site/studentssportingachievements']); ?></li></div>
        <div class="nav navbar-nav col-sm-1">&shy;</div>
    </ul>
  </div>
</nav>

</div>

</div>