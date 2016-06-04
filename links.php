<?php
/**
 * Links Page
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php $this->need('header.php'); ?>

    <div class="post-content">
        <?php echo renderCards($this->content) ?>
    </div>
<?php $this->need('footer.php'); ?>

