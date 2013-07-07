<?php
/* @var $this NoticeController */
/* @var $model Notice */

$this->breadcrumbs=array(
	'Notices'=>array('index'),
	'お知らせ 新規',
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
);
?>

<h1>新規お知らせ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>