<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace console\migrations;

use console\components\Migration;

class M170328024729CreateTableClient extends Migration
{
    public $tableName = '{{%client}}';


    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->comment('姓名'),
            'appId' => $this->string(50)->notNull()->comment('App ID'),
            'appSecret' => $this->string(50)->notNull()->comment('App Secret'),
            'createdAt' => $this->integer()->comment('创建时间戳'),
            'updatedAt' => $this->integer()->comment('更新时间戳'),
        ], $this->tableOptions . ' comment "客户表"');

        $this->createIndex('idx-client-appId', $this->tableName, 'appId');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
