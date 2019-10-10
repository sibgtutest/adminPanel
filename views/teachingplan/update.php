<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Teachingplan */

$this->title = 'Учебный план: ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Учебный план', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="teachingplan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>