<?php

/* @var $this yii\web\View */
/* @var $stud app\models\User */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Контактные данные';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>
    <div class="body-content"> 
        <div class="row">
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

        <?= $form->field($stud, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($stud, 'email')->textInput(['autofocus' => true]) ?>
        <?= $form->field($stud, 'password_hash')->passwordInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

<?php ActiveForm::end(); ?>
        </div>  
    </div>  
</div>   