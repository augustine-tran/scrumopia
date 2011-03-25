<?php
$this->breadcrumbs=array(
	'Sprints'=>array('index'),
	$model->sprint_id,
);

$this->menu=array(
	array('label'=>'List Sprint', 'url'=>array('index')),
	array('label'=>'Create Sprint', 'url'=>array('create')),
	array('label'=>'Update Sprint', 'url'=>array('update', 'id'=>$model->sprint_id)),
	array('label'=>'Delete Sprint', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sprint_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sprint', 'url'=>array('admin')),
);
?>

<h1>View Sprint #<?php echo $model->sprint_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sprint_name',
		'sprint_description',
		array(
			'label'=>'Project',
			'type'=>'raw',
			'value'=>$model->project->project_name),
		array(
			'label'=>'Status',
			'type'=>'raw',
			'value'=>$model->getSprintstatuscaption()),
	),
)); ?>
