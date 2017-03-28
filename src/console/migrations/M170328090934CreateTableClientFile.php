<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace console\migrations;

use console\components\Migration;

class M170328090934CreateTableClientFile extends Migration
{
    public $tableName = '{{%client_file}}';


    public function up()
    {
        $this->createTable($this->tableName, [
            'clientId' => $this->integer()->notNull()->comment('客户 ID'),
            'fileId' => $this->bigInteger()->notNull()->comment('文件 ID'),
            'uploadedAt' => $this->integer()->comment('上传时间戳'),
            'primary key(clientId, fileId)'
        ], $this->tableOptions . ' comment "客户文件表"');

        $this->addForeignKey('fk-client_file-clientId', $this->tableName, 'clientId', '{{%client}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-client_file-fileId', $this->tableName, 'fileId', '{{%file}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
