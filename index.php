<?php
/**
 * 一套简洁的，带自适应的主题
 * 
 * @package Mirages
 * @author Hran
 * @version 1.2.0
 * @link http://hran.me
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="index" role="main">
	<?php while($this->next()): ?>
        <article  itemscope itemtype="http://schema.org/BlogPosting">
			<div class="post" id="index-post">
                <a href="<?php $this->permalink() ?>"><h2 class="post-title" itemprop="headline"><?php $this->title() ?></h2></a>
                <div class="post-info">
					<span itemprop="datePublished"><?php $this->date('F j, Y'); ?> on </span>
					<span itemprop="categoryPublished"><?php $this->category(','); ?></span>
					<?php $parsed = parse_url($this->permalink);?>
					<?php if(strlen($this->options->disqusShortName) > 0):?>
						<span class="comments"><a href="<?php $this->permalink() ?>#disqus_thread" data-disqus-identifier="<?= $parsed['path'];?>">评论</a></a></span>
					<?php elseif(strlen($this->options->duoshuoShortName) > 0):?>
						<span class="comments"><a href="<?php $this->permalink() ?>#comments"><span class="ds-thread-count" data-thread-key="<?php echo $this->cid;?>" data-count-type="comments"></span></a></span>
					<?php else:?>
						<span class="comments"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></span>
					<?php endif?>
				</div>
				<div class="post-content" itemprop="description">
					<p><?php $this->content("Continue Reading..."); ?></p>
				</div>
			</div>
        </article>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo;', '&raquo;'); ?>
</div><!-- end #main-->
<?php $this->need('footer.php'); ?>

