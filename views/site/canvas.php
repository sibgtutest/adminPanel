<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Фоновое изображение';
?>

<?= "<div class='wrap' style=\"background-image: url('/img/5/" . $canvas . "')\" >" ?>
    <div class="container">
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>    
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-4">
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>

<?= $form->field($model, 'file')->label(false)->fileInput(); ?>

<button class="btn btn-primary">Сохранить</button>
 
<?php ActiveForm::end(); ?>
</div>
<div class="col-lg-4"></div>
</div>
</div>
</div>
</div>