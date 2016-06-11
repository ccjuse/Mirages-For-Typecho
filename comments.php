<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if($this->allow('comment')):?>
    <?php $parsed = parse_url($this->permalink);?>
    <?php if(hasValue($this->options->disqusShortName)):?>
        <div id="comments">
            <span class="widget-title text-center" style="padding-bottom: 15px;">评论列表</span>
            <?php if($this->is('post') || $this->is('page')):?>
                <script type="text/javascript">
                    var disqus_identifier = "<?= $parsed['path'];?>";
                </script>
            <?php endif?>
            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES * * */
                var disqus_shortname = '<?=$this->options->disqusShortName?>';

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
        </div>
    <?php elseif(hasValue($this->options->duoshuoShortName)):?>
        <div id="comments">
            <?php if($this->allow('comment')): ?>
                <?php
                    if(strlen($this->options->duoshuoCustomAuthorId) > 0) {
                        $dsAuthorId = $this->options->duoshuoCustomAuthorId;
                    } else {
                        $dsAuthorId = $this->authorId;
                    }
                ?>
                <span class="widget-title text-center" style="padding-bottom: 15px;">评论列表</span>
                <!-- 多说评论框 start -->
                <div class="ds-thread" data-thread-key="<?php echo $this->cid;?>" data-title="<?php echo $this->title;?>" data-author-key="<?=$dsAuthorId?>" data-url=""></div>
                <!-- 多说评论框 end -->
                <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
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
                        (document.getElementsByTagName('head')[0]
                        || document.getElementsByTagName('body')[0]).appendChild(ds);
                    })();
                </script>
                <!-- 多说公共JS代码 end -->
                <link rel="stylesheet" href="<?= STATIC_PATH ?>css/duoshuo.css">
            <?php else: ?>
                <h4><?php _e('评论已关闭'); ?></h4>
            <?php endif; ?>
        </div>
    <?php else:?>
        <div id="comments">
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>
                <span class="widget-title text-center">评论列表</span>
                <?php $comments->listComments(); ?>
                <?php $comments->pageNav('&laquo;', '&raquo;'); ?>
            <?php endif; ?>
            <?php if($this->allow('comment')): ?>
                <div id="<?php $this->respondId(); ?>" class="respond">
                    <div class="cancel-comment-reply">
                        <?php $comments->cancelReply(); ?>
                    </div>
                    <span id="response" class="widget-title text-left"><?php _e('添加新评论'); ?></span>
                    <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
                        <?php if($this->user->hasLogin()): ?>
                            <p>登录为 <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                        <?php else: ?>
                            <input type="text" name="author" id="author" placeholder="称呼" value="<?php $this->remember('author'); ?>" />
                            <input type="email" name="mail" id="mail" placeholder="电子邮件" value="<?php $this->remember('mail'); ?>" />
                            <input type="text" name="url" id="url" placeholder="网站"  value="<?php $this->remember('url'); ?>" />
                        <?php endif; ?>
                        <p>
                            <textarea rows="5" name="text" id="textarea" placeholder="在这里输入你的评论..." style="resize:none;"><?php $this->remember('text'); ?></textarea>
                            <?php //Smilies_Plugin::output(); ?>
                        </p>
                        <p><input type="submit" value="<?php _e('提交评论'); ?>" class="button" id="submit"></p>
                    </form>
                </div>
            <?php else: ?>
            <?php endif; ?>
        </div>
    <?php endif?>

<?php endif?>


