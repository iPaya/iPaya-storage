<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license/
 */


use iPaya\alert\Alert;
use yii\bootstrap\Modal;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/**
 * @var $this View
 * @var $content string
 */
$this->beginContent(__DIR__ . '/base.php');
?>
<div class="wrapper">
    <?= $this->render('header') ?>
    <?= $this->render('sidebar') ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?= $this->title ?></h1>
            <?= Breadcrumbs::widget([
                'options' => [
                    'class' => 'breadcrumb',
                ],
                'homeLink' => ['label' => '首页', 'url' => ['/dashboard/default/index']],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>
        <!-- Main content -->
        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>
    </div>
    <?= $this->render('footer') ?>
    <?php if (isset($this->params['rightBar'])): ?>
        <?= $this->render('_right', $this->params['rightBar']) ?>
    <?php endif; ?>
</div>
<?php Modal::begin([
    'id' => 'modal-default',
    'header' => '<h4 class="modal-title">操作</h4>'
]) ?>
<?php Modal::end() ?>
<?php $this->endContent(); ?>
