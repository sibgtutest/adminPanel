<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Group;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <div class="row">
    <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-4">

            <?= $form->field($model, 'status')->dropDownList(\yii\helpers\ArrayHelper::map(Group::find()->all(), 'id', 'number')); ?>
            <?= $form->field($model, 'studname') ?>
            <?= $form->field($model, 'middlename') ?>
            <?= $form->field($model, 'familyname') ?>
            
        </div>
        <div class="col-lg-4">

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder'=>'Enter the Password']) ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <div class="col-lg-4">
        
        </div>
    <?php ActiveForm::end(); ?>    
    </div>

</div>
