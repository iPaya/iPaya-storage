<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace frontend\controllers;


use frontend\components\Controller;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    public function accessRules()
    {
        return [
            ['allow' => true, 'roles' => ['?', '@']]
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className(),
            ],
        ];
    }

    public function actionIndex()
    {
        return 'success';
    }
}
