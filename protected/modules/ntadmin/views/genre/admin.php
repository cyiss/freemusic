<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	'一覧',
);

$this->menu=array(
	array('label'=>'新規', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#genre-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Genres</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'genre-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'name' => 'type',
			'value' => '$data->getType()',
			),
		'sort_index',
		'last_update',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
