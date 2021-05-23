<?php
/**
 * white  -  theme for typecho
 *
 *
 * @package 白
 * @author psyduck
 * @version 1.4
 * @link https://psyduck.liujiayang.cn/
 */

 $this->need('header.php');
 ?>
<div id="article" class="clear">
  <div id="article-content">
	
    <?php  $this->need('IndexSwitcher.php'); ?>

    <div id="pages" class="clear">
      <?php $this->pageLink('下一页','next'); ?>
      <?php $this->pageLink('上一页','prev'); ?>
    </div>

  </div>
</div>




  <?php $this->need('footer.php'); ?>
