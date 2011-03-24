<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sprint_id), array('view', 'id'=>$data->sprint_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_code')); ?>:</b>
	<?php echo CHtml::encode($data->sprint_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_name')); ?>:</b>
	<?php echo CHtml::encode($data->sprint_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_description')); ?>:</b>
	<?php echo CHtml::encode($data->sprint_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_project')); ?>:</b>
	<?php echo CHtml::encode($data->sprint_project); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_status')); ?>:</b>
	<?php echo CHtml::encode($data->sprint_status); ?>
	<br />


</div>