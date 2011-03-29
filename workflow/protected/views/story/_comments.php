<?php foreach($comments as $comment): ?>
<div class="comment">
      <div class="author">
    <b><?php echo $comment->user->username; ?>:</b>
  </div>
  <div class="time">
    on <?php echo date('F j, Y \a\t h:i a',strtotime($comment->comment_date)); ?>
  </div>
  <div class="content">
  <?php echo nl2br(CHtml::encode($comment->comment)); ?>
  </div>
     <hr>
</div><!-- comment -->
<?php endforeach; ?>