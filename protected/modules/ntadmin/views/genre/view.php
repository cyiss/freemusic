<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Genre', 'url'=>array('index')),
	array('label'=>'Create Genre', 'url'=>array('create')),
	array('label'=>'Update Genre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Genre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Genre', 'url'=>array('admin')),
);
?>

<h1>View Genre #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name' => 'type',
			'value' => $model->getType(),
			),
		'sort_index',
		'last_update',
	),
)); ?>
