<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->file_id=>array('view','id'=>$model->file_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List File', 'url'=>array('index')),
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'View File', 'url'=>array('view', 'id'=>$model->file_id)),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>Update File <?php echo $model->file_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>