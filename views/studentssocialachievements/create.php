<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studentssocialachievements */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Общественные достижения студента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentssocialachievements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
    ]) ?>

</div>
