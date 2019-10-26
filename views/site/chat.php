<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use app\models\User;

$id= \Yii::$app->user->identity->id;

$user = User::find()->where(['id' => $id])->limit(1)->one();

$this->title = 'Чат';
?>
<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div id="msgbox" class="box"></div>
                <div class="navbar-fixed-bottom row-fluid">
                    <div class="navbar-inner">
                        <div id="msgbox" class="box"></div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" id="msginput" placeholder="Type your message and press enter"
                    class="sizeinput form-control" onkeypress="return runChat(event)">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-send" onclick="saveChat()"></span>

                            </span>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-md-6 hidden-xs">
                <ui>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                </ui>
            </div>
        </div>
    </div>
</div>

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
        //var chatMsg = $("#msginput").val();
        var chatMsg = escape($("#msginput").val());
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

    function escape(string) {
        var htmlEscapes = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        };

        return string.replace(/[&<>"']/g, function(match) {
            return htmlEscapes[match];
        });
    };

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
            html += '<div><b>'
                        + "<?= $user->studname . ' ' . $user->middlename . ' ' . $user->familyname . ' ' ?>"
                        + '</b>' + chat.sent_at + '<b>'
                    + '</b></div>'
                    + '<div>' 
                        + chat.message 
                    + '</div>';
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