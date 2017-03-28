<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%client}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $appId
 * @property string $appSecret
 * @property integer $createdAt
 * @property integer $updatedAt
 */
class BaseClient extends \common\models\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%client}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'appId', 'appSecret'], 'required'],
            [['createdAt', 'updatedAt'], 'integer'],
            [['name', 'appId', 'appSecret'], 'string', 'max' => 50],
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
            'appId' => 'App ID',
            'appSecret' => 'App Secret',
            'createdAt' => '创建时间戳',
            'updatedAt' => '更新时间戳',
        ];
    }
}
