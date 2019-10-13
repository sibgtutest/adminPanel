<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studentsscientificachievements */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Научные достижения студента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentsscientificachievements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
    ]) ?>

</div>
