<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model);   ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_owner'); ?>
		<?php echo $form->dropDownList($model,'project_owner',$model->getProjectOwnerOptions());?>
		<?php echo $form->error($model,'project_owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_description'); ?>
		<?php echo $form->textArea($model, 'project_description', array('rows'=>15, 'cols'=>70, 'maxlength'=>1000))?>
		<?php echo $form->error($model,'project_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_status'); ?>
		<?php echo $form->dropDownList($model,'project_status',$model->setProjectStatus()); ?>
		<?php echo $form->error($model,'project_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'id'=>'date_start',
                    'model'=>$model,
                    'attribute'=>'date_start',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd',
                    ),
                    'htmlOptions'=>array(
                    	'value'=>Date('Y-m-d'),
                    ),
                ));
        ?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'id'=>'end',
                    'model'=>$model,
                    'attribute'=>'end',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd',
                    ),
                    'htmlOptions'=>array(
                    	'value'=>Date('Y-m-d'),
                    ),
                ));
        ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->