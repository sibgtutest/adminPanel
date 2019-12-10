<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Auth_item;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?= $form->field($model, 'title')->textarea(['rows' => 1, 'style'=>'width:100%']) ?>

    <?= $form->field($model, 'role')->dropDownList(\yii\helpers\ArrayHelper::map(Auth_item::find()->all(), 'name', 'name')); ?>

    <?php ActiveForm::end(); ?>

</div>

