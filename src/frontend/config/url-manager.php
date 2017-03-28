<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */


return [
    'class' => 'yii\web\UrlManager',
    'baseUrl' => getenv('FRONTEND_BASE_URL'),
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        // url rules
        '/file/<id:\d+>/<name:.*>' => '/file/view'
    ],
];
