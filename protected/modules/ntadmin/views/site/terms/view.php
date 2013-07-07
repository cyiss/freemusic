<?php
/* @var $this TermsController */
/* @var $model Terms */

$this->breadcrumbs=array(
	'Terms'=>array('index'),
	$model->title,
);

$this->menu=array(
		array('label'=>'一覧', 'url'=>array('admin')),
		array('label'=>'新規', 'url'=>array('create')),
		array('label'=>'編集', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'削除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'本当に削除しますか?')),
);

?>

<h1>詳細 利用規約 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		array(
			'name' => 'is_valid',
			'value' => $model->getIsValid(),
		),
		'sort_index',
		'last_update',
		'create_time',
	),
)); ?>
