<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?= "<div class='wrap' style=\"background-image: url('/img/5/" . $canvas . "')\" >" ?>
    <div class="container">
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-4">
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>

<?= $form->field($model, 'file')->fileInput(); ?>
<!-- $form->field($model, 'description')->textInput(); -->
<button class="btn btn-primary">Submit</button>
 
<?php ActiveForm::end(); ?>
</div>
<div class="col-lg-4"></div>
</div>
</div>
</div>
</div>