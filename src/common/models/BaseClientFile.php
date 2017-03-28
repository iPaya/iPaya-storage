<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%client_file}}".
 *
 * @property integer $clientId
 * @property integer $fileId
 * @property integer $uploadedAt
 */
class BaseClientFile extends \common\models\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%client_file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientId', 'fileId'], 'required'],
            [['clientId', 'fileId', 'uploadedAt'], 'integer'],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['clientId' => 'id']],
            [['fileId'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['fileId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clientId' => '客户 ID',
            'fileId' => '文件 ID',
            'uploadedAt' => '上传时间戳',
        ];
    }
}
