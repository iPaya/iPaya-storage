<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace backend\models;


use common\models\Manager;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;

    private $_manager = false;


    public function attributeLabels()
    {
        return [
            'email' => '邮箱',
            'password' => '密码'
        ];
    }

    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['password', 'required'],
            ['password', 'validatePassword']
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $manager = $this->getManager();
            if (!$manager || !$manager->validatePassword($this->password)) {
                $this->addError($attribute, '邮箱或密码错误.');
            } elseif ($manager->getIsBlocked()) {
                $this->addError($attribute, '您的账号已被锁定.');
            }
        }
    }

    /**
     * @return bool
     */
    public function login()
    {
        if (!$this->validate()) {
            return false;
        }
        return \Yii::$app->user->login($this->getManager());
    }

    /**
     * @return Manager|bool|null
     */
    public function getManager()
    {
        if (!$this->_manager) {
            $this->_manager = Manager::findByEmail($this->email);
        }

        return $this->_manager;
    }
}
