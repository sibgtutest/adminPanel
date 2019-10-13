<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Studentssportingachievementscreate extends Model
{ 
    public $filename;

    public function rules()
    {
        return [
            [['filename'], 'file', 'extensions' => 'pdf', 'skipOnEmpty' => false],
        ];
    }

    public function save($modelfilename)
    {
        /*if (!$this->validate()) {
            return null;
        }*/

        $studentssportingachievements = new Studentssportingachievements();
        $studentssportingachievements->userid = \Yii::$app->user->identity->id;
        $studentssportingachievements->filename = $modelfilename;
        $studentssportingachievements->description = 'Not description';
        $studentssportingachievements->save();

    }
}