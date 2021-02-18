<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$GLOBALS['theme_url'] = $this->options->themeUrl;
$header = Comment_hash_fix($this);
echo $header;
?>

<?php
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

<?php
if ($comments->levels == 0){
    echo "<div class=\"comment-line\">";
}
?>

<div id="<?php $comments->theId(); ?>">
        <div class="comment-inner">
            <div class="comment-author">
                <?php $comments->gravatar('40', ''); ?>
                <span><?php $comments->author(); ?></span>
            </div>
            <div class="comment-meta">
                <span><?php $comments->date('Y-m-d H:i'); ?></span>
            </div>
            <div class="comment-content">
              <?php
                $cos = preg_replace('#\@\((.*?)\)#','<img src="'.$GLOBALS['theme_url'].'/IMG/bq/$1.png" class="bq">',$comments->content);
                echo $cos;
              ?>
            </div>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
        </div>
    </div>

<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>

<?php
if ($comments->levels == 0){
    echo "</div>";
}
?>

</li>
<?php } ?>


<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <div class="comments-header" id="<?php $this->respondId(); ?>" >

        <?php if($this->allow('comment')): ?>
          <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
<!--            <img id="comment-loading" src="--><?php //$this->options->themeUrl('IMG/loading.gif'); ?><!--"></img>-->
            <div class="cancel-comment-reply clear">
                <?php $comments->cancelReply(); ?>
            </div>
              <?php if(!$this->user->hasLogin()): ?>
                <p id="response" class="widget-title text-left"><?php _e('评论'); ?></p>
                  <div class="comment-input-area"><input type="text" name="author" id="author" placeholder="称呼" value="<?php $this->remember('author'); ?>" /></div>
                  <div class="comment-input-area"><input type="email" name="mail" id="mail" placeholder="电子邮件" value="<?php $this->remember('mail'); ?>" /></div>
                  <div class="comment-input-area comment-input-area-url"><input type="text" name="url" id="url" placeholder="站点"  value="<?php $this->remember('url'); ?>" /></div>
              <?php endif; ?>
              <p>
                  <input name="_" type="hidden" id="comment_" value="<?php echo Helper::security()->getToken(str_replace(array('?_pjax=%23pjax-container', '&_pjax=%23pjax-container'), '', Typecho_Request::getInstance()->getRequestUrl()));?>"/>
                  <textarea rows="5" name="text" id="textarea" placeholder="友善的评论是交流的起点" style="resize:none;"><?php $this->remember('text'); ?></textarea>
              </p>

              <div class="clear">

                <div class="OwO-logo" onclick="OwO_show()">
                  <span>(OwO)</span>
                </div>

                  <button type="submit" class="submit"><?php _e('发射'); ?></button>

                  <?php if (isset($this->options->plugins['activated']['CommentToMail'])) : ?>
                      <label for="check2" id="comment_mail_set">
                          <input type="checkbox" name="banmail" value="yes" id="check2">
                          <span><span></span></span>不接收回复邮件
                      </label>
                  <?php endif ?>


              </div>
              <div id="OwO-container"><?php  $this->need('owo.php'); ?></div>
          </form>
        <?php endif; ?>
		    </div>

    <?php if ($comments->have()): ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('<上一页', '下一页>'); ?>
    <?php endif; ?>

</div>
