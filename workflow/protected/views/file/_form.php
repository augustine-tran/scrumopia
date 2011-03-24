<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'file_path'); ?>
		<?php echo $form->textField($model,'file_path',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'file_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_type'); ?>
		<?php echo $form->textField($model,'file_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'file_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_description'); ?>
		<?php echo $form->textField($model,'file_description',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'file_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'story_id'); ?>
		<?php echo $form->textField($model,'story_id'); ?>
		<?php echo $form->error($model,'story_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->