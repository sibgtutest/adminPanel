<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studentarticles */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Статьи студента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentarticles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
    ]) ?>

</div>
