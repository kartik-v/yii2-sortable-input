<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-sortable-input
 * @version 1.2.1
 */

namespace kartik\sortinput;

use kartik\base\AssetBundle;

/**
 * SortableInput bundle for [[SortableInput]]
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class SortableInputAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/kv-sortable-input']);
        parent::init();
    }

}