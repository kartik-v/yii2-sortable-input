yii2-sortable-input
===================

An input widget for Yii 2.0 widget based on [yii2-sortable](http://demos.krajee.com/sortable) extension that allows you to create sortable-input lists and grids and manipulate them 
using simple drag and drop. 

> NOTE: This extension depends on the [kartik-v/yii2-widgets](https://github.com/kartik-v/yii2-sortable) extension which in turn depends on the 
[yiisoft/yii2-bootstrap](https://github.com/yiisoft/yii2/tree/master/extensions/bootstrap) extension. Check the 
[composer.json](https://github.com/kartik-v/yii2-sortable-input/blob/master/composer.json) for this extension's requirements and dependencies. 
Note: Yii 2 framework is still in active development, and until a fully stable Yii2 release, your core yii2-bootstrap packages (and its dependencies) 
may be updated when you install or update this extension. You may need to lock your composer package versions for your specific app, and test 
for extension break if you do not wish to auto update dependencies.

### Demo
You can see detailed [documentation](http://demos.krajee.com/sortable-input) on usage of the extension.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

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
    'items' => [
        ['id'=>1, 'content' => 'Item # 1'],
        ['id'=>2, 'content' => 'Item # 2'],
        ['id'=>3, 'content' => 'Item # 3'],
        ['id'=>4, 'content' => 'Item # 4', 'disabled'=>true],
    ]   
]); 
```

## License

**yii2-sortable-input** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.