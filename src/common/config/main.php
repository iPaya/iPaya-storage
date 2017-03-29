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
        'fileSystem' => [
            'class' => 'common\fileSystem\OssFileSystem',
            'path' => '@root/apps/backend/runtime'
        ],
        'oss' => [
            'class' => 'common\oss\Client',
            'endpoint' => getenv('ALIYUN_OSS_ENDPOINT'),
            'accessKeyId' => getenv('ALIYUN_ACCESS_KEY_ID'),
            'accessKeySecret' => getenv('ALIYUN_ACCESS_KEY_SECRET'),
            'bucket' => getenv('ALIYUN_OSS_BUCKET')
        ],
        'db' => $db,
        'frontendUrlManager' => $frontendUrlManager,
    ],
];
