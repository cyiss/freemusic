<?php
/* @var $this HelpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Helps',
);

$this->menu=array(
	array('label'=>'Create Help', 'url'=>array('create')),
	array('label'=>'Manage Help', 'url'=>array('admin')),
);
?>

<h1>Helps</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>タイトル</th>
			<th>内容</th>
			<th>表示/非表示</th>
			<th>順番</th>
			<th>更新日時</th>
		</tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
	</table>