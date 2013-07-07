<?php
/* @var $this AppSettingController */
/* @var $model AppSetting */

$this->breadcrumbs=array(
	'App Settings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
	array('label'=>'新規', 'url'=>array('create')),
	array('label'=>'編集', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'削除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>詳細 アプリ設定 <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name' => 'type',
			'value' => $model->getType(),		
		),
		array(
			'name' => 'fmvalue',
			'value' => $model->getFMValue(),
		),
		'last_update',
		'create_time',
	),
)); ?>
