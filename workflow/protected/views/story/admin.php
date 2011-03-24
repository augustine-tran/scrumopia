<?php
$this->breadcrumbs=array(
	'Stories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Story', 'url'=>array('index')),
	array('label'=>'Create Story', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('story-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Stories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'story-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'story_id',
		'story_code',
		'story_description',
		'story_project',
		'story_priority',
		'story_point',
		/*
		'story_status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
