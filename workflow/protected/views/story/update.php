<?php
$this->breadcrumbs=array(
	'Stories'=>array('index'),
	$model->story_id=>array('view','id'=>$model->story_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Story', 'url'=>array('index')),
	array('label'=>'Create Story', 'url'=>array('create')),
	array('label'=>'View Story', 'url'=>array('view', 'id'=>$model->story_id)),
	array('label'=>'Manage Story', 'url'=>array('admin')),
);
?>

<h1>Update Story <?php echo $model->story_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>