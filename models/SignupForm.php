<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $status;
    public $studname;
    public $middlename;
    public $familyname;
    public $birthdate;
    public $yearset;
    public $formeducation;
    public $lineeducation;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Это имя пользователя уже было принято.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот адрес электронной почты уже был взят.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['status', 'string'],
            ['studname', 'string', 'min' => 2, 'max' => 255],
            ['middlename', 'string', 'min' => 2, 'max' => 255],
            ['familyname', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        /*if (!$this->validate()) {
            return null;
        }*/

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = $this->status;
        $user->studname = $this->studname;
        $user->middlename = $this->middlename;
        $user->familyname = $this->familyname;
        return $user->save() ? $user : null;

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'email' => 'Электронный адресс',
            'password' => 'Пароль',
            'status' => 'Группа',
            'studname' => 'Имя',
            'middlename' => 'Отчество',
            'familyname' => 'Фамилия',
        ];
    }

}