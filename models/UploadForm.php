<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UploadForm extends Model
{
 
    public $file;
    //public $description;
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => false],
            //[['description'], 'required'],
        ];
    }

    public function save($id)
    {
        /*if (!$this->validate()) {
            return null;
        }*/
        $user = new Picture();
        $user->userid = $id;
        $user->filename = $this->file;
        $user->description = '12345';
        $user->save();
    }
}