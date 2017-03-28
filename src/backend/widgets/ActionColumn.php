<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace backend\widgets;


use yii\helpers\Html;
use Yii;


class ActionColumn extends \yii\grid\ActionColumn
{
    public $buttonOptions = [
        'class' => 'btn btn-sm'
    ];


    public function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye');
        $this->initDefaultButton('update', 'pencil');
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => '确认删除此项?',
            'data-method' => 'post',
        ]);
    }

    public function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        $buttonOptions = $this->buttonOptions;
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions, $buttonOptions) {
                switch ($name) {
                    case 'view':
                        $title = '查看';
                        Html::addCssClass($buttonOptions, 'btn-info');
                        break;
                    case 'update':
                        $title = '更新';
                        Html::addCssClass($buttonOptions, 'btn-primary');
                        break;
                    case 'delete':
                        $title = '删除';
                        Html::addCssClass($buttonOptions, 'btn-danger');
                        break;
                    default:
                        $title = ucfirst($name);
                }
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $buttonOptions);
                $icon = Html::tag('i', '', ['class' => "fa fa-$iconName"]);
                return Html::a($icon . ' ' . $title, $url, $options);
            };
        }
    }
}
