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
        <?= $form->field($stud, 'username', [
    "template" => "<label><div class=\"col-lg-12\">Имя пользователя</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])  ?>
        <?= $form->field($stud, 'email') ?>
        <?=  $form->field($stud, 'password', [
    "template" => "<label><div class=\"col-lg-12\">Пароль</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'contactdetails-button']) ?>
            </div>
        </div>
</div>
<div class="col-sm-4">
        <?= $form->field($stud, 'studname', [
    "template" => "<label><div class=\"col-lg-12\">Имя</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])  ?>
        <?= $form->field($stud, 'middlename', [
    "template" => "<label><div class=\"col-lg-12\">Отчество</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])  ?>    
        <?= $form->field($stud, 'familyname', [
    "template" => "<label><div class=\"col-lg-12\">Фамилия</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])  ?>  
        <?= $form->field($stud, 'birthdate', [
    "template" => "<label><div class=\"col-lg-12\">Дата рождения</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])->textInput(['type' => 'date', 'format' => 'm-d-Y']);  ?>
         
</div>
<div class="col-sm-4">
        <?= $form->field($stud, 'yearset', [
    "template" => "<label><div class=\"col-lg-12\">Год набора</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])  ?>  
        <?= $form->field($stud, 'formeducation', [
    "template" => "<label><div class=\"col-lg-12\">Форма обучения</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])->dropDownList([
                                                    'Очная форма' => 'Очная форма',
                                                    'Заочная форма' => 'Заочная форма',
                                                    'Очная-заочная форма' => 'Очная-заочная форма'
        ]);  ?>  
        <?= $form->field($stud, 'lineeducation', [
    "template" => "<label><div class=\"col-lg-12\">Направление подготовки</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])->dropDownList([
'09.03.01 Информатика и вычислительная техника' => '09.03.01 Информатика и вычислительная техника',
'39.03.02 Социальная работа' => '39.03.02 Социальная работа',
'38.03.01 Экономика' => '38.03.01 Экономика',
'38.03.02 Менеджмент' => '38.03.02 Менеджмент',
'35.03.02 Технология лесозаготовительных и деревоперерабатывающих производств' => '35.03.02 Технология лесозаготовительных и деревоперерабатывающих производств',
'35.04.02 Технология лесозаготовительных и деревоперерабатывающих производств' => '35.04.02 Технология лесозаготовительных и деревоперерабатывающих производств',
'15.03.02 Технологические машины и оборудование' => '15.03.02 Технологические машины и оборудование',
'15.04.02 Технологические машины и оборудование' => '15.04.02 Технологические машины и оборудование',
        ]);  ?> 
        <?= $form->field($stud, 'status', [
    "template" => "<label><div class=\"col-lg-12\">Статус</div></label>\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"
])->dropDownList([
                                                    'Студент' => 'Студент',
        ]);    ?>  
</div>
<?php ActiveForm::end(); ?>
        </div>  
    </div>  
</div>  
</div>
</div>