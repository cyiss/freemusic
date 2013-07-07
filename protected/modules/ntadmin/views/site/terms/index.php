<?php
/* @var $this TermsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Terms',
);

$this->menu=array(
	array('label'=>'Create Terms', 'url'=>array('create')),
	array('label'=>'Manage Terms', 'url'=>array('admin')),
);
?>

<h1>Terms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
