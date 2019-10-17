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
use yii\helpers\Url;

AppAsset::register($this);

if (Yii::$app->user->isGuest) {
    return Yii::$app->response->redirect(['site/login']);
} 

$userid= \Yii::$app->user->identity->id;

//var_dump($userid);
//exit;

$contactdetails = Contactdetails::findOne(['userid' => $userid]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow" />
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
            ['label' => 'Главная', 'url' => ['site/index'], 'visible' => !Yii::$app->user->isGuest],
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
            var socket = io.connect('http://127.0.0.1:8008');
            var message_txt = $("#message_text");
            function msg(message) {
                message = safe(message);
                var m = '<div class="msg">' + message + '</div>';
                $("#messages").append(m).scrollTop($("#messages")[0].scrollHeight);
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
                    //var text = '<p><b><?php echo $contactdetails->studname . ' ' . $contactdetails->middlename . ' ' . $contactdetails->familyname ?><br/></b>' + $("#message_text").val() + '<br/></p>';
                    
                    var text = '<?php echo $contactdetails->studname . ' ' . $contactdetails->middlename . ' ' . $contactdetails->familyname . ': «' ?>' + $("#message_text").val() + '».';
                    if (text.length <= 0)
                        return;
                    $("#message_text").val("");
                    socket.emit("message", { message: text });

                    
                    var chatMsg = $("#msginput").val();
                    if (chatMsg != '') {
                        $.ajax({
                            type: "POST",
                            url: "http://127.0.0.1:8080/server/saveData.php",
                            dataType: "json",
                            data: { chatMsg: chatMsg }
                        })
                            .done(function (data) {
                                socket.emit('chat message', chatMsg);
                                //mount(data);
                                $("#msginput").val("");
                            });
                    }


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
