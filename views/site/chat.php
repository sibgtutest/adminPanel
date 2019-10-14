<?php

/* @var $this yii\web\View */

$this->title = 'Чат';
?>
<div class="wrap">
    <div class="container">
<div class="navbar-fixed-bottom row-fluid">
      <div class="navbar-inner">
          

    <div class="demo">
        <div class="chat">
            <div class="messages" id="messages"></div>
            <div class="panel">
                <span class="nick"></span>
              

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
        autofocus>
  </div>                 
    </div>
</div>
</div>
</div>
   