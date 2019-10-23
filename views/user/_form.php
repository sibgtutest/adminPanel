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

            <?= $form->field($model, 'status')->textInput(['value' => '10']); ?><!-- ->dropDownList(\yii\helpers\ArrayHelper::map(Group::find()->all(), '10', 'number')); ?> -->
            <?= $form->field($model, 'studname') ?>
            <?= $form->field($model, 'middlename') ?>
            <?= $form->field($model, 'familyname') ?>
            
        </div>
        <div class="col-lg-4">

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

        </div>
        <div class="col-lg-4">
        
        </div>
    <?php ActiveForm::end(); ?>    
    </div>

</div>
