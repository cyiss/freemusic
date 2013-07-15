<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	'新規',
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
);
?>

<h1>新規</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>