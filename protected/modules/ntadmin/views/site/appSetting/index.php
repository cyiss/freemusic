<?php
/* @var $this AppSettingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'App Settings',
);

$this->menu=array(
	array('label'=>'Create AppSetting', 'url'=>array('create')),
	array('label'=>'Manage AppSetting', 'url'=>array('admin')),
);
?>

<h1>App Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
