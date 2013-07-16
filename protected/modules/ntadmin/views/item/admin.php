<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	'管理',
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
	$('#item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>アイテム管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'name' => 'type',
			'value' => '$data->getType()',
			),
		array(
			'name' => 'genre_id',
			'value' => '$data->getGenre()'
			),
		'content',
		'price',
		array(
			'name' => 'icon',
			'type' => 'raw',
			'value' => 'html_entity_decode(
					CHtml::image($data->getIcon(), "アイコン", array("width"=>57, "height"=>57)))',
			),
		'rate',
		'start_date',
		'end_date',
		array(
				'name' => 'status',
				'value' => '$data->getStatus()',
			),
		'daily_quota',
		'weekly_quota',
		'amount',
		'inventory',
		/*
		'last_update',
		'create_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
