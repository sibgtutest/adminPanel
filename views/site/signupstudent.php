<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Group;


$this->title = 'Signupstudent';

?>
<div class="site-signupstudent">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signupstudent:</p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signupstudent']); ?>
                <?= $form->field($model, 'status')->dropDownList(\yii\helpers\ArrayHelper::map(Group::find()->all(), 'id', 'number')); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Signupstudent', ['class' => 'btn btn-primary', 'name' => 'signupstudent-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>