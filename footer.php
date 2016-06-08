<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!-- end .row -->
</div>

<div id="body-bottom">
<?php if($this->is('post') || ($this->is('page') && $this->allow('comment')) || $this->is('attachment')):?>
<div class="container" id="post-f">
    <?php if($this->is('post')):?>
        <div class="post-near">
            <nav>
                <span class="prev"><span class="prev-t">上一篇: </span><?php $this->theNext('%s','没有了'); ?></span>
                <span class="next"><span class="prev-t">下一篇: </span><?php $this->thePrev('%s','没有了'); ?></span>
            </nav>
        </div>
    <?php endif?>
    <?php $this->need('comments.php'); ?>
</div>
<?php endif?>
</div>
</div><!-- end #body -->
</div><!-- end #wrap -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <p>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> • All Rights Reserved.</p>
        <p><?php _e('Powered By <a href="http://www.typecho.org">Typecho</a>'); ?> • Theme <a href="http://hran.me/mirages.html">Mirages</a></p>
    </div>
</footer><!-- end #footer -->
<?php $this->footer(); ?>
<script type="text/javascript">NProgress.inc(0.8);</script>
<script src="//cdn.bootcss.com/github-repo-widget/e23d85ab8f/jquery.githubRepoWidget.min.js" type="text/javascript"></script>
<?php if(!isMobile()):?>
<?php endif?>
<script src="<?= STATIC_PATH ?>js/waves.min.js"></script>
<?php if(IS_HTTPS): ?>
<script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdn.bootcss.com/headroom/0.7.0/headroom.min.js" type="text/javascript"></script>
<?php else:?>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://apps.bdimg.com/libs/headroom/0.5.0/headroom.min.js" type="text/javascript"></script>
<?php endif?>
<script data-no-instant>
    Waves.displayEffect();
</script>
<script src="<?= STATIC_PATH ?>js/zoom.min.js" type="text/javascript"></script>
<script src="<?= STATIC_PATH ?>js/skin.js" type="text/javascript"></script>
<?php if((!empty($this->options->otherOptions) && in_array('enableSSCROnWindows', $this->options->otherOptions)) && !isMobile() && isWindowsAboveVista() && deviceIs('Chrome', 'Edge')):?>
<script src="<?= STATIC_PATH ?>js/sscr.js"></script>
<?php endif?>

<script type="text/javascript">NProgress.done();</script>
<?php if($this->is('index') || $this->is('category') || $this->is('tag')):?>
    <?php if(strlen($this->options->disqusShortName) > 0):?>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = '<?=$this->options->disqusShortName?>'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function () {
                var s = document.createElement('script'); s.async = true;
                s.type = 'text/javascript';
                s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
            }());
        </script>
    <?php elseif(strlen($this->options->duoshuoShortName) > 0):?>
        <!-- 多说js加载开始，一个页面只需要加载一次 -->
        <script type="text/javascript">
            var duoshuoQuery = {short_name:"<?=$this->options->duoshuoShortName ?>"};
            (function() {
                var ds = document.createElement('script');
                ds.type = 'text/javascript';ds.async = true;
                <?php if(strlen($this->options->duoshuoCustomEmbedJs) > 0):?>
                ds.src = "<?=(startsWith($this->options->duoshuoCustomEmbedJs, 'http://') || startsWith($this->options->duoshuoCustomEmbedJs, 'https://') || startsWith($this->options->duoshuoCustomEmbedJs, '//')) ? $this->options->duoshuoCustomEmbedJs : '//'.$this->options->duoshuoCustomEmbedJs ?>";
                <?php else:?>
                ds.src = '//static.duoshuo.com/embed.js';
                <?php endif;?>
                ds.charset = 'UTF-8';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
            })();
        </script>
        <!-- 多说js加载结束，一个页面只需要加载一次 -->
    <?php endif?>
<?php endif?>
<script type="text/javascript">
    <?php if((!empty($this->options->otherOptions) && in_array('useQiniuImageResize', $this->options->otherOptions))):?>
    var getPostImageAddon = function(){
        var addon = "?";
        var ratio = window.devicePixelRatio || 1;
        width = window.innerWidth || 0;
        height = window.innerHeight || 0;
        if(width == 0 || height == 0){
            return "";
        }
        var format = "";
        <?php if(!empty($this->options->otherOptions) && in_array('enableWebP', $this->options->otherOptions) && shouldEnableWebP()):?>
        format = "/format/webp";
        <?php endif?>
        if(width > height){
            addon += "imageView2/2/h/"+ parseInt(height * ratio) + "/q/75" + format;
        }else{
            addon += "imageView2/2/w/"+ parseInt(width * ratio) + "/q/75" + format;
        }
        return addon;
    };
    var addon = getPostImageAddon();
    $("article img").each(function() {
        var src = $(this).attr('data-src');
        if (src != null && src != undefined && src != "") {
            $(this).attr('src', src + addon);
            $(this).removeAttr('data-src');
        }
    });
    <?php endif?>
    $("article img:not(article .link-box img)").each(function() {
        $(this).attr('data-action', 'zoom');
        if($(this).next().is('br')){
            $(this).next().remove();
        }
    });
    String.prototype.startWith = function(str){
        if (str == null || str == "" || this.length == 0 || str.length > this.length) {
            return false;
        }
        return this.substr(0, str.length) == str;
    };
    $(".post-content a, #content a").each(function() {
        var href = $(this).attr('href');
        if (href.startWith("http")) {
            $(this).attr('target', "_blank");
        }
    });
    $(".post-content p.more a").each(function() {
        $(this).removeAttr("target")
    });
</script>
<?php
if(isset($this->fields->js)) {
    echo "<script type=\"text/javascript\">\n";
    echo $this->fields->js;
    echo "\n</script>\n";
}
?>
</body>
</html>
