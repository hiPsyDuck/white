<?php
/**
 * white  -  theme for typecho
 *
 *
 * @package 白
 * @author psyduck
 * @version 1.0
 * @link https://psyduck.liujiayang.cn/
 */

 $this->need('header.php');
 ?>
<div id="article" class="clear">
  <div id="article-content">

    <?php  $this->need('IndexSwitcher.php'); ?>

    <div id="pages" class="clear">
      <?php $this->pageLink('NEXT','next'); ?>
      <?php $this->pageLink('PREVIOUS','prev'); ?>
    </div>

  </div>
</div>




  <?php $this->need('footer.php'); ?>
