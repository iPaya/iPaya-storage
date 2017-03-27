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

return [
    'id' => 'ipaya-console',
    'name' => 'iPaya Console',
    'basePath' => CONSOLE_PATH,
    'controllerNamespace' => 'console\controllers',
    'params' => $params
];
