<div class="form">

<?php $this->widget('ext.xupload.XUploadWidget', array(
					'url' => Yii::app()->createUrl("story/upload", array("storyId" => $id)),
                    'model' => $model,
                    'attribute' => 'file',
));
?>
</div><!-- form -->