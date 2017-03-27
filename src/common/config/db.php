<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

$host = getenv('MYSQL_HOST');
$db = getenv('MYSQL_DB');
$username = getenv('MYSQL_USERNAME');
$password = getenv('MYSQL_PASSWORD');

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$host};dbname={$db}",
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
    'tablePrefix' => 'tbl_'
];
