<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-sortable-input
 * @version 1.2.0
 */

namespace kartik\sortinput;

/**
 * SortableInput bundle for \kartik\sortinput\SortableInput
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class SortableInputAsset extends \kartik\base\AssetBundle
{

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/kv-sortable-input']);
        parent::init();
    }

}