<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'story_id'); ?>
		<?php echo $form->textField($model,'story_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'story_code'); ?>
		<?php echo $form->textField($model,'story_code',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'story_description'); ?>
		<?php echo $form->textField($model,'story_description',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'story_project'); ?>
		<?php echo $form->textField($model,'story_project'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'story_priority'); ?>
		<?php echo $form->textField($model,'story_priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'story_point'); ?>
		<?php echo $form->textField($model,'story_point'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'story_status'); ?>
		<?php echo $form->textField($model,'story_status',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->