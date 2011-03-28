<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sprint_id'); ?>
		<?php echo $form->textField($model,'sprint_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sprint_name'); ?>
		<?php echo $form->textField($model,'sprint_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sprint_description'); ?>
		<?php echo $form->textField($model,'sprint_description',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sprint_project'); ?>
		<?php echo $form->textField($model,'sprint_project'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sprint_status'); ?>
		<?php echo $form->textField($model,'sprint_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->