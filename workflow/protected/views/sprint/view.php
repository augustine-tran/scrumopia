<?php
$this->breadcrumbs=array(
	'Sprints'=>array('index'),
	$model->sprint_id,
);

$this->menu=array(
	array('label'=>'List Sprint', 'url'=>array('index')),
	array('label'=>'Create Sprint', 'url'=>array('create')),
	array('label'=>'Update Sprint', 'url'=>array('update', 'id'=>$model->sprint_id)),
	array('label'=>'Delete Sprint', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sprint_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sprint', 'url'=>array('admin')),
	array('label'=>'New story','url'=>array('story/create','story_sprint'=>$model->sprint_id,'story_project'=>$model->sprint_project)),
);
?>

<h1>View Sprint #<?php echo $model->sprint_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sprint_name',
		'sprint_description',
		array(
			'label'=>'Project',
			'type'=>'raw',
			'value'=>$model->project->project_name),
		array(
			'label'=>'Status',
			'type'=>'raw',
			'value'=>$model->getSprintstatuscaption()),
		array(
            'label'=>'Sprint hours',
            'type'=>'raw',
            'value'=>$model->sprintHours()),
		array(
            'label'=>'Sprint burn down',
            'type'=>'raw',
            'value'=>$model->burnDown()),
	),
));?>
<link rel="stylesheet" type="text/css" href="../../css/ext-all.css" />
<script type="text/javascript" src="../../script/bootstrap.js"></script>
<script type="text/javascript" src="../../script/gridPanelJSon.js"></script>
<div id="gridPanelJSon"></div>

<!-- page specific -->
    <style type="text/css">
        /* style rows on mouseover */
        .x-grid-row-over .x-grid-cell-inner {
            font-weight: bold;
        }
        /* shared styles for the ActionColumn icons */
        .x-action-col-cell img {
            height: 16px;
            width: 16px;
            cursor: pointer;
        }
        /* custom icon for the "buy" ActionColumn icon */
        .x-action-col-cell img.buy-col {
            background-image: url(../shared/icons/fam/accept.gif);
        }
        /* custom icon for the "alert" ActionColumn icon */
        .x-action-col-cell img.alert-col {
            background-image: url(../shared/icons/fam/error.gif);
        }
    </style>