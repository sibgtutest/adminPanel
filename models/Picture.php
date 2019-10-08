<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Picture model
 *
 * @property integer $id
 * @property integer $userid
 * @property string $filename
 * @property string $description
 */
class Picture extends ActiveRecord
{

}