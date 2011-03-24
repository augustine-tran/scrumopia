<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->story_id), array('view', 'id'=>$data->story_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_code')); ?>:</b>
	<?php echo CHtml::encode($data->story_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_description')); ?>:</b>
	<?php echo CHtml::encode($data->story_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_project')); ?>:</b>
	<?php echo CHtml::encode($data->story_project); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_priority')); ?>:</b>
	<?php echo CHtml::encode($data->story_priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_point')); ?>:</b>
	<?php echo CHtml::encode($data->story_point); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_status')); ?>:</b>
	<?php echo CHtml::encode($data->story_status); ?>
	<br />


</div>