<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Учебный план';
?>
<div class="wrap">
    <div class="container">
<div class="site-contactdetails">
<div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>  
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr class="">
        <th>filename</th>
        <th>description</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($teachingplans as $teachingplan) : ?>
      <tr class="">
        <td><?= $teachingplan->filename ?></td>
        <td><?= $teachingplan->description ?></td>
        <td>delete</td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
  <div class="col-xs-12 col-sm-4"><?= $form->field($model, 'filename')->label(false) ?></div>
  <div class="col-xs-12 col-sm-4"><?= $form->field($model, 'description')->label(false) ?></div> 
  <div class="col-xs-12 col-sm-4"><button class="btn btn-primary">Добавить</button></div> 
</div>
<?php ActiveForm::end(); ?>
</div>
</div>
</div>