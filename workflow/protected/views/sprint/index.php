<?php
$this->breadcrumbs=array(
	'Sprints',
);

$this->menu=array(
	array('label'=>'Create Sprint', 'url'=>array('create')),
	array('label'=>'Manage Sprint', 'url'=>array('admin')),
);
?>

<h1>Sprints</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
