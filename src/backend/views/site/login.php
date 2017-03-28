<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

use backend\models\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this View
 * @var $form ActiveForm
 * @var $model LoginForm
 */
$this->title = '登录';
$this->params['bodyAttributes']['class'] = ['hold-transition', 'login-page'];
?>
<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= Yii::$app->homeUrl ?>"> 管理后台</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <?php
            $form = ActiveForm::begin();
            ?>

            <?= $form->field($model, 'email', [
                'options' => [
                    'class' => 'has-feedback'
                ],
                'template' => '{input} <span class="glyphicon glyphicon-user form-control-feedback"></span> {hint} {error}'
            ])->textInput(['placeholder' => '邮箱']) ?>

            <?= $form->field($model, 'password', [
                'options' => [
                    'class' => 'has-feedback'
                ],
                'template' => '{input} <span class="glyphicon glyphicon-lock form-control-feedback"></span> {hint} {error}'
            ])->passwordInput(['placeholder' => '密码']) ?>

            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>
                <!-- /.col -->
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.login-box-body -->
    </div>
</div>
