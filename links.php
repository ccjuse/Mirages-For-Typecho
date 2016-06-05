<?php
/**
 * Links Page
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php $this->need('header.php'); ?>
<div id="post" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="post-content">
            <?php echo renderCards($this->content) ?>
        </div>
    </article>
</div><!-- end #post-->
<?php $this->need('footer.php'); ?>

