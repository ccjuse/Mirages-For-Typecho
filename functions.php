<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig(Typecho_Widget_Helper_Form $form) {

    $baseTheme = new Typecho_Widget_Helper_Form_Element_Radio('baseTheme', array('0'=>_t('Mirages'), '1'=>_t('Mirages White'),'2'=>_t('Mirages Dark')), '0', _t('主题主色调'),_t('默认为 Mirages'));
    $form->addInput($baseTheme);
    $disableAutoNightTheme = new Typecho_Widget_Helper_Form_Element_Radio('disableAutoNightTheme', array('0'=>_t('开启'), '1'=>_t('关闭')), '0', _t('自动夜间模式'),_t('默认为开启'));
    $form->addInput($disableAutoNightTheme);
    $staticPath = new Typecho_Widget_Helper_Form_Element_Text('staticPath', NULL, NULL, _t('静态文件路径'), _t('除非你需要引用其它域名下的静态文件并且你知道这个设置是什么，否则请留空'));
    $form->addInput($staticPath);
    $defaultBg = new Typecho_Widget_Helper_Form_Element_Text('defaultBg', NULL, NULL, _t('站点背景大图地址'), _t('在这里填入一个图片URL地址, 以在网站显示一个背景大图'));
    $form->addInput($defaultBg);
    $defaultBgHeight = new Typecho_Widget_Helper_Form_Element_Text('defaultBgHeight', NULL, '60', _t('站点背景大图高度(%)'), _t('站点背景大图高度'));
    $form->addInput($defaultBgHeight);
    $sideMenuAvatar = new Typecho_Widget_Helper_Form_Element_Text('sideMenuAvatar', NULL, '', _t('侧边栏头像Email'), NULL);
    $form->addInput($sideMenuAvatar);

    $disqusShortName = new Typecho_Widget_Helper_Form_Element_Text('disqusShortName', NULL, NULL, _t('Disqus Short Name'), _t('Disqus评论'));
    $form->addInput($disqusShortName);

    $duoshuoShortName = new Typecho_Widget_Helper_Form_Element_Text('duoshuoShortName', NULL, NULL, _t('多说 Short Name'), _t('多说评论'));
    $form->addInput($duoshuoShortName);
    $duoshuoUserId = new Typecho_Widget_Helper_Form_Element_Text('duoshuoUserId', NULL, NULL, _t('多说User Id'), _t('多说 User Id, 用于显示「博主」标签, 不同于「自定义多说Author Id」'));
    $form->addInput($duoshuoUserId);
    $duoshuoCustomEmbedJs = new Typecho_Widget_Helper_Form_Element_Text('duoshuoCustomEmbedJs', NULL, NULL, _t('自定义多说Embed.js'), _t('自定义多说Embed.js的地址'));
    $form->addInput($duoshuoCustomEmbedJs);
    $duoshuoCustomAuthorId = new Typecho_Widget_Helper_Form_Element_Text('duoshuoCustomAuthorId', NULL, NULL, _t('自定义多说Author Id'), _t('自定义多说Author Id'));
    $form->addInput($duoshuoCustomAuthorId);


    $adminDir = new Typecho_Widget_Helper_Form_Element_Text('adminDir', NULL, NULL, _t('后台路径'), _t('如果你修改了「__TYPECHO_ADMIN_DIR__」，请在这里填写，否则请留空，默认为「admin」'));
    $form->addInput($adminDir);

    $shortcutIcon = new Typecho_Widget_Helper_Form_Element_Text('shortcutIcon', NULL, NULL, _t('Shortcut Icon'), _t('留空则使用根目录下的「favicon.ico」文件'));
    $form->addInput($shortcutIcon);
    $customMeta = new Typecho_Widget_Helper_Form_Element_Textarea('customMeta', NULL, NULL, _t('Custom Meta'), _t(''));
    $form->addInput($customMeta);

    $tongJi = new Typecho_Widget_Helper_Form_Element_Text('tongJi', NULL, '', _t('站点统计代码'), NULL);
    $form->addInput($tongJi);
    $bowserInsight = new Typecho_Widget_Helper_Form_Element_Text('bowserInsight', NULL, NULL, _t('Browser Insight'), _t(''));
    $form->addInput($bowserInsight);

    $otherOptionsBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('otherOptions',
        array(
            'showJax' => _t('显示数学公式 (MathJax)'),
            'enableSSCROnWindows' => _t('为 Windows 平台的 Chrome 浏览器启用平滑滚动'),
            'useQiniuImageResize' => _t('为文章中的图片自动转换合适的大小和格式 (需要使用七牛云存储，配置见 readme.md)'),
            'enableWebP' => _t('启用 WebP 图像格式 (需要使用七牛云存储)'),
        ),
        array(), _t('其他选项'));
    $form->addInput($otherOptionsBlock->multiMode());
}

