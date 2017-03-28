<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */


use common\models\File;
use iPaya\fontAwesome\Fa;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this View
 * @var $model File
 */
?>
<div class="media">
    <div class="media-left" style="padding-right: 15px;width: 240px;">
        <a href="#">
            <?php if ($model->getIsImage()): ?>
                <?= Html::img($model->getUrl(),['class'=>'media-object','style'=>'max-width: 90px']) ?>
            <?php else:?>
                <?=Fa::i('file fa-5x fa-fw')?>
            <?php endif; ?>
        </a>
    </div>
    <div class="media-body">
        <h3 class="media-heading"><?=$model->name?></h3>
        <p>
            <b>MD5</b>
            <code><?=$model->md5?></code>
        </p>
    </div>
</div>
