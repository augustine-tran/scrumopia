<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sprint-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sprint_name'); ?>
		<?php echo $form->textField($model,'sprint_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sprint_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sprint_description'); ?>
		<?php echo $form->textArea($model,'sprint_description',array('rows'=>15, 'cols'=>70, 'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'sprint_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sprint_project'); ?>
		<?php echo $form->dropDownlist($model,'sprint_project',Project::model()->getProjects(),
				array(
					'empty'=>'---------   Select a project   ---------',
				)
		); ?>
		<?php echo $form->error($model,'sprint_project'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sprint_status'); ?>
		<?php echo $form->dropDownlist($model,'sprint_status',$model->setSprintstatusoptions()); ?>
		<?php echo $form->error($model,'sprint_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->