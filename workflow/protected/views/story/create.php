<?php
$this->breadcrumbs=array(
	'Stories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Story', 'url'=>array('index')),
	array('label'=>'Manage Story', 'url'=>array('admin')),
);
?>

<h1>Create Story</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>