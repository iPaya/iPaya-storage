<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%manager}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $passwordHash
 * @property string $authKey
 * @property string $status
 * @property integer $createdAt
 * @property integer $updatedAt
 */
class BaseManager extends \common\models\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%manager}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['status'], 'string'],
            [['createdAt', 'updatedAt'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 200],
            [['passwordHash', 'authKey'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'email' => '邮箱地址',
            'passwordHash' => '加密密码',
            'authKey' => '授权秘钥',
            'status' => '状态',
            'createdAt' => '创建时间戳',
            'updatedAt' => '更新时间戳',
        ];
    }
}
