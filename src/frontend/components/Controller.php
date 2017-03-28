<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace frontend\components;


use common\models\Client;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\web\Response;

class Controller extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = [];
        $accessRules = $this->accessRules();
        $verbs = $this->verbs();

        if (count($accessRules) > 0) {
            $behaviors['access'] = [
                'class' => AccessControl::className(),
                'rules' => $accessRules,
            ];
        }

        if (count($verbs) > 0) {
            $behaviors['verbs'] = [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs()
            ];
        }

        return $behaviors;
    }

    /**
     * @return array
     * e.g.
     * [
     *     'logout' => [ 'post' ],
     * ]
     */
    public function verbs()
    {
        return [];
    }

    /**
     * @return array
     */
    public function trustActions()
    {
        return [];
    }

    /**
     * @return array
     */
    public function accessRules()
    {
        return [
            ['allow' => true, 'roles' => ['@']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (in_array($action->id, $this->trustActions())) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}
