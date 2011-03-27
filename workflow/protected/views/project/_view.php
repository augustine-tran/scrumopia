<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
	<?php echo CHtml::link($data->project_name,array('view', 'id'=>$data->project_id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_description')); ?>:</b>
	<?php echo CHtml::encode($data->project_description); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_start')); ?>:</b>
	<?php echo CHtml::encode(date("d - m - Y",$data->date_start)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode(date("d - m - Y",$data->end)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_status')); ?>:</b>
	<?php echo CHtml::encode($data->getProjectStatus()); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_owner')); ?>:</b>
	<?php echo CHtml::encode($data->getProjectOwnerName()); ?>
	<br />
</div>