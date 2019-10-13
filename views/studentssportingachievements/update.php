<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studentssportingachievements */

$this->title = 'Спортивные достижения студента: ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Studentssportingachievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="studentssportingachievements-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
