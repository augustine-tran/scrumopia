<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('story_code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->story_code), array('view', 'id'=>$data->story_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_point')); ?>:</b>
	<?php echo CHtml::encode($data->story_point); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('story_description')); ?>:</b>
	<?php echo CHtml::encode($data->story_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_project')); ?>:</b>
	<?php echo CHtml::encode($data->project->project_name); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('story_sprint')); ?>:</b>
	<?php echo CHtml::encode($data->sprint->sprint_name); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('story_priority')); ?>:</b>
	<?php echo CHtml::encode($data->getStorypriority()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_status')); ?>:</b>
	<?php echo CHtml::encode($data->getStorystatus()); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('story_sprint')); ?>:</b>
	<?php echo CHtml::encode($data->story_sprint); ?>
	<br />

	*/ ?>

</div>