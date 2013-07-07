<?php
/* @var $this NoticeController */
/* @var $model Notice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'notice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
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
		<?php echo $form->labelEx($model,'is_valid'); ?>
		<div class="rb">
		<?php echo $form->radioButtonList($model, 'is_valid', array(
				'0' => '非表示',
				'1' => '表示',
				), array(
						'separator'=>'')
				); ?>
		</div>
		<?php echo $form->error($model,'is_valid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_index'); ?>
		<?php echo $form->textField($model,'sort_index'); ?>
		<?php echo $form->error($model,'sort_index'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '登録' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->