<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sprint_name), array('view', 'id'=>$data->sprint_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_description')); ?>:</b>
	<?php echo CHtml::encode($data->sprint_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_project')); ?>:</b>
	<?php echo CHtml::encode($data->project->project_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sprint_status')); ?>:</b>
	<?php echo CHtml::encode($data->getSprintstatuscaption()); ?>
	<br />


</div>