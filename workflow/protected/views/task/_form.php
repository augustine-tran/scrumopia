<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'task_code'); ?>
		<?php echo $form->textField($model,'task_code',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'task_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_user'); ?>
		<?php echo $form->dropDownlist($model,'task_user',
			CHtml::listData(Project::model()->findBypk
			(Story::model()->findByPk($model->story_id)
			->story_project)->projectuserprofile,'user_id','firstname'));?>
		<?php echo $form->error($model,'task_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_hours'); ?>
		<?php echo $form->textField($model,'task_hours'); ?>
		<?php echo $form->error($model,'task_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_description'); ?>
		<?php echo $form->textArea($model,'task_description',array('rows'=>15, 'cols'=>70, 'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'task_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_status'); ?>
		<?php echo $form->textField($model,'task_status'); ?>
		<?php echo $form->error($model,'task_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->