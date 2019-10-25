<?php

/* @var $this yii\web\View */
/* @var $stud app\models\User */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Контактные данные';
?>
<div class="wrap">
    <div class="container">
<div class="site-contactdetails">
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>
    <div class="body-content"> 
        <div class="row">

<div class="col-sm-4">
<ul>
    <li><label>Группа</label>: <?= Html::encode($stud->status) ?></li>
    <li><label>Логин</label>: <?= Html::encode($stud->username) ?></li>
    <li><label>Email</label>: <?= Html::encode($stud->email) ?></li>
</ul>
</div>
<div class="col-sm-4">
<ul>
    <li><label>Имя</label>: <?= Html::encode($stud->studname) ?></li>
    <li><label>Отчество</label>: <?= Html::encode($stud->middlename) ?></li>
    <li><label>Фамилия</label>: <?= Html::encode($stud->familyname) ?></li>
</ul>     
</div>
<div class="col-sm-4">
<ul>
    <li><label>Год набора</label>: <?= Html::encode($stud->year) ?></li>
    <li><label>Форма обучения</label>: <?= Html::encode($stud->form) ?></li>
    <li><label>Направление подготовки</label>: <?= Html::encode($stud->direction) ?></li>
</ul>   
</div>

        </div>  
    </div>  
</div>  
</div>
</div>