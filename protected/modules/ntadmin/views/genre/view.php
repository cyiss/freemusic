<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
	array('label'=>'新規', 'url'=>array('create')),
	array('label'=>'編集', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'削除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'本当に削除しますか?')),
);
?>

<h1>詳細 ジャンル <?php echo $model->name; ?></h1>

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
