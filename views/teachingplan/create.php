<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Teachingplan */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Учебный план', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachingplan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
    ]) ?>

</div>
