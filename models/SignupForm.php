<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model{
    public $username;
    public $password; 
    public $email;
    
    public function rules() {
        return [
        [['username', 'password', 'email'], 'required',],
        ['username', 'unique', 'targetClass' => User::className(), 'message' => 'Этот логин уже занят'],
        ['email', 'email'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'E-mail',
            ];
    }
}
