<?php

/* @var $this yii\web\View */
/* @var $stud app\models\User */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Контактные данные';
?>
<div class="wrap">
    <div class="container">
<div class="site-contactdetails">
<div class="well well-sm">&shy;</div>
    <div class="jumbotron">
        <h1><?php echo $this->title; ?></h1>
    </div>
    <div class="body-content"> 
        <div class="row">

<?php $form = ActiveForm::begin([
        'id' => 'stud-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
<div class="col-sm-4">
        <?= $form->field($stud, 'username')  ?>
        <?= $form->field($stud, 'email') ?>
        <?=  $form->field($stud, 'password') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'contactdetails-button']) ?>
            </div>
        </div>
</div>
<div class="col-sm-4">
        <?= $form->field($stud, 'studname')  ?>
        <?= $form->field($stud, 'middlename')  ?>    
        <?= $form->field($stud, 'familyname')  ?>  
        <?= $form->field($stud, 'birthdate')->textInput(['type' => 'date', 'format' => 'm-d-Y']);  ?>
         
</div>
<div class="col-sm-4">
        <?= $form->field($stud, 'yearset')  ?>  
        <?= $form->field($stud, 'formeducation')->dropDownList([
                                                    'Очная форма' => 'Очная форма',
                                                    'Заочная форма' => 'Заочная форма',
                                                    'Очная-заочная форма' => 'Очная-заочная форма'
        ]);  ?>  
        <?= $form->field($stud, 'lineeducation')->dropDownList([
'09.03.01 Информатика и вычислительная техника' => '09.03.01 Информатика и вычислительная техника',
'39.03.02 Социальная работа' => '39.03.02 Социальная работа',
'38.03.01 Экономика' => '38.03.01 Экономика',
'38.03.02 Менеджмент' => '38.03.02 Менеджмент',
'35.03.02 Технология лесозаготовительных и деревоперерабатывающих производств' => '35.03.02 Технология лесозаготовительных и деревоперерабатывающих производств',
'35.04.02 Технология лесозаготовительных и деревоперерабатывающих производств' => '35.04.02 Технология лесозаготовительных и деревоперерабатывающих производств',
'15.03.02 Технологические машины и оборудование' => '15.03.02 Технологические машины и оборудование',
'15.04.02 Технологические машины и оборудование' => '15.04.02 Технологические машины и оборудование',
        ]);  ?> 
        <?= $form->field($stud, 'status')->dropDownList([
                                                    'Студент' => 'Студент',
        ]);    ?>  
</div>
<?php ActiveForm::end(); ?>
        </div>  
    </div>  
</div>  
</div>
</div>