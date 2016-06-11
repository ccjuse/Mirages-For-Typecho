<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$this->ddb = $this->db;
@$if_https = $_SERVER['HTTPS'];	//这样就不会有错误提示
if ($if_https) {	//如果是使用 https 访问的话就添加 https
    define('IS_HTTPS', true);
} else {
    define('IS_HTTPS', false);
}

if (IS_HTTPS) {
    $highlightJSPath = "//cdn.bootcss.com/highlight.js/9.2.0/";
} else {
    $highlightJSPath = "http://apps.bdimg.com/libs/highlight.js/9.1.0/";
}

//Add-on highlight language
$addOnHighlightLang = array();
$highlightLanguages = array(
    "swift" => "languages/swift.min.js",
);
$rawContentText = $this->text;
$rawContentText = strtolower($rawContentText);
foreach ($highlightLanguages as $lang=>$url) {
    $lang = '```'.strtolower($lang);
    if(strpos($rawContentText,$lang) >= 0){
        $addOnHighlightLang[] = $url;
    }
}

$addOnHighlightLangHtml = "";
foreach ($addOnHighlightLang as $url) {
    $addOnHighlightLangHtml .='<script src="'.$highlightJSPath . $url.'" type="text/javascript"></script>'."\n";
}
?>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php $this->options->bowserInsight()?>
<?php $this->options->customMeta()?>
<script type="text/javascript">
    var BASE_SCRIPT_URL = "<?= STATIC_PATH ?>";
    var width=window.screen.availWidth;
    var height=window.screen.availHeight;
    var injectStyle = function(css) {
        var link = document.createElement('link');
        link.setAttribute('rel', 'stylesheet');
        link.href = css;
        document.head.appendChild(link);
    };
    var getImageAddon = function(width, height){
        var addon = "?";
        var ratio = window.devicePixelRatio || 1;
        width = width || 0;
        height = height || 0;
        if(width == 0 && height == 0){
            return "";
        }
        var format = "";
        <?php if(!empty($this->options->otherOptions) && in_array('enableWebP', $this->options->otherOptions) && shouldEnableWebP()):?>
        format = "/format/webp";
        <?php endif?>
        if(width >= height){
            addon += "imageView2/2/w/"+ parseInt(width * ratio) + "/q/75" + format;
        }else{
            addon += "imageView2/2/h/"+ parseInt(height * ratio) + "/q/75" + format;
        }
        return addon;
    };
    var IS_MOBILE = false,
        IS_PHONE = false,
        IS_TABLET = false,
        IS_HTTPS = false;
    <?php if(isMobile()):?>
    IS_MOBILE = true;
    <?php endif?>
    <?php if(isPhone()):?>
    IS_PHONE = true;
    <?php endif?>
    <?php if(isTablet()):?>
    IS_TABLET = true;
    <?php endif?>
    <?php if(IS_HTTPS):?>
    IS_HTTPS = true;
    <?php endif?>

    var bg = "<?php
        if($this->is("index")){
            $this->banner = $this->options->defaultBg;
        } else {
            $this->banner = loadArchiveBanner($this);
        }
        echo $this->banner;
        ?>";
    var getBgHeight = function(windowHeight){
        windowHeight = windowHeight || 560;
        if (windowHeight > window.screen.availHeight) {
            windowHeight = window.screen.availHeight;
        }
        <?php if(isset($this->fields->bannerHeight)):?>
        var bgHeightP = "<?=$this->fields->bannerHeight?>";
        <?php else:?>
        var bgHeightP = "<?=$this->options->defaultBgHeight?>";
        <?php endif?>
        bgHeightP = bgHeightP.trim();
        bgHeightP = parseFloat(bgHeightP);
        bgHeightP =  windowHeight * bgHeightP / 100;

        return bgHeightP;
    };
    <?php if((!empty($this->options->otherOptions) && in_array('useQiniuImageResize', $this->options->otherOptions))):?>
    var addon = getImageAddon(width, height);
    bg = bg.trim();
    bg += addon;
    <?php endif?>
</script>
<?php if(isMobile()):?>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merriweather:300italic,300&subset=latin,latin-ext">
<?php else:?>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merriweather:300italic,300&subset=latin,latin-ext">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:100,300,400,600&subset=latin,latin-ext">
<?php endif?>
<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" href="//cdn.bootcss.com/normalize/3.0.3/normalize.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= STATIC_PATH ?>css/base.css">

<?php if(IS_HTTPS): ?>
<link rel="stylesheet" href="//cdn.bootcss.com/nprogress/0.2.0/nprogress.min.css">
<?php else:?>
<link rel="stylesheet" href="http://apps.bdimg.com/libs/nprogress/0.1.2/nprogress.css">
<?php endif?>

<?php if(THEME_CLASS == "theme-dark"):?>
    <link rel="stylesheet" href="<?=$highlightJSPath?>/styles/tomorrow-night-eighties.min.css">
<?php else:?>
    <link rel="stylesheet" href="<?=$highlightJSPath?>/styles/tomorrow.min.css">
<?php endif?>
<?php if($this->options->disableAutoNightTheme <= 0 && !hasValue($this->options->disqusShortName) && THEME_CLASS != "theme-dark"):?>
    <script>
        var hour = new Date().getHours();
        var USE_MIRAGES_DARK = false;
        if (hour <= 5 || hour >= 22) {
            USE_MIRAGES_DARK = true;
            injectStyle("<?=$highlightJSPath?>/styles/tomorrow-night-eighties.min.css");
        }
    </script>
<?php endif?>
<link rel="stylesheet" href="<?= STATIC_PATH ?>css/theme.css">
<?php if (strlen($this->options->shortcutIcon) > 5): ?>
<link rel="shortcut icon" href="<?php $this->options->shortcutIcon(); ?>">
<?php else:?>
<link rel="shortcut icon" href="<?php $this->options->siteUrl(); ?>favicon.ico">
<?php endif?>

<script src="<?=$highlightJSPath?>/highlight.min.js" type="text/javascript"></script>
<?php if(IS_HTTPS): ?>
<script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.bootcss.com/nprogress/0.2.0/nprogress.min.js" type="text/javascript"></script>
<?php else:?>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="http://apps.bdimg.com/libs/nprogress/0.1.2/nprogress.js" type="text/javascript"></script>
<?php endif?>
<?=$addOnHighlightLangHtml; ?>

<?php if((!empty($this->options->otherOptions) && in_array('showJax', $this->options->otherOptions))):?>
<script src="//cdn.bootcss.com/mathjax/2.5.3/MathJax.js" type="text/javascript"></script>
<script src="<?= STATIC_PATH ?>js/TeX-AMS-MML_HTMLorMML.js" type="text/javascript"></script>
<?php endif?>
<script type="text/javascript">
    hljs.initHighlightingOnLoad();
</script>
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header("generator=&");echo "\n"; ?>
<?php if(!$this->user->hasLogin()):?>
<script>
    <?php $this->options->tongJi();echo "\n"; ?>
</script>
<?php endif?>
