<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Group;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="user-update">

    <div class="row">
    <?php $form = ActiveForm::begin(['id' => 'form-update']); ?>
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
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
            </div>

        </div>
        <div class="col-lg-4">
        
        </div>
    <?php ActiveForm::end(); ?>    
    </div>

</div>

</div>
