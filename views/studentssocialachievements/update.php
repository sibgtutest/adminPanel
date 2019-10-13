<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studentssocialachievements */

$this->title = 'Update Studentssocialachievements: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Studentssocialachievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="studentssocialachievements-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
