<?php
/**
*IndexSwither
*
* @author      psyduck
*/
?>

  <?php while($this->next()): ?>
   <a href="<?php $this->permalink() ?>">
    <div id="article-<?php $this->cid();?>" class="article-item hoverup">
      <h2 id="article-<?php $this->cid();?>-title"><span><?php $this->title() ?></span></h2>
     <em><?php $this->excerpt(80);?></em>
      <p class="clear"><span id="article-date"><?php $this->date('Y年m月d日'); ?></span><span id="article-comment"><?php $this->commentsNum(); ?> 评论</span></p>
    </div>
    </a>
  <?php endwhile; ?>

