<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Canvas model
 *
 * @property integer $id
 * @property integer $userid
 * @property string $filename
 * @property string $description
 */
class Canvas extends ActiveRecord
{

}