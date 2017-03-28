<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;

use Yii;

/**
 *
 * @property Client $client
 * @property File $file
 */
class ClientFile extends BaseClientFile
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'clientId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::className(), ['id' => 'fileId']);
    }

    /**
     * @inheritdoc
     * @return ClientFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientFileQuery(get_called_class());
    }
}
