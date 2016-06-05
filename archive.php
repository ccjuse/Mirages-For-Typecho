<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div id="archive" role="main">
        <h2 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h2>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article  itemscope itemtype="http://schema.org/BlogPosting">
				<div class="post">
                    <a href="<?php $this->permalink() ?>"><h4 class="post-title" itemprop="headline"><?php $this->title() ?></h4></a>
					<div class="post-info">
						<span itemprop="datePublished"><?php $this->date('F j, Y'); ?></span>
						<span class="comments"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></span>
					</div>
					<div class="post-content" itemprop="description">
						<p><?php $this->content("Continue Reading..."); ?></p>
					</div>
				</div>
			</article>
    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title no-content"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo;', '&raquo;'); ?>
    </div><!-- end #main -->

	<?php $this->need('footer.php'); ?>
