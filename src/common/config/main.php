<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

$db = require(__DIR__ . '/db.php');
$frontendUrlManager = require(FRONTEND_PATH . '/config/url-manager.php');

return [
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'bootstrap' => ['log',],
    'vendorPath' => APP_ROOT . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'defaultTimeZone' => 'Asia/Shanghai',
            'datetimeFormat' => 'php:Y-m-d H:i',
            'dateFormat' => 'php:Y-m-d',
            'timeFormat' => 'php:H:i:s',
            'nullDisplay' => '无'
        ],
        'fileSystem'=>[
            'class'=>'common\fileSystem\LocalFileSystem',
            'path'=>'@root/apps/backend/runtime'
        ],
        'db' => $db,
        'frontendUrlManager' => $frontendUrlManager,
    ],
];
