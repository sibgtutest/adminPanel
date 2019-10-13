<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studentssportingachievements".
 *
 * @property int $id
 * @property int $userid
 * @property string $filename
 * @property string $description
 * @property string $status
 */
class Studentssportingachievements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'studentssportingachievements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'filename', 'description'], 'required'],
            [['filename'], 'unique'],
            [['userid'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 64],
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
            'status' => 'Статус',
        ];
    }
}
