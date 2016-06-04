<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="post" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting" style="margin-bottom: 20px;">
        <?php if(!(isset($this->fields->hideTitle) && intval($this->fields->hideTitle) > 0)): ?>
        <h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
        <?php endif?>
        <div class="post-content" itemprop="articleBody">
            <?php echo renderCards($this->content) ?>
        </div>
    </article>
</div><!-- end #post-->
<?php $this->need('footer.php'); ?>
