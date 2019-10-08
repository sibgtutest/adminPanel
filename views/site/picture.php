<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!-- Html::tag('p', Html::encode($model->file)) -->
<?
    foreach ($pictures as $picture) {
        Html::tag('p', Html::encode($picture)); 
    }
?>
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>
 
<?= $form->field($model, 'file')->fileInput(); ?>
<!-- $form->field($model, 'description')->textInput(); -->
<button>Submit</button>
 
<?php ActiveForm::end(); ?>