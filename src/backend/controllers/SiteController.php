<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace backend\controllers;


use yii\web\Controller;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    public function accessRules()
    {
        return [
            ['allow' => true, 'actions' => ['error'], 'roles' => ['@', '?']],
        ];
    }

    public function verbs()
    {
        return [];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className(),
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
