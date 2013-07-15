<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
	array('label'=>'新規', 'url'=>array('create')),
	array('label'=>'編集', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'削除', 'url'=>'#', 'linkOptions'=>
			array('submit'=>array('delete','id'=>$model->id),'confirm'=>'本当に削除しますか?')),
);
?>

<h1>詳細 Item #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name' => 'type',
			'vlaue' => $model->getType(),
			),
		array(
			'name' => 'genre_id',
			'value' => CHtml::value(Genre::model()->find(array(
    					'select'=>'name',
    					'condition'=>'id=:genreID',
    					'params'=>array(':genreID'=>$model->genre_id),
    					)), 'name'),
			),
		'content',
		'price',
		array(
			'name' => 'icon',
			'type' => 'raw',
			'value' => html_entity_decode(
					CHtml::image($model->getIcon(),'アイコン', array('width'=>57, 'height'=>57))),
			),
		'rate',
		'start_date',
		'end_date',
		'status',
		'daily_quota',
		'weekly_quota',
		'amount',
		'inventory',
		'last_update',
		'create_time',
	),
)); ?>
