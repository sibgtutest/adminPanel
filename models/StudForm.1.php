<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class StudForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $studname;
    public $middlename;
    public $familyname;
    public $birthdate;
    public $yearset;
    public $formeducation;
    public $lineeducation;
    public $status;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            //['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Это имя пользователя уже было принято.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            //['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот адрес электронной почты уже был взят.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['studname', 'trim'],
            ['studname', 'string', 'max' => 255],
            ['middlename', 'trim'],
            ['middlename', 'string', 'max' => 255],
            ['familyname', 'trim'],
            ['familyname', 'string', 'max' => 255],
            ['birthdate', 'date', 'format' => 'm-d-Y'],
            ['yearset', 'number', 'min' => 2010],
            ['yearset', 'number', 'max' => 2100],
            ['formeducation', 'trim'],
            ['formeducation', 'string', 'max' => 255],
            ['lineeducation', 'trim'],
            ['lineeducation', 'string', 'max' => 255],
            ['status', 'trim'],
            ['status', 'string', 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }
        $id = \Yii::$app->user->identity->id;
        //$user = new User();
        $user = User::findOne($id);//::findByEmail($this->email);
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if (!($contactdetails = Contactdetails::findOne(['userid' => $id]))) {
            $contactdetails = new Contactdetails();
        }
        $contactdetails->userid =  $id;
        $contactdetails->studname =  $this->studname;
        $contactdetails->middlename =  $this->middlename;
        $contactdetails->familyname =  $this->familyname;
        $contactdetails->birthdate =  $this->birthdate;
        $contactdetails->yearset =  $this->yearset;
        $contactdetails->formeducation =  $this->formeducation;
        $contactdetails->lineeducation =  $this->lineeducation;
        $contactdetails->status =  $this->status;

        return ($user->save() && $contactdetails->save()) ? $user : null;
    }

}