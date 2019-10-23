<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $number
 * @property int $year
 * @property string $form
 * @property string $direction
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'year', 'form', 'direction'], 'required'],
            [['year'], 'integer'],
            [['form', 'direction'], 'string'],
            [['number'], 'string', 'max' => 10],
            [['number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'year' => 'Year',
            'form' => 'Form',
            'direction' => 'Direction',
        ];
    }
}
