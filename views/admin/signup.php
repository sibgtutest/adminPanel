<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Group;


$this->title = 'Signup';

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-lg-4">

            <?= $form->field($model, 'status')->dropDownList(\yii\helpers\ArrayHelper::map(Group::find()->all(), 'id', 'number')); ?>
            <?= $form->field($model, 'studname') ?>
            <?= $form->field($model, 'middlename') ?>
            <?= $form->field($model, 'familyname') ?>
            
        </div>
        <div class="col-lg-4">

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

        </div>
        <div class="col-lg-4">
        
        </div>
    <?php ActiveForm::end(); ?>    
    </div>
</div>