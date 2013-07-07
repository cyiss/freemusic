<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>ログイン</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		)); ?>
	<p> IDとパスワードを入力してください。</p>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'ID'); ?>
		<?php echo $form->textField($model, 'username'); ?>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model, 'Password'); ?>
	<?php echo $form->passwordField($model, 'password'); ?>
	</div>
	
	<div class="row button">
		<?php echo CHtml::submitButton('Enter'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>

