<?php
/* @var $this AppSettingController */
/* @var $model AppSetting */

$this->breadcrumbs=array(
	'App Settings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'編集',
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
	array('label'=>'新規', 'url'=>array('create')),
	array('label'=>'詳細', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>編集 アプリ設定 <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>