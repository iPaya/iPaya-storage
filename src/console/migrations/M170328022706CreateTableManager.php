<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace console\migrations;

use console\components\Migration;

class M170328022706CreateTableManager extends Migration
{
    public $tableName = '{{%manager}}';


    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->comment('姓名'),
            'email' => $this->string(200)->notNull()->comment('邮箱地址'),
            'passwordHash' => $this->string(100)->comment('加密密码'),
            'authKey' => $this->string(100)->comment('授权秘钥'),
            'status' => 'enum("active", "blocked") not null default "active" comment "状态"',
            'createdAt' => $this->integer()->comment('创建时间戳'),
            'updatedAt' => $this->integer()->comment('更新时间戳'),
        ], $this->tableOptions . ' comment "管理员表"');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
