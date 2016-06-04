<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="post" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <?php if(!(isset($this->fields->hideTitle) && intval($this->fields->hideTitle) > 0)): ?>
        <h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
        <ul class="post-meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
            <?php if(intval($this->viewsNum) > 0): ?>
            <li><?php _e('阅读: '); ?><?php $this->viewsNum();?></li>
            <?php endif?>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        <?php endif?>
        <div class="post-content" itemprop="articleBody">
            <?php echo renderCards($this->content) ?>
        </div>
		<div class="tags">
			<div class="dkeywords">
			   <div itemprop="keywords" class="keywords"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></div>
			</div>
		<div>
    </article>
</div><!-- end #post-->
<?php $this->need('footer.php'); ?>
