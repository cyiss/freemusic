<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'編集',
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
	array('label'=>'新規', 'url'=>array('create')),
	array('label'=>'詳細', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>編集　ジャンル <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>