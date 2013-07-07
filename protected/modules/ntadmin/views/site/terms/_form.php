<?php
/* @var $this TermsController */
/* @var $model Terms */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'terms-form',
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