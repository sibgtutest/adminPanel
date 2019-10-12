<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studentsacademicwork".
 *
 * @property int $id
 * @property int $userid
 * @property string $filename
 * @property string $description
 */
class Studentsacademicwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachingplan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'filename', 'description'], 'required'],
            [['userid'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'filename' => 'Имя файла',
            'description' => 'Описание',
        ];
    }
}
