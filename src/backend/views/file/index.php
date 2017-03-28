<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var $this yii\web\View
 * @var $searchModel backend\models\FileSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = '文件列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-index">
    <div class="box">
        <div class="box-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <p style="margin-top: 15px;">
                <?= Html::a('上传文件', ['create'], ['class' => 'btn btn-success', 'data-toggle' => 'ajax-modal']) ?>
            </p>

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['tag' => false],
                'itemView' => '_view',
                'separator' => '<hr />',
            ]) ?>
        </div>
    </div>
</div>
