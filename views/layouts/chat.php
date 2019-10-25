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
    
<div class="wrap">

    <div class="navbar-fixed-bottom row-fluid">
        <div class="navbar-inner" style="overflow-y: scroll;">
            
            <div class="container">
                <div class="demo">
                    <div class="chat">
                        <div class="msgbox" id="msgbox" class="box">
                            <div class="messages" id="messages"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon">Чат</span>
                <input id="message_text" 
                    id="text" 
                    type="text" 
                    class="form-control" 
                    name="message_text" 
                    placeholder="Additional Info" 
                    autofocus">
            </div>                 
        </div>
    </div>

</div>
<!-- script src="http://127.0.0.1:3000/socket.io/socket.io.js"></script -->
<?php $this->endBody() ?>

    <script type="text/javascript">
        $(document).ready(function () {
            var socket = io.connect('http://127.0.0.1:3000');
            var message_txt = $("#message_text");
            function msg(message) {
                message = safe(message);
                var m = '<div class="msg">' + message + '</div>';
                $("#messages").append(m).scrollTop($("#messages").scrollHeight);
            }
            function msg_system(message) {
                var m = '<div class="msg system">' + message + '</div>';
                $("#messages")
                    .append(m).scrollTop($("#messages").scrollHeight);
            }
            socket.on('connecting', function () {
                msg_system('Соединение...');
            });
            socket.on('connect', function () {
                msg_system('Соединение установлено!');
                getChat();
            });
            socket.on('message', function (data) {
                msg(data.message);
                $("#message_text").focus();
                getChat();
            });

            function getChat() {
                $.ajax({
                    type: "POST",
                    url: "<?= Url::to(['site/getdata']); ?>",
                    dataType: "json",
                    data: { room: 1 }
                })
                    .done(function (data) {
                        mount(data.data);
                        $('#msgbox').scrollTop($('#msgbox').scrollHeight);
                    });
            }

            function mount(data) {
                var html = "";
                var cssclass = "brown-color";
                var img = '';
                $.each(data, function (index, chat) {
                    html += '<div>' + chat.user + ' Dummy Guy <i>' + chat.sent_at + '</i>:</span> ' + chat.message + '</div>';
                });

                $("#msgbox").html(html);
            }

            $("#message_text").keyup(function (event) {
                if (event.keyCode == 13) {/*
                    //var text = '<p><b><?php echo $contactdetails->studname . ' ' . $contactdetails->middlename . ' ' . $contactdetails->familyname ?><br/></b>' + $("#message_text").val() + '<br/></p>';
                    
                    var text = '<?php echo $contactdetails->studname . ' ' . $contactdetails->middlename . ' ' . $contactdetails->familyname . ': «' ?>' + $("#message_text").val() + '».';
                    if (text.length <= 0)
                        return;
                    $("#message_text").val("");
                    socket.emit("message", { message: text });*/

                    //
                    saveChat();
                    
                    return false;
                    
                    //
                }
                return true;
            });

            function saveChat() {
                var chatMsg = $("#message_text").val();
                if (chatMsg != '') {
                    $.ajax({
                        type: "POST",
                        url: "<?= Url::to(['site/savedata']); ?>",
                        dataType: "json",
                        data: { "chatMsg": chatMsg }
                    })
                        .done(function (data) {
                            //socket.emit('chat message', chatMsg);
                            socket.emit("message", { message: chatMsg });
                            //mount(data);
                            $("#message_text").val("");
                        }); 
                }
            }

            function safe(str) {
                return str.replace(/&/g, '&amp;')
                            .replace(/</g, '&lt;')
                            .replace(/>/g, '&gt;');
            }
        });
    </script>
</body>
</html>
<?php $this->endPage() ?>
