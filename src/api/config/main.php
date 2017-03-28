<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(
    require(COMMON_PATH . '/config/params.php'),
    require(__DIR__ . '/params.php')
);

$config = [
    'id' => 'ipaya-api',
    'name' => 'iPaya Api',
    'bootstrap' => ['log',],
    'basePath' => FRONTEND_PATH,
    'controllerNamespace' => 'api\controllers',
    'runtimePath' => APP_ROOT . '/apps/api/runtime',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Client',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // url rules
            ],
        ],

        'errorHandler' => [
            'errorAction' => '/site/error',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qiErKNMYkFyPKj7a36VPxQqiueSmOVSt',
        ],
        'response' => [
            'class' => 'yii\web\Response'
        ]
    ],
    'params' => $params
];

return $config;
