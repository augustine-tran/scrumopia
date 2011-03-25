<?php
$this->breadcrumbs=array(
	'Stories'=>array('index'),
	$model->story_id,
);

$this->menu=array(
	array('label'=>'List Story', 'url'=>array('index')),
	array('label'=>'Create Story', 'url'=>array('create')),
	array('label'=>'Update Story', 'url'=>array('update', 'id'=>$model->story_id)),
	array('label'=>'Delete Story', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->story_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Story', 'url'=>array('admin')),
);
?>

<h1>View Story #<?php echo $model->story_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'story_code',
		'story_description',
		array(
			'label'=>'Project',
			'type'=>'raw',
			'value'=>$model->project->project_name),
		array(
			'label'=>'Priority',
			'type'=>'raw',
			'value'=>$model->getStorypriority()),
		'story_point',
		array(
			'label'=>'Status',
			'type'=>'raw',
			'value'=>$model->getStorystatus()),
		array(
			'label'=>'Sprint',
			'type'=>'raw',
			'value'=>$model->sprint->sprint_name),
	),
)); ?>
