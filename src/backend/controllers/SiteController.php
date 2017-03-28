<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace backend\controllers;


use backend\components\Controller;
use backend\models\LoginForm;
use common\models\File;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    public function accessRules()
    {
        return [
            ['allow' => true, 'actions' => ['error', 'login'], 'roles' => ['?', '@']],
            ['allow' => true, 'roles' => ['@']]
        ];
    }

    public function verbs()
    {
        return [
            'logout' => ['POST']
        ];
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
        $fileTotal = File::find()->count();
        $todayFrom = strtotime(date('Y-m-d') . ' 00:00:00');
        $todayTo = strtotime(date('Y-m-d') . ' 23:59:59');
        $todayUploadedTotal = File::find()
            ->andWhere(['>=', 'uploadedAt', $todayFrom])
            ->andWhere(['<=', 'uploadedAt', $todayTo])
            ->count();

        return $this->render('index', [
            'fileTotal' => $fileTotal,
            'todayUploadedTotal' => $todayUploadedTotal,
        ]);
    }

    /**
     * 登录
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $this->layout = 'base';
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    /**
     * 退出登录
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

}
