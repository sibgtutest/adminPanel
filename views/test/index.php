<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?= Html::tag('p', Html::encode($model->file)) ?>
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>
 
<?= $form->field($model, 'file')->fileInput(); ?>
 
<button>Submit</button>
 
<?php ActiveForm::end(); ?>