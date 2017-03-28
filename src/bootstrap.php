<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

if (file_exists(APP_ROOT . '/env.ini')) {
    $env = new Dotenv\Dotenv(APP_ROOT, 'env.ini');
    $env->load();
}

defined('APP_SRC_ROOT') or define('APP_SRC_ROOT', APP_ROOT . '/src');
defined('YII_DEBUG') or define('YII_DEBUG', getenv("APP_ENV") == 'prod' ? false : true);
defined('YII_ENV') or define('YII_ENV', getenv("APP_ENV") == '' ? 'dev' : getenv("APP_ENV"));

define('COMMON_PATH', APP_SRC_ROOT . '/common');
define('BACKEND_PATH', APP_SRC_ROOT . '/backend');
define('API_PATH', APP_SRC_ROOT . '/api');
define('FRONTEND_PATH', APP_SRC_ROOT . '/frontend');
define('CONSOLE_PATH', APP_SRC_ROOT . '/console');
