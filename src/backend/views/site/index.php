<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use yii\web\View;

/**
 * @var $this View
 * @var $fileTotal int
 * @var $todayUploadedTotal int
 */
$this->title ='首页';
$formatter = Yii::$app->formatter;
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">文件</span>
                    <span class="info-box-number"><?=$formatter->asInteger($fileTotal)?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">今日上传</span>
                    <span class="info-box-number"><?=$formatter->asInteger($todayUploadedTotal)?></span>
                </div>
            </div>
        </div>
    </div>
</div>

