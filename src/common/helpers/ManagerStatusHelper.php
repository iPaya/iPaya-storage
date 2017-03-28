<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\helpers;


class ManagerStatusHelper extends BaseEnumHelper
{
    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    /**
     * @inheritDoc
     */
    static function getItems()
    {
        return [
            self::STATUS_ACTIVE => '激活',
            self::STATUS_BLOCKED => '锁定',
        ];
    }
}
