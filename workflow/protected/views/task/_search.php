<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'task_id'); ?>
		<?php echo $form->textField($model,'task_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_code'); ?>
		<?php echo $form->textField($model,'task_code',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_description'); ?>
		<?php echo $form->textField($model,'task_description',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'story_id'); ?>
		<?php echo $form->textField($model,'story_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_hours'); ?>
		<?php echo $form->textField($model,'task_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_status'); ?>
		<?php echo $form->textField($model,'task_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_user'); ?>
		<?php echo $form->textField($model,'task_user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->