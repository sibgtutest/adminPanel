<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>


    <?= Html::a('Cancel', 
                Url::to(['default/']), 
                ['class' => 'btn btn-primary', 'role' => 'modal-remote']) ?>
