<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studentsacademicwork */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Учебный план', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentsacademicwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
    ]) ?>

</div>
