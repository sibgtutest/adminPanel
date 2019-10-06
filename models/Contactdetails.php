<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Contactdetails model
 *
 * @property integer $id
 * @property integer $userid
 * @property string $studname
 * @property string $middlename
 * @property string $familyname
 * @property integer $birthdate
 * @property integer $yearset
 * @property string $formeducation
 * @property string $lineeducation
 * @property string $status
 */
class Contactdetails extends ActiveRecord
{

}