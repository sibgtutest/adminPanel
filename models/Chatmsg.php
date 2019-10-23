<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Chatmsg
 */
class Chatmsg extends Model
{
    public $chatMsg;

    public function rules()
    {
        return [
            ['chatMsg', 'required'],
            ['chatMsg', 'string'],
        ];
    }

    public function chatMsg()
    {
        return $this->chatMsg;
    }

}