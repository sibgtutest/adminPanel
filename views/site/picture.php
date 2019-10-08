<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?= "<div class='wrap' style=\"background-image: url('/img/5/" . $canvas . "')\" >" ?>
    <div class="container">
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>

<?= $form->field($model, 'file')->fileInput(); ?>
<!-- $form->field($model, 'description')->textInput(); -->
<button class="btn btn-primary">Submit</button>
 
<?php ActiveForm::end(); ?>
</div>
</div>