function hasValue($field) {
    if (is_numeric($field)) {
        return true;
    }
    return strlen($field) > 0;
}

function isTrue($field) {
    return $field > 0 || strtolower($field) == 'true';
}

/** Device Check */
function isMobile(){
    return deviceIs('Mobile');
}
function isPhone(){
    if(isTablet()){
        return false;
    }
    return deviceIs(array("Android", 'iPhone', 'iPod', 'Phone'));
}
function isTablet(){
    return deviceIs(array("iPad", 'Tablet'));
}
function isWindowsAboveVista(){
    return __check(array("Windows", "NT"), true) && !isWindowsBlowXp();
}
function isWindowsBlowXp(){
    return __check(array("Windows", "NT 5"), true) || deviceIs("Windows", "NT");
}
function isWindows(){
    return deviceIs("Windows");
}
function isMacOSX(){
    return deviceIs("Macintosh");
}
function isELCapitanOrAbove(){
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);//Mac OS X 10_11_4
    if (preg_match('/^.+Mac\s+OS\s+X\s+\d+[^a-zA-Z0-9]+(\d+).*$/i', $ua, $matches)) {
        $version = intval($matches[1]);
        if ($version >= 11) {
            return true;
        }
    }
    return false;
}
function isSafari() {
    return __check(array("Safari", "Version/"), true) && !__check(array("Chrome", "Opera", "QQ"), false);
}
function deviceIs($is, $not = array(), $needAllMatch = false){
    if(empty($not)){
        return __check($is, $needAllMatch);
    }
    return __check($is, $needAllMatch) && !__check($not, $needAllMatch);
}
function shouldEnableBlurFilter(){
    if(__check(array("Firefox")) || (deviceIs(array("Chrome"), array("Edge")))){
        return false;
    }
    if (isMobile()){
        if(__check(array("Android"))){
            return false;
        }
    }
    return true;
}
function shouldEnableWebP() {
    if (isMobile()) {
        return false;
    }
    if (deviceIs('Chrome', 'Edge')) {
        $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
        if (preg_match('/^.+Chrome\/(\d+).*$/i', $ua, $matches)) {
            $version = intval($matches[1]);
            if ($version >= 23 ) {
                return true;
            }
        }
    }
    if (deviceIs('OPR')) {
        $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
        if (preg_match('/^.+OPR\/(\d+).*$/i', $ua, $matches)) {
            $version = intval($matches[1]);
            if ($version >= 15 ) {
                return true;
            }
        }
    }
    return false;
}
function __check($items, $needAllMatch = false) {
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    if(is_array($items)){
        if($needAllMatch){
            $res = true;
            foreach ($items as $item) {
                if(!strpos($ua,strtolower($item))){
                    $res = false;
                }
            }
            return $res;
        }else{
            foreach ($items as $item) {
                if(strpos($ua,strtolower($item))){
                    return true;
                }
            }
            return false;
        }
    }else{
        return strpos($ua, strtolower($items));
    }
}
function startsWith($subject, $str) {
    if (strlen($subject) < strlen($str)) {
        return false;
    } else {
        return !substr_compare($subject, $str, 0, strlen($str));
    }
}
function loadArchiveBanner($that) {

    if (count($that->stack) == 1) {
        if (isset($that->fields->banner)) {
            return $that->fields->banner;
        } else {
            return "";
        }
    } else {
        $cids = array();
        for($i = 0; $i < count($that->stack); $i++) {
            $cids[] = $that->stack[$i]["cid"];
        }
        if (count($cids) < 1) {
            return "";
        }
        $rows = $that->ddb->fetchAll($that->ddb->select()->from('table.fields')
            ->where('cid IN ?', $cids)
            ->where('name = ?', 'banner')
        );
        $banners = array();
        foreach ($rows as $row) {
            $banners[] = $row[$row['type'] . '_value'];
        }
        if (count($banners) == 1) {
            return $banners[0];
        } elseif (count($banners) == 0) {
            return "";
        } else {
            return $banners[count($banners) - 1];
        }
    }
}

