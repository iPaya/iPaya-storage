<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace api\components;


use yii\base\Model;
use yii\web\Response;

class ModelErrorResult extends Model
{
    public $name;
    public $message;
    public $statusCode;
    public $errors = [];


    /**
     * @param Model $model
     * @param array $config
     */
    public function __construct($model, array $config = [])
    {
        if ($model->hasErrors()) {
            $this->statusCode = 422;
            $this->message = '数据验证失败';
            foreach ($model->getErrors() as $attribute => $errors) {
                $this->errors[] = [
                    'field' => $attribute,
                    'message' => $errors
                ];
            }
        }

        parent::__construct($config);
    }

    public function init()
    {
        parent::init();
        $this->name = $this->getName();
    }

    public function getName()
    {
        if (isset(Response::$httpStatuses[$this->statusCode])) {
            return Response::$httpStatuses[$this->statusCode];
        } else {
            return 'Error';
        }
    }
}
