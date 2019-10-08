<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php
    $url = "21.png";
?>

<?= "<div class='wrap' style=\"background-image: url('/img/5/" . $pictures->filename . "')\" >" ?>
    <div class="container">
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>

<?= $form->field($model, 'file')->fileInput(); ?>
<!-- $form->field($model, 'description')->textInput(); -->
<button>Submit</button>
 
<?php ActiveForm::end(); ?>
</div>
</div>