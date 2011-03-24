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
		'story_id',
		'story_code',
		'story_description',
		'story_project',
		'story_priority',
		'story_point',
		'story_status',
	),
)); ?>
