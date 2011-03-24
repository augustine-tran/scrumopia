<?php
$this->breadcrumbs=array(
	'Project Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectUser', 'url'=>array('index')),
	array('label'=>'Create ProjectUser', 'url'=>array('create')),
	array('label'=>'View ProjectUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectUser', 'url'=>array('admin')),
);
?>

<h1>Update ProjectUser <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>