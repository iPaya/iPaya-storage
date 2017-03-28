<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace console\migrations;

use common\models\Manager;
use console\components\Migration;

class M990328024133Init extends Migration
{
    public function up()
    {
        $this->initManagers();
    }

    public function down()
    {
        $this->delete('{{%manager}}', ['id' => 1]);
    }

    protected function initManagers()
    {
        $model = new Manager();
        $model->id = 1;
        $model->name = '管理员';
        $model->email = 'admin@ipaya.cn';
        $model->generateAuthKey();
        $model->setPassword('123456');
        $model->save();
    }
}