function renderCards($content) {
    $currentGroupId = 0;
    $lastFindIndex = 0;
    $lastFindLength = 0;
    $linkGroup = array();
    $linkGroupStartIndex = array();
    $linkGroupEndIndex = array();
    $first = true;

    $totalCount = preg_match_all('/(<p>)*<a\s+href=\"([^\"]+?)\"[^<>]*>([^<>]+?)<\/a>\+\(<a\s+href=\"([^\"]+?)\">([^<>]+?)<\/a>\)(<\/p>)*(<\s*br\s*\/\s*>)*(<\s*\/\s*br\s*>)*/ixs', $content, $matches);

    if ($totalCount <= 0) {
        $totalCount = preg_match_all('/(<p>)*<a\s+href=\"([^\"]+?)\"[^<>]*>([^<>]+?)<\/a>\+\(([^<>]+?)\)(<\/p>)*(<\s*br\s*\/\s*>)*(<\s*\/\s*br\s*>)*/ixs', $content, $matches);
    }

    for ($i = 0; $i < $totalCount; $i++) {
        if ($first) {
            $first = false;
            $useNewGroup = true;
            $currentFindIndex = strpos($content, $matches[0][$i]);
            $currentFindLength = mb_strlen($matches[0][$i]);
        } else {
            $lastEndIndex = $lastFindIndex + $lastFindLength;
            $currentFindIndex = strpos($content, $matches[0][$i], $lastEndIndex - 1);
            $currentFindLength = mb_strlen($matches[0][$i]);
            if ($currentFindIndex - $lastEndIndex >= 0) {
                $splitContent = substr($content, $lastEndIndex, $currentFindIndex - $lastEndIndex);
                if (strlen($splitContent) > 0 && preg_match('/\w+/xs', $splitContent)) {
                    $trimSplitContent = preg_replace('/<br\s*\/>/ixs', '', $splitContent);
                    $trimSplitContent = preg_replace('/<\s*\/\s*br>/ixs', '', $trimSplitContent);
                    if (strlen($trimSplitContent) > 0 && preg_match('/\w+/xs', $trimSplitContent)) {
                        $useNewGroup = true;
                    } else {
                        $useNewGroup = false;
                    }
                } else {
                    $useNewGroup = false;
                }
            } else {
                $useNewGroup = false;
            }
        }

        if ($useNewGroup) {
            $currentGroupId ++;
        }
        if (!isset($linkGroup[$currentGroupId])) {
            $linkGroup[$currentGroupId] = array();
        }
        if ($useNewGroup) {
            $linkGroupStartIndex[$currentGroupId] = $currentFindIndex;
        }
        $linkGroupEndIndex[$currentGroupId] = $currentFindIndex + $currentFindLength;
        $match = array();
        $match[2] = $matches[2][$i];
        $match[3] = $matches[3][$i];
        $match[4] = $matches[4][$i];
        $linkGroup[$currentGroupId][] = $match;
        $lastFindIndex = $currentFindIndex;
        $lastFindLength = $currentFindLength;
    }

    $output = "";
    for ($i = 1; $i <= $currentGroupId; $i++) {
        $start = $linkGroupStartIndex[$i];

        if ($i > 1){
            $lastId = $i - 1;
            $lastEnd = $linkGroupEndIndex[$lastId];
            $output .= substr($content, $lastEnd, $start - $lastEnd);
        } else {
            $output .= substr($content, 0, $start);
        }
        $matches = $linkGroup[$i];
        $linkGroupHtml = "<div class=\"link-box\">\n";

        foreach ($matches as $match) {
            $linkGroupHtml .= "<a href=\"{$match[2]}\" target=\"_blank\">";
            $linkGroupHtml .= "<div class=\"thumb\">";
            $linkGroupHtml .= "<img width=\"200\" height=\"200\" src=\"{$match[4]}\" alt=\"{$match[3]}\"></div>";
            $linkGroupHtml .= "<div class=\"content\">";
            $linkGroupHtml .= "<div class=\"title\"><h3>{$match[3]}</h3></div>";
            $linkGroupHtml .= "</div></a>\n";
        }
        $linkGroupHtml .= '</div>';
        $output .= $linkGroupHtml;
    }

    if ($currentGroupId < 1) {
        return $content;
    }

    $output .= substr($content, $linkGroupEndIndex[$currentGroupId]);
    return $output;
}