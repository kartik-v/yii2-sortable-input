<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-sortable-input
 * @version 1.0.0
 */

namespace kartik\sortinput;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\sortable\Sortable;

/**
 * A sortable input list widget based on yii2-sortable widget.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class SortableInput extends \kartik\widgets\InputWidget
{
    /**
     * @var array the widget options for `kartik\sortable\Sortable` widget.
     */
    public $sortableOptions = ['type' => Sortable::TYPE_LIST];

    /**
     * @var string the delimiter that will be used for separating the id keys
     * to store the sorted values in the hidden input
     */
    public $delimiter = ',';

    /**
     * @var array the sortable data list. This allows the following properties to be setup:
     * - id: int/string, the unique identifier for the item, which will be internally stored. This is mandatory.
     * - content: string, the content to display for the item (this is not HTML encoded)
     * - disabled: bool, whether the list item is disabled
     * - options: array, the HTML attributes for the list item.
     */
    public $items;

    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();
        $this->initItems();
        $this->sortableOptions['options']['id'] = $this->options['id'] . '-sortable';
        $this->registerAssets();
        echo Sortable::widget($this->sortableOptions) . PHP_EOL . $this->getInput('hiddenInput');
    }

    /**
     * Initialize the sortable input items
     *
     * @throws InvalidConfigException
     */
    protected function initItems()
    {
        $items = [];
        foreach ($this->items as $item) {
            if (empty($item['id'])) {
                throw new InvalidConfigException('The "id" property must be set for every "item" in the "items" array.');
            }
            $item['options']['data-key'] = $item['id'];
            unset($item['id']);
            $items[] = $item;
        }
        $this->sortableOptions['items'] = $items;
    }

    /**
     * Register client assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        SortableInputAsset::register($view);
        $this->pluginOptions = [
            'sortableId' => $this->sortableOptions['options']['id'],
            'delimiter' => $this->delimiter
        ];
        $view->registerPlugin('sortableInput');
    }
}