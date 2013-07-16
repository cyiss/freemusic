<?php
/* @var $this AppSettingController */
/* @var $model AppSetting */

$this->breadcrumbs=array(
	'App Settings'=>array('index'),
	'アプリ設定管理',
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
	$('#app-setting-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>アプリ設定管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'app-setting-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'type',
		array(
			'name' => 'fmvalue',
			'type' => 'raw',
			'value' => '$data->getFMValue()',
			),
		'last_update',
		'create_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
