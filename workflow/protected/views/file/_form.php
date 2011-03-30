<div class="form">

<?php $this->widget('ext.xupload.XUploadWidget', array(
					'url' => Yii::app()->createUrl("site/upload", array("parent_id" => 1)),
                    'model' => $model,
                    'attribute' => 'file',
));
?>

</div><!-- form -->