<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Contactdetails;

AppAsset::register($this);

$username= \Yii::$app->user->identity->username;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Home', 'url' => ['site/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Регистрация', 'url' => ['site/signup'], 'visible' => Yii::$app->user->can('roleRoot')],
            //['label' => 'Регистрация', 'url' => ['site/signup']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизоваться', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
                )   
        ],
    ]);
    NavBar::end();
    ?>
        <?= $content ?>
<script src="http://127.0.0.1:8008/socket.io/socket.io.js"></script>
<?php $this->endBody() ?>

    <script type="text/javascript">
        $(document).ready(function () {
            var reload = '123';
            var socket = io.connect('http://127.0.0.1:8008');
            var message_txt = $("#message_text");
            function msg(message) {
                if (message == reload) {
                    location.reload();
                } else {
                    var m = '<div class="msg">' + message + '</div>';
                    $("#messages").append(m).scrollTop($("#messages")[0].scrollHeight);
                };
            }
            function msg_system(message) {
                var m = '<div class="msg system">' + message + '</div>';
                $("#messages")
                    .append(m).scrollTop($("#messages")[0].scrollHeight);
            }
            socket.on('connecting', function () {
                msg_system('Соединение...');
            });
            socket.on('connect', function () {
                msg_system('Соединение установлено!');
            });
            socket.on('message', function (data) {
                msg(data.message);
                $("#message_text").focus();
            });

            $("#message_text").keyup(function (event) {
                if (event.keyCode == 13) {
                    var text = '<div class="well"><?php echo $username ?></br><b>' + $("#message_text").val() + '</b></div>';
                    if (text.length <= 0)
                        return;
                    $("#message_text").val("");
                    socket.emit("message", { message: text });

                }
            });
            function safe(str) {
                return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            }
        });
    </script>
</body>
</html>
<?php $this->endPage() ?>
