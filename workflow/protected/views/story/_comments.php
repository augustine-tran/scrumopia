<div class="view">
	<b><?php echo CHtml::encode(User::model()->findBypk($data->user_id)->username); ?></b>
	<br />
	
	On: 
	<?php echo CHtml::encode(date('F j, Y \a\t h:i a',strtotime($data->comment_date))); ?>
	<br />
	
	<?php echo CHtml::encode($data->comment); ?>
</div>
<hr>