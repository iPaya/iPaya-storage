<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use backend\widgets\SidebarNav;
use common\helpers\SettingGroupHelper;
use yii\web\View;

/**
 * @var $this View
 */

$sidebarItems = [
    '<li class="header">导航</li>',
    [
        'label'=>'文件',
        'items'=>[
            ['label'=>'文件列表','url'=>['/file/index']],
        ]
    ],
    [
        'label'=>'客户',
        'items'=>[
            ['label'=>'客户列表','url'=>['/client/index']],
            ['label'=>'新增客户','url'=>['/client/create']],
        ]
    ],
];
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?= SidebarNav::widget([
            'options' => [
                'class' => 'sidebar-menu'
            ],
            'items' => $sidebarItems
        ]) ?>
    </section>
    <!-- /.sidebar -->
</aside>
