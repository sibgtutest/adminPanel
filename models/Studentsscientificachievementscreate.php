<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Studentsscientificachievementscreate extends Model
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

        $studentsscientificachievements = new Studentsscientificachievements();
        $studentsscientificachievements->userid = \Yii::$app->user->identity->id;
        $studentsscientificachievements->filename = $modelfilename;
        $studentsscientificachievements->description = 'Not description';
        $studentsscientificachievements->save();

    }
}