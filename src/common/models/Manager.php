<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;

use common\helpers\ManagerStatusHelper;
use yii\web\IdentityInterface;

/**
 *
 */
class Manager extends BaseManager implements IdentityInterface
{
    /**
     * @inheritdoc
     * @return ManagerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ManagerQuery(get_called_class());
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        return $authKey === $this->getAuthKey();
    }

    /**
     * 设置密码
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->passwordHash = \Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * 验证密码
     *
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->passwordHash);
    }

    /**
     * 生成授权秘钥
     *
     * @return string
     */
    public function generateAuthKey()
    {
        return $this->authKey = \Yii::$app->security->generateRandomString();
    }

    /**
     * @param string $email
     * @return Manager|null
     */
    public static function findByEmail($email)
    {
        return static::find()
            ->andWhere(['email' => trim($email)])
            ->one();
    }

    /**
     * 账号是否被锁定
     *
     * @return bool
     */
    public function getIsBlocked()
    {
        return $this->status == ManagerStatusHelper::STATUS_BLOCKED;
    }
}
