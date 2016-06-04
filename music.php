<?php
/**
 * Music Page
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php
if (strlen($this->options->staticPath) > 0){
    define("STATIC_PATH", $this->options->staticPath);
}else {
    define("STATIC_PATH", $this->options->rootUrl."/usr/themes/Mirages/");
}
?>
<!DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="http://fonts.useso.com/css?family=Open+Sans:300&amp;subset=latin,latin-ext">
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="//cdn.bootcss.com/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="<?= STATIC_PATH ?>css/theme.css">
    <style type="text/css">
        body {
            background-color: rgba(255, 255, 255, 1);
            max-width: 100%;
            max-height: 100%;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }
        <?php if (isELCapitan()): ?>
        #hPlayer {
            font-family: 'Open Sans', 'PingFang SC', sans-serif;
        }
        <?php endif ?>
    </style>
    <script>
        <?php $this->options->tongJi(); ?>
    </script>
</head>
<body>
<div id="hPlayer">
    <div class="background"></div>
    <div class="content">
        <div class="title-img">
            <img src="http://duanjstatic.qiniudn.com/img/head/-utr1R5S.jpg" alt="title"/>
        </div>
        <div class="controls">
            <div class="controls-title">
                <div class="controls-name">
                    嗯哼?
                </div>
                <div class="controls-album">
                    流量党退散！！！
                </div>
            </div>
            <div class="controls-control">
                <div class="controls-back"><i class="fa fa-backward"></i></div>
                <div class="controls-play"><i class="fa fa-play"></i></div>
                <div class="controls-next"><i class="fa fa-forward"></i></div>
            </div>
        </div>
        <div class="sound-box">
        </div>
    </div>
</div>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="<?= STATIC_PATH ?>js/skin.js" type="text/javascript"></script>
<script type="text/javascript">
    (function($){
        $(document).ready(function(){
            $('#hPlayer').player();
        });
    })(jQuery);
</script>
</body>
</html>