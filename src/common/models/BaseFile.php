<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%file}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $extension
 * @property string $mimeType
 * @property string $fileSize
 * @property string $md5
 * @property string $path
 * @property integer $uploadedAt
 * @property integer $createdAt
 * @property integer $updatedAt
 */
class BaseFile extends \common\models\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'fileSize', 'md5', 'path', 'uploadedAt'], 'required'],
            [['fileSize', 'uploadedAt', 'createdAt', 'updatedAt'], 'integer'],
            [['name', 'path'], 'string', 'max' => 200],
            [['extension', 'mimeType'], 'string', 'max' => 100],
            [['md5'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'extension' => '扩展名',
            'mimeType' => 'Mime Type',
            'fileSize' => '文件大小',
            'md5' => '文件MD5',
            'path' => '文件存储路径',
            'uploadedAt' => '上传时间',
            'createdAt' => '创建时间',
            'updatedAt' => '更新时间',
        ];
    }
}
