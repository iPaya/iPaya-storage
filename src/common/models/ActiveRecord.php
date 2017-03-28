<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;


use yii\behaviors\TimestampBehavior;

/**
 * 基础 ActiveRecord 类
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors[] = [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => $this->hasAttribute('createdAt') ? 'createdAt' : false,
            'updatedAtAttribute' => $this->hasAttribute('updatedAt') ? 'updatedAt' : false,
        ];

        return $behaviors;
    }

}
