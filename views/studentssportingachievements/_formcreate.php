<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Studentssportingachievements */
/* @var $form yii\widgets\ActiveForm */
$id= \Yii::$app->user->identity->id;
?>

<div class="studentssportingachievements-form">

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); 
?>

<?= $form->field($model, 'filename')->label(false)->fileInput(); ?>

<button class="btn btn-primary">Сохранить</button>
 
<?php ActiveForm::end(); ?>

</div>
