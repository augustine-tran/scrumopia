<?php
$this->breadcrumbs=array(
	'Sprints'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sprint', 'url'=>array('index')),
	array('label'=>'Manage Sprint', 'url'=>array('admin')),
	array('label'=>'Back to project', 'url'=>array('project/view','id'=>$model->sprint_project)),
);
?>

<h1>Create Sprint</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>