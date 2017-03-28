<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace console\migrations;

use console\components\Migration;

class M170328030556CreateTableFile extends Migration
{
    public $tableName = "{{%file}}";


    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(200)->notNull()->comment('名称'),
            'extension' => $this->string(100)->comment('扩展名'),
            'mimeType' => $this->string(100)->comment('Mime Type'),
            'fileSize' => $this->bigInteger()->notNull()->unsigned()->comment('文件大小'),
            'md5' => $this->string(32)->notNull()->comment('文件MD5'),
            'path' => $this->string(200)->notNull()->comment('文件存储路径'),
            'uploadedAt' => $this->integer()->notNull()->comment('上传时间'),
            'createdAt' => $this->integer()->comment('创建时间'),
            'updatedAt' => $this->integer()->comment('更新时间'),
        ], $this->tableOptions . ' comment "文件表"');

        $this->createIndex('idx-file-md5', $this->tableName, 'md5');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
