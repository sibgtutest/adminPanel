<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Studentsacademicworkcreate extends Model
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

        $studentsacademicwork = new Studentsacademicwork();
        $studentsacademicwork->userid = \Yii::$app->user->identity->id;
        $studentsacademicwork->filename = $modelfilename;
        $studentsacademicwork->description = 'Not description';
        $studentsacademicwork->save();

    }
}