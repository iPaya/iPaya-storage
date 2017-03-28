<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace api\controllers;


use api\components\Controller;
use api\components\ModelErrorResult;
use api\models\UploadFileForm;
use common\models\Client;
use common\models\File;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    public function verbs()
    {
        return [
            'file' => ['POST']
        ];
    }

    /**
     * @return ModelErrorResult|File
     */
    public function actionFile()
    {
        /** @var Client $client */
        $client = \Yii::$app->user->getIdentity();

        // 测试时，直接返回结果，不进行处理
        if ($client->isNewRecord) {
            return [
                'name' => 'test',
                'url' => 'http://this-is-a-test-file',
            ];
        }

        $uploadedFile = UploadedFile::getInstanceByName('file');
        $model = new UploadFileForm([
            'client' => $client
        ]);
        $model->uploadedFile = $uploadedFile;

        if ($model->upload()) {
            return $model->file;
        } else {
            return new ModelErrorResult($model);
        }
    }
}
