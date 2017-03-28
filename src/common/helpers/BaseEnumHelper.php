<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\helpers;


use yii\helpers\ArrayHelper;

abstract class BaseEnumHelper
{
    /**
     * @inheritdoc
     */
    public static function get($name)
    {
        return ArrayHelper::getValue(static::getItems(), $name);
    }

    /**
     * @inheritdoc
     */
    abstract public static function getItems();
}
