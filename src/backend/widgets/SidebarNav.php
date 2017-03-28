<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace backend\widgets;


use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap\Nav;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SidebarNav extends Nav
{
    public $activateParents = true;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = Yii::$app->request->getQueryParams();
        }
        Html::removeCssClass($this->options, ['widget' => 'nav']);
        Html::addCssClass($this->options, ['widget' => 'sidebar-menu']);
    }

    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }
        $label = Html::tag('span', $label);
        if (empty($items)) {
            $items = '';
        } else {
            $label .= '<i class="fa fa-angle-left pull-right"></i>';
            Html::addCssClass($options, ['widget' => 'treeview']);
            if (is_array($items)) {
                if ($this->activateItems) {
                    $items = $this->isChildActive($items, $active);
                }
                $items = $this->renderChildItems($items, $item, $active);
            }
        }
        if ($this->activateItems && $active) {
            Html::addCssClass($options, 'active');
        }
        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
    }

    /**
     * Check to see if a child item is active optionally activating the parent.
     * @param array $items @see items
     * @param boolean $active should the parent be active too
     * @return array @see items
     */
    protected function isChildActive($items, &$active)
    {
        foreach ($items as $i => $child) {
            if (isset($child['items']) && is_array($child['items'])) {
                $this->isChildActive($child['items'], $active);
            }
            if (ArrayHelper::remove($items[$i], 'active', false) || $this->isItemActive($child)) {
                Html::addCssClass($items[$i]['options'], 'active');
                if ($this->activateParents) {
                    $active = true;
                }
            }
        }
        return $items;
    }

    /**
     * Renders the given items as a dropdown.
     * This method is called to create sub-menus.
     * @param array $items the given items. Please refer to [[Dropdown::items]] for the array structure.
     * @param array $parentItem the parent item information. Please refer to [[items]] for the structure of this array.
     * @param bool $active
     * @return string the rendering result.
     * @since 2.0.1
     */
    protected function renderChildItems($items, $parentItem, &$active)
    {
        $newItems = [];
        $options = ['class' => 'treeview-menu'];
        foreach ($items as $item) {
            if (ArrayHelper::getValue($item, 'options.class', '') == 'active') {
                $active = true;
            }
            $newItems[] = $this->renderItem($item);
        }
        ob_start();
        if ($active) {
            Html::addCssClass($options, 'menu-open');
        }
        echo Html::beginTag('ul', $options);
        echo implode("\n", $newItems);
        echo Html::endTag('ul');
        return ob_get_clean();
    }
}
