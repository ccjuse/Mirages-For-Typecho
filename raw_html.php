<?php
/**
 * Raw Html
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
    /**
     * @var $this Widget_Archive
     */
    $html = $this->row['text'];
    if(startsWith($html, "<!--markdown-->")){
        $html = substr($html, 15);
    }
    echo $html;