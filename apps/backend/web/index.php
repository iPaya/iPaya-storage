<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

defined('APP_ROOT') or define('APP_ROOT',   dirname(dirname(dirname(__DIR__))));

require(APP_ROOT . '/vendor/autoload.php');
require(APP_ROOT . '/src/bootstrap.php');
require(APP_ROOT . '/vendor/yiisoft/yii2/Yii.php');
require(COMMON_PATH . '/bootstrap.php');
require(BACKEND_PATH . '/bootstrap.php');

$config = ArrayHelper::merge(
    require(COMMON_PATH . '/config/main.php'),
    require(BACKEND_PATH . '/config/main.php')
);

$application = new yii\web\Application($config);
$application->run();

