<?php
$this->breadcrumbs=array(
	'Sprints'=>array('index'),
	$model->sprint_id=>array('view','id'=>$model->sprint_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sprint', 'url'=>array('index')),
	array('label'=>'Create Sprint', 'url'=>array('create')),
	array('label'=>'View Sprint', 'url'=>array('view', 'id'=>$model->sprint_id)),
	array('label'=>'Manage Sprint', 'url'=>array('admin')),
);
?>

<h1>Update Sprint <?php echo $model->sprint_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>