<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this View
 * @var $name string
 * @var $message string
 * @var $exception Exception
 */

$this->title = $name;
Yii::$app->controller->layout = 'base';
?>
<div class="site-error">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>
    </div>
</div>
