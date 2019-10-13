<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Studentarticlescreate extends Model
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

        $studentarticles = new Studentarticles();
        $studentarticles->userid = \Yii::$app->user->identity->id;
        $studentarticles->filename = $modelfilename;
        $studentarticles->description = 'Not description';
        $studentarticles->save();

    }
}