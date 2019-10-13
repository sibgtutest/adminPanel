<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Teachingplancreate extends Model
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

        $teachingplan = new Teachingplan();
        $teachingplan->userid = \Yii::$app->user->identity->id;
        $teachingplan->filename = $modelfilename;
        $teachingplan->description = 'Not description';
        $teachingplan->save();

    }
}