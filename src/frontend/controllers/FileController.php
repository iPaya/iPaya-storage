<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace frontend\controllers;


use common\models\File;
use frontend\components\Controller;
use yii\web\NotFoundHttpException;

class FileController extends Controller
{
    public function accessRules()
    {
        return [
            ['allow' => true, 'roles' => ['?', '@']]
        ];
    }

    public function actionView($id, $name = null)
    {
        $model = $this->findModel($id);

        \Yii::$app->response->sendContentAsFile($model->getContent(), $model->name, [
            'mimeType' => $model->mimeType,
            'inline' => $model->getIsImage()
        ]);
    }

    /**
     * Finds the File model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return File the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = File::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
