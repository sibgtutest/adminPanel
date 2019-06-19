<?php
use dosamigos\tinymce\TinyMce;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']],[
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

    <?= $form->field($model, 'body') ?>
<?php
$form->field($model, 'body')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>
<?php ActiveForm::end(); ?>