<?php $this -> need('header.php'); ?>



 <div id="article">
   <div id="article-content">
     <h2 style="background: white;padding: 10px;text-align: center;margin: 0 auto;color:#444;font-size: 1.5rem;font-weight: 600;"><?php $this -> archiveTitle(array('category' => _t('「%s」'), 'search' => _t('包含关键字「%s」的文章'), 'tag' => _t('「%s」'), 'author' => _t('「%s」 发布的文章')), '', ''); ?></h2>
     <?php  $this->need('IndexSwitcher.php'); ?>
     <div id="pages" class="clear">
       <?php $this->pageLink('更多 >','next'); ?>
       <?php $this->pageLink('< 返回','prev'); ?>
     </div>
   </div>
 </div>


<?php $this -> need('footer.php'); ?>
