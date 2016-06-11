<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="post" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting" style="margin-bottom: 20px;">
        <?php if(!isTrue($this->fields->hideTitle) && !$this->is('page','about') && !$this->is('page','links')): ?>
        <h2 class="post-title" itemprop="name headline"><?php $this->title() ?>
            <?php if($this->user->hasLogin()):?>
                <a class="superscript" href="<?php $this->options->rootUrl();?>/<?=isset($this->options->adminDir) ? trim($this->options->adminDir, '/') : "admin";?>/write-page.php?cid=<?=$this->cid?>" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <?php endif?>
        </h2>
        <?php endif?>
        <div class="post-content" itemprop="articleBody">
            <?php echo renderCards($this->content) ?>
        </div>
    </article>
</div><!-- end #post-->
<?php $this->need('footer.php'); ?>
