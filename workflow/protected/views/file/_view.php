<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fille_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fille_id), array('view', 'id'=>$data->fille_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_path')); ?>:</b>
	<?php echo CHtml::encode($data->file_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_type')); ?>:</b>
	<?php echo CHtml::encode($data->file_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_description')); ?>:</b>
	<?php echo CHtml::encode($data->file_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_id')); ?>:</b>
	<?php echo CHtml::encode($data->story_id); ?>
	<br />


</div>