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
$urlManager = require(__DIR__.'/url-manager.php');

$config = [
    'id' => 'ipaya-frontend',
    'name' => 'iPaya Frontend',
    'bootstrap' => ['log',],
    'basePath' => FRONTEND_PATH,
    'controllerNamespace' => 'frontend\controllers',
    'runtimePath' => APP_ROOT . '/apps/frontend/runtime',
    'components' => [
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['/login/index']
        ],
        'urlManager' => $urlManager,
        'errorHandler' => [
            'errorAction' => '/site/error',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qiErKNMYkFyPKj7a36VPxQqiueSmOVSt',
        ],
        'response'=>[
            'class'=>'yii\web\Response'
        ]
    ],
    'params' => $params
];

return $config;
