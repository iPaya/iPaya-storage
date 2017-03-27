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
    'id' => 'ipaya-backend',
    'name' => 'iPaya Backend',
    'bootstrap' => ['log'],
    'basePath' => BACKEND_PATH,
    'controllerNamespace' => 'backend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Manager',
            'loginUrl' => ['/site/login']
        ],
        'errorHandler' => [
            'errorAction' => '/site/error',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qiErKNMYkFyPKj7a36VPxQqiueSmOVSt',
        ],
    ],
    'container' => [
        'definitions' => [
        ]
    ],
    'params' => $params
];

if (getenv('APP_ENV') == 'dev') {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => [
            '*',
        ]
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => [
            '*',
        ],
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'default' => '@backend/gii/crud'
                ]
            ]
        ]
    ];
}

return $config;
