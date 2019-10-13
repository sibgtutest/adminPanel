<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Studentssocialachievementscreate extends Model
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

        $studentssocialachievements = new Studentssocialachievements();
        $studentssocialachievements->userid = \Yii::$app->user->identity->id;
        $studentssocialachievements->filename = $modelfilename;
        $studentssocialachievements->description = 'Not description';
        $studentssocialachievements->save();

    }
}