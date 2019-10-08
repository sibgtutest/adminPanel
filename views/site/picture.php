<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Портрет';
?>
<?= "<div class='wrap' style=\"background-image: url('/img/5/" . $canvas . "')\" >" ?>
    <div class="container">
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>  
<div class="row">
  <div class="col-md-4">
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>
<?= $form->field($model, 'file')->fileInput(); ?>
<!-- $form->field($model, 'description')->textInput(); -->
<button class="btn btn-primary">Submit</button>
<?php ActiveForm::end(); ?>
</div>
<div class="col-md-84">
<?= "<img src='/img/5/" . $picture . "' class='img-rounded' alt='Cinque Terre'>" ?>
</div>
  </div>
</div>
</div>