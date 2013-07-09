<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	'新規',
);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);
?>

<h1>新規アイテム</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>