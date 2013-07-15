<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', $model->getTypeList()); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genre_id'); ?>
		<?php echo $form->dropDownList(	$model, 'genre_id',
										CHtml::listData(
											Genre::model()->findAll(), 
											'id',
											'name')); ?>
		<?php echo $form->error($model,'genre_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php if(!empty($model->icon)) { ?>
			<img src="<?php echo $model->getIcon(); ?>" width='57' height='57'>
		<?php } ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rate'); ?>
		<?php echo $form->textField($model,'rate'); ?>
		<?php echo $form->error($model,'rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'start_date',
				'language' => 'ja',
				'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
				'options'=>array(
						'dateFormat' => 'yy-mm-dd',
				),
				'htmlOptions' => array(
							'size' => '19',
							'maxLength' => '19',
						),
				));?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'end_date',
				'language' => 'ja',
				'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
				'options'=>array(
						'dateFormat' => 'yy-mm-dd',
				),
				'htmlOptions' => array(
							'size' => '19',
							'maxLength' => '19',
						),
				));?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<div class="rb">
		<?php echo $form->radioButtonList($model, 'status', array(
				'0' => '非表示',
				'1' => '表示',
				), array(
						'separator'=>'')
				); ?>
		</div>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'daily_quota'); ?>
		<?php echo $form->textField($model,'daily_quota'); ?>
		<?php echo $form->error($model,'daily_quota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weekly_quota'); ?>
		<?php echo $form->textField($model,'weekly_quota'); ?>
		<?php echo $form->error($model,'weekly_quota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inventory'); ?>
		<?php echo $form->textField($model,'inventory',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'inventory'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '登録' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->