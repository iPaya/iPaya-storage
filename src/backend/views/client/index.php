<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use yii\helpers\Html;
use backend\widgets\ActionColumn;
use yii\grid\GridView;

/**
 * @var $this yii\web\View
 * @var $searchModel backend\models\ClientSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = '客户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">
    <div class="box">
        <div class="box-body">
            <p>
                <?= Html::a('新增客户', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'name',
                    'appId',
                    'appSecret',
                    'createdAt:datetime',

                    ['class' => ActionColumn::className()],
                ],
            ]); ?>
        </div>
    </div>
</div>
