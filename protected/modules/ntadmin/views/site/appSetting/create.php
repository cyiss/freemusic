<?php
/* @var $this AppSettingController */
/* @var $model AppSetting */

$this->breadcrumbs=array(
	'App Settings'=>array('index'),
	'新規',
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
);
?>

<h1>新規アプリ設定</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>