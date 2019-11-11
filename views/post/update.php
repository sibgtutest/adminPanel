<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Обновить страницу: ';// . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">

    <p><?= Html::encode($this->title) ?></p>
    <h1><?= Html::encode($model->title) ?></h1><br/>

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
