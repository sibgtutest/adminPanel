<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use app\models\Contactdetails;
use yii\helpers\Url;

AppAsset::register($this);
Yii::setAlias('@WebServer', 'http://127.0.0.1:8080/');

if (Yii::$app->user->isGuest) {
    return Yii::$app->response->redirect(['site/login']);
} 

$userid= \Yii::$app->user->identity->id;

//var_dump($userid);
//exit;

//$contactdetails = Contactdetails::findOne(['userid' => $userid]);

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

<script src="/assets/jquery-2.1.3.min.js"></script>
<script src="/assets/socket.io-1.2.0.js"></script>
<script type="text/javascript">
    const MySocketServer = 'http://localhost:3000';
    const WebServer = 'http://127.0.0.1:8080';

    /*
    REPLACE THE IO HTTP URL BELLOW, TO YOUR OWN SERVER EX: LOCALHOST OR HTTP://YOURSERVER.COM
        */
    var socket_connect = function (room) {
        return io(MySocketServer, {
            query: 'r_var=' + room
        });
    }

    // socket connect: var is the room id
    // THE ROOM ID IS UP TO YOUR APP OR SESSION
    var socket = socket_connect(1);

    $(function () {
        socket.on('chat message', function (msg) {
            getChat();
        });
    });

    function runChat(event) {
        if (event.which == 13 || event.keyCode == 13) {
            saveChat();
            return false;
        }
        return true;
    };

    function saveChat() {
        var chatMsg = $("#msginput").val();
        if (chatMsg != '') {
            $.ajax({
                type: 'POST',
                url: "<?= Url::to(['site/savedata']); ?>",
                dataType: 'json',
                data: { chatMsg: chatMsg }
            })
                .done(function (data) {
                    socket.emit('chat message', chatMsg);
                    //mount(data);
                    $("#msginput").val("");
                });
        }
    }

    function getChat() {
        $.ajax({
            type: 'POST',
            url: "<?= Url::to(['site/getdata']); ?>",
            dataType: 'json',
            data: { 'room': 1 }
        })
            .done(function (data) {
                mount(data.data);
                $('#msgbox').scrollTop($('#msgbox')[0].scrollHeight);
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

    $(function () {
        getChat();
        $('#msgbox').scrollTop($('#msgbox')[0].scrollHeight);
        $('#msginput').focus();
    });

    function updateChat() {
        getChat();
        return false;
    }
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
