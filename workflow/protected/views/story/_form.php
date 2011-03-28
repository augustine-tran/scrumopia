<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'story-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'story_code'); ?>
		<?php echo $form->textField($model,'story_code',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'story_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'story_description'); ?>
		<?php echo $form->textArea($model, 'story_description', array('rows'=>15, 'cols'=>70, 'maxlength'=>1000))?>
		<?php echo $form->error($model,'story_description'); ?>
	</div>

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'story_project'); ?>
		<?php //echo $form->dropDownList($model,'story_project',Project::model()->getProjects()); ?>
		<?php /*echo $form->dropDownList($model,'story_project',Project::model()->getProjects(),
			array(
					'empty'=>'------------  Select a project  ------------',
					'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('sprint/selectsprints'),
					'update' => '#Story_story_sprint')       
                  )
              )*/; ?>
		<?php //echo $form->error($model,'story_project'); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->labelEx($model,'story_sprint'); ?>
		<?php //echo $form->dropDownList($model,'story_sprint',array(),array('style'=>'width:200px')); ?>
		<?php //echo $form->error($model,'story_sprint'); ?>
	</div> -->
	
	<div class="row">
		<?php echo $form->labelEx($model,'story_priority'); ?>
		<?php echo $form->dropDownList($model,'story_priority',$model->setStorypriority()); ?>
		<?php echo $form->error($model,'story_priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'story_point'); ?>
		<?php echo $form->textField($model,'story_point'); ?>
		<?php echo $form->error($model,'story_point'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'story_status'); ?>
		<?php echo $form->dropDownList($model,'story_status',$model->setStorystatus()); ?>
		<?php echo $form->error($model,'story_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->