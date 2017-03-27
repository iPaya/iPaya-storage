<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'ipaya-storage-console',
    'name' => 'iPaya Storage Console',
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'bootstrap' => ['log',],
    'basePath' => APP_SRC_ROOT,
    'controllerNamespace' => 'app\commands',
    'vendorPath' => APP_ROOT . '/vendor',
    'runtimePath' => APP_ROOT . '/runtime',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'app\components\Formatter',
            'defaultTimeZone' => 'Asia/Shanghai',
            'datetimeFormat' => 'php:Y-m-d H:i',
            'dateFormat' => 'php:Y-m-d',
            'timeFormat' => 'php:H:i:s',
            'nullDisplay' => '无'
        ],
        'db' => $db
    ],
    'params' => $params
];
