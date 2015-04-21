yii2-sortable-input
===================

[![Latest Stable Version](https://poser.pugx.org/kartik-v/yii2-sortable-input/v/stable)](https://packagist.org/packages/kartik-v/yii2-sortable-input)
[![License](https://poser.pugx.org/kartik-v/yii2-sortable-input/license)](https://packagist.org/packages/kartik-v/yii2-sortable-input)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-sortable-input/downloads)](https://packagist.org/packages/kartik-v/yii2-sortable-input)
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-sortable-input/d/monthly)](https://packagist.org/packages/kartik-v/yii2-sortable-input)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-sortable-input/d/daily)](https://packagist.org/packages/kartik-v/yii2-sortable-input)

An input widget for Yii 2.0 widget based on the [yii2-sortable](http://demos.krajee.com/sortable) extension that allows you to create sortable-input lists and grids and manipulate them 
using simple drag and drop. It extends the yii2-sortable features by allowing you to store the sort order in a form input (which is hidden by default). The widget stores the order as
delimited list item keys. The widget includes additional jQuery enhancements to initialize the list, trap sortable order change, and reset order on form reset. 

### Demo
You can see detailed [documentation](http://demos.krajee.com/sortable-input) on usage of the extension.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> NOTE: Check the [composer.json](https://github.com/kartik-v/yii2-sortable-input/blob/master/composer.json) for this extension's requirements and dependencies. Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require kartik-v/yii2-sortable-input "dev-master"
```

or add

```
"kartik-v/yii2-sortable-input": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

### SortableInput

```php
use kartik\sortinput\SortableInput;
echo SortableInput::widget([
    'model' => $model,
    'attribute' => 'sort_list',
    'hideInput' => false,
    'delimiter' => '~',
    'items' => [
        1 => ['content' => 'Item # 1'],
        2 => ['content' => 'Item # 2'],
        3 => ['content' => 'Item # 3'],
        4 => ['content' => 'Item # 4', 'disabled'=>true],
    ]   
]);
```

## License

**yii2-sortable-input** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.