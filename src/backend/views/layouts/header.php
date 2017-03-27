<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use yii\bootstrap\Nav;
use yii\web\View;

/**
 * @var $this View
 */

$rightNavItems = [
    ['label' => 'iPaya', 'items' => [
        ['label' => '退出登录', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
    ]]
];
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= Yii::$app->homeUrl ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= Yii::$app->name ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= Yii::$app->name ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <?= Nav::widget([
            'options' => [
                'class' => 'navbar-nav'
            ],
        ]) ?>
        <div class="navbar-custom-menu">
            <?= Nav::widget([
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav'
                ],
                'items' => $rightNavItems
            ]) ?>
        </div>
    </nav>
</header>
