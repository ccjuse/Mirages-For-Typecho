<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?php
        if (strlen($this->options->staticPath) > 0){
            define("STATIC_PATH", rtrim($this->options->staticPath,'/').'/');
        }else {
            define("STATIC_PATH", $this->options->rootUrl."/usr/themes/Mirages/");
        }
    ?>
    <?php $this->need('head.php');?>
    <?php $this->need('headfix.php');?>
    <?php $showBanner = (strlen($this->banner) > 5);?>
</head>
<body>

<!--[if lt IE 9]>
<div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<script type="text/javascript">NProgress.inc(0.1);</script>
<span id="backtop" class="waves-effect waves-button"><i class="fa fa-angle-up"></i></span>
<div id="wrap">
    <?php $this->need('side_menu.php');?>

    <script type="text/javascript">NProgress.inc(0.2);</script>
    <div id="body">
    <?php if($showBanner):?>
        <header id="masthead" class="blog-background overlay align-center align-middle animated from-bottom animation-on" style="
        <?php if($this->is("page","about")):?>
            background-color: #2a2b2c;
        <?php endif?>
            height:
        <?php $this->options->defaultBgHeight();?>;" itemscope="" itemtype="http://schema.org/Organization">
            <script type="text/javascript">
                var head = document.getElementById("masthead");
                head.style.backgroundImage = "url("+bg+")";
                var bgHeight = getBgHeight(window.innerHeight);
                head.style.height = bgHeight+"px";
            </script>
            <div class="inner">
                <div class="container">
                    <?php if($this->is('page','about')):?>
                        <div id="about-avatar">
                            <img class="rotate" src="<?php $this->options->sideMenuAvatar(); ?>" alt="Avatar" width="200" height="200"/>
                        </div>
                        <h1 class="blog-title light" itemprop="name"><?php $this->author(); ?>
                            <?php if($this->user->hasLogin()):?>
                                <a class="superscript" href="<?php $this->options->rootUrl();?>/<?=isset($this->options->adminDir) ? trim($this->options->adminDir, '/') : "admin";?>/write-page.php?cid=<?=$this->cid?>" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php endif?>
                        </h1>
                        <h2 class="blog-description light bordered bordered-top" itemprop="description"><?=$this->fields->description?></h2>
                    <?php elseif($this->is('page','links')):?>
                        <h1 class="blog-title light" itemprop="name">Links
                            <?php if($this->user->hasLogin()):?>
                                <a class="superscript" href="<?php $this->options->rootUrl();?>/<?=isset($this->options->adminDir) ? trim($this->options->adminDir, '/') : "admin";?>/write-page.php?cid=<?=$this->cid?>" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php endif?>
                        </h1>

                    <?php elseif($this->is('index')):?>
                    <?php else: ?>
                        <h1 class="blog-title light" style="<?php if (isset($this->fields->mastheadTitleColor)) echo "color: ".$this->fields->mastheadTitleColor.";" ?>" itemprop="name"><?php if (isset($this->fields->mastheadTitle)) echo $this->fields->mastheadTitle ?></h1>
                        <h2 class="blog-description light bordered bordered-top" style="<?php if (isset($this->fields->mastheadTitleColor)) echo "color: ".$this->fields->mastheadTitleColor.";" ?>" itemprop="description"><?php if (isset($this->fields->mastheadSubtitle)) echo $this->fields->mastheadSubtitle ?></h2>
                    <?php endif ?>
                </div>
            </div>
        </header>
    <?php endif?>
        <script type="text/javascript">NProgress.inc(0.25);</script>
        <div class="container">
            <div class="row">

    
    
