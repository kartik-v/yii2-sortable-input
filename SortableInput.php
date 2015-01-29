<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-sortable-input
 * @version 1.2.0
 */

namespace kartik\sortinput;

use yii\helpers\Html;
use yii\base\InvalidConfigException;
use kartik\sortable\Sortable;

/**
 * A sortable input list widget based on yii2-sortable widget.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class SortableInput extends \kartik\base\InputWidget
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
     * @var array the sortable data list. You must set it up as `$key => $value` format, where
     * - key: int/string, the unique identifier (key) for the item, which will be internally stored.
     * - value: array, is the configuration for the items array in sortable widget and can consist of the following properties:
     *   - content: string, the content to display for the item (this is not HTML encoded). If this is not set,
     *     it will default the `key` setting.
     *   - disabled: bool, whether the list item is disabled
     *   - options: array, the HTML attributes for the list item.
     */
    public $items;

    /**
     * @var bool whether to hide the input which stores the sorted order.
     * Defaults to `true`.
     */
    public $hideInput = true;

    /**
     * @var array HTML attributes for the input which stores the sorted order.
     */
    public $options = ['class' => 'form-control'];

    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();
        $this->initItems();
        $id = $this->options['id'] . '-sortable';
        $this->sortableOptions['options']['id'] = $id;
        $this->options['data-sortable'] = $id;
        $this->registerAssets();
        $input = $this->hideInput ? 'hiddenInput' : 'textInput';
        echo Sortable::widget($this->sortableOptions) . PHP_EOL . $this->getInput($input);
    }

    /**
     * Initialize the sortable input items
     *
     * @throws InvalidConfigException
     */
    protected function initItems()
    {
        $items = [];
        $this->arrangeItems();
        foreach ($this->items as $key => $item) {
            if (!isset($item['content'])) {
                $item['content'] = $key;
            }
            $item['options']['data-key'] = $key;
            $items[] = $item;
        }
        $this->sortableOptions['items'] = $items;
    }

    /**
     * Arranges items based on initial value
     */
    protected function arrangeItems() 
    {
        if (empty($this->value)) {
            return;
        }
        $keys = explode($this->delimiter, $this->value);
        if (!is_array($keys) || count($keys) == 0) {
            return;
        }
        $items = [];
        foreach ($keys as $key) {
            $items[$key] = $this->items[$key];
        }
        $this->items = $items;
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
        $this->registerPlugin('sortableInput');
    }
}