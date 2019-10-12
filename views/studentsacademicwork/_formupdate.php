<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Studentsacademicwork */
/* @var $form yii\widgets\ActiveForm */
$id= \Yii::$app->user->identity->id;
?>

<div class="studentsacademicwork-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->textInput()->hiddenInput(['value' => $id])->label(false); ?>

    <?= $form->field($model, 'filename')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
