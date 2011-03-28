<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->task_id), array('view', 'id'=>$data->task_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_code')); ?>:</b>
	<?php echo CHtml::encode($data->task_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_user')); ?>:</b>
	<?php echo CHtml::encode($data->task_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_id')); ?>:</b>
	<?php echo CHtml::encode($data->story_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_hours')); ?>:</b>
	<?php echo CHtml::encode($data->task_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_description')); ?>:</b>
	<?php echo CHtml::encode($data->task_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_status')); ?>:</b>
	<?php echo CHtml::encode($data->task_status); ?>
	<br />


</div>