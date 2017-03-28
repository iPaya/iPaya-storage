<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace api\components;


use common\models\Client;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;

class Controller extends \yii\rest\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = [];
        $verbs = $this->verbs();

        $behaviors[] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]
        ];

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' => function ($appId, $appSecret) {
                        return Client::find()
                            ->andWhere([
                                'appId' => $appId,
                                'appSecret' => $appSecret
                            ])
                            ->one();
                    }
                ]
            ]
        ];

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
