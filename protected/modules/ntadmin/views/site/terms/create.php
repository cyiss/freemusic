<?php
/* @var $this TermsController */
/* @var $model Terms */

$this->breadcrumbs=array(
	'Terms'=>array('index'),
	'新規利用規約',
);

$this->menu=array(
	array('label'=>'一覧', 'url'=>array('admin')),
);
?>

<h1>新規 利用規約</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>