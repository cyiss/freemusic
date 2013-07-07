<?php
/* @var $this NoticeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notices',
);

$this->menu=array(
	array('label'=>'Create Notice', 'url'=>array('create')),
	array('label'=>'Manage Notice', 'url'=>array('admin')),
);
?>

<h1>Notices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
