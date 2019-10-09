<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UploadTeachingplan extends Model
{ 
    public $filename;
    public $description;

    public function rules()
    {
        return [
            //['filename', 'trim'],
            //['filename', 'unique', 'targetClass' => '\app\models\Teachingplan', 'message' => 'This Teachingplan address has already been taken.'],
            //['description', 'trim'],
           [['filename', 'description'], 'required'],
        ];
    }

    public function save($id)
    {
        /*if (!$this->validate()) {
            return null;
        }*/
        
        $teachingplan = new Teachingplan();
        $teachingplan->userid = $id;
        $teachingplan->filename = $this->filename;
        $teachingplan->description = $this->description;
        $teachingplan->save();
    }
}