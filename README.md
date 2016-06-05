> # Mirages

示例：[Mirages](https://hran.me/mirages.html)

大概，这是一款简洁的单栏的适合阅读的主题，适合放大段大段的文字、代码，没有炫酷的特效，字体设置上属于个人喜好，但大致上也不是很难看。。说到文字，因为考虑到一些阅读的舒适性的问题，所以栏宽设置的比较窄，因而很难想象类似 iMac 5K 这样的设备上到底有多么糟糕的界面。。。

主题为自适应，移动设备上体验尚可（至少 iPhone 和 iPad 上的阅读体验还可以）

主题内置了夜间模式，根据当地时间自动切换（22 点到第二天凌晨 6 点前为夜间模式）

图：

![首页](https://o4uhjo7cq.qnssl.com/hran/2016/05/27/146434006570435_%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-27%20%E4%B8%8B%E5%8D%884.47.54.png?imageView2/2/h/720/q/75)

![侧边栏](https://o4uhjo7cq.qnssl.com/hran/2016/05/27/146434008596701_%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-27%20%E4%B8%8B%E5%8D%884.48.19.png?imageView2/2/h/720/q/75)

没有头图的样子：

![无头图首页预览](https://o4uhjo7cq.qnssl.com/hran/2016/05/29/146448528656032_%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-29%20%E4%B8%8A%E5%8D%889.27.54.png?imageView2/2/h/720/q/75)

## 更新

### 2016-06-05 日更新

- 修复了部分样式问题

- 更新duoshuo.css, 添加博主标识
  
  你需要到duoshuo.css文件里，修改第一行中的`[data-user-id='0']:after` 中的`user-id`为你自己的User ID。
  
### 2016-05-28 日更新

- 添加了多说评论的支持

  到设置外观，填入`duoshuoShortName`即可。当然，你也可以直接使用插件，而不用理会这个。

  主题内置了多说的自定义外观，需要的请将`css/duoshuo.css`中的内容拷贝到**多说后台(http://yourdomain.duoshuo.com/admin/settings/)**的自定义CSS处，然后保存。**该自定义外观基于多说官方的暗色线框主题，**因此请在后台(http://yourdomain.duoshuo.com/admin/settings/themes/)启用暗色线框主题。

## 安装主题

下载后拖到`/usr/themes`目录，然后到**设置外观**里做一些调整即可。


## 重要！关于三方评论系统

主题内置了 Disqus 和多说两种评论系统，要使用的话仅需要设置对应的 short name 即可。

多说默认官方代码中提供了`data-thread-key`，并**使用了`cid`作为 key，此主题也是如此**。如果你原有评论系统中使用的不是以`cid`作为key，那么请做修改，修改方法在本页「友链页的书写格式」下面。

Disqus 官方通用代码**没有设置**`data-disqus-identifier`，默认以文章 URL 作为`data-disqus-identifier`。**此主题设置了**`data-disqus-identifier`，并以文章 URL 的`path`作为`data-disqus-identifier`：

如有：`https://hran.me/mirages.html?s=1&r=2`

path 为：`/mirages.html`

如果你原有评论系统中使用的不是以此作为 key，那么请做修改，修改方法在本页「友链页的书写格式」下面。

## 外观设置

| 设置项               | 说明                                       |
| ----------------- | ---------------------------------------- |
| 静态文件路径            | 用于 CDN 加速，以主题目录为根目录，设置后一些静态文件会替换成该路径上的文件。 |
| 站点背景大图地址          | 首页上的大图，留空则不显示。                           |
| 站点背景大图高度( % )     | 首页大图占屏幕总高度的百分比。                          |
| 侧边栏头像 Email       | 名字懒得改了，就是侧边栏的头像 URL。                     |
| Disqus Short Name | 如果使用 Dispus，在这里设置即可。                     |
| 后台路径              | 登陆后侧边栏会有一个 Dashboard 菜单，方便进入后后台，如果你修改了`__TYPECHO_ADMIN_DIR__`，请在这里填写。 |

其他的自行理解吧。。

**顺便提一句：侧边栏菜单项为你的「独立页面」**，可以在`管理 -> 独立页面`进行隐藏、排序等操作。

## 自定义字段

**不用也不会死，嫌多忽略即可。**

主题提供了一些自定义字段可以针对文章进行一些调整。设置在文章或独立页面的编辑区下方，有一个自定义字段那里，设置以下字段仅会对当前文章或独立页面生效，不会影响其他的文章或独立页面。**区分大小写。**

| 自定义字段              | 说明                                       |
| ------------------ | ---------------------------------------- |
| banner             | 设置页面 Banner 的显示图片 URL，不设置则表示当前页面没有 Banner |
| bannerHeight       | 设置页面 Banner 的高度，不设置则使用主题默认高度， 取值范围 0-100，为浏览器可视区域的高度百分比 |
| hideBottomMsg      | <del>隐藏页面底部的逗比语, 取值范围为整数，大于 0 则表示隐藏，否则不隐藏</del>这玩意已经不复存在了。 |
| hideTitle          | 隐藏文章标题，取值范围为整数，大于 0 则表示隐藏，否则不隐藏          |
| mastheadTitle      | 自定义 masthead 标题                          |
| mastheadSubtitle   | 自定义 masthead 副标题                         |
| mastheadTitleColor | 自定义 masthead 标题及副标题颜色, 默认为 `#FFFFFF`     |
| textAlign          | 设置文章或独立页面的对齐方式，值有`left`、`center`、`right`、`justify`，默认为`justify`(两端对齐)。 |
| contentWidth       | 设置文章或独立页面的**最大**宽度，当然一般情况下文章宽度就是你设置的值，除非受设备限制。 |
| css                | 自定义 css                                  |
| js                 | 自定义 js                                   |


## 友链页的书写格式

基本语法为：`[名称](链接)+(头像链接)`

头像大小建议为**400*400**

Links 可以分组，在两个链接之间加入可见字符即可。

参考：

```markdown 
### 菊苣们
[Typecho](http://typecho.org)+(http://image.qiniudn.com/head.png?imageView2/2/w/400/q/50)
[哈哈](http://haha.cn)+(http://image.qiniudn.com/head.png)
[haha](https://haha.en)+(http://image.qiniudn.com/head.png)
### 逗比
[Hran](https://hran.me)+(http://duanjstatic.qiniudn.com/hran/2016/01/07/145213578473155_labtocat.png?imageView2/2/w/400/q/85)
嗯。。。
```

## Disqus 中`data-disqus-identifier`的修改方法

共计两处：

- `comments.php`：

  ```
  // 第8行
  var disqus_identifier = "<?= $parsed['path'];?>";
  ```

- `index.php`：

  ```
  // 第24行
  <span class="comments"><a href="<?php $this->permalink() ?>#disqus_thread" data-disqus-identifier="<?= $parsed['path'];?>">评论</a></a></span>
  ```

  将其中的`<?= $parsed['path'];?>`替换为你需要的值即可。

## 多说中`data-thread-key`的修改方法

共计两处：

- `comments.php`：

  ```
  // 第37行
  // 原谅我注释了一下，多说那个S*连这里的也给解析了。。。
  <!--<div class="ds-thread" data-thread-key="<?php echo $this->cid;?>" data-title="<?php echo $this->title;?>" data-author-key="<?=$dsAuthorId?>" data-url=""></div>-->
  ```

- `index.php`：

  ```
  // 第26行
  <span class="comments"><a href="<?php $this->permalink() ?>#comments"><span class="ds-thread-count" data-thread-key="<?php echo $this->cid;?>" data-count-type="comments"></span></a></span>
  ```

  将其中的`<?php echo $this->cid;?>`替换为你需要的值即可。

## 浏览数统计

下载[这个插件](http://lixianhua.com/typecho_viewsnum_plugin.html)，然后启用即可。

## 附加选项

**如果你的图床使用的是七牛**，可以考虑做以下修改，这样，主题就会根据设备宽度自行调整图片尺寸。

### 针对Typecho 1.0(14.10.10)

``` 
class CommonMark_HtmlRenderer{
        public function renderInline(CommonMark_Element_InlineElementInterface $inline){
            case CommonMark_Element_InlineElement::TYPE_IMAGE:
                //修改此行，将$attrs['src']修改为$attrs['data-src']
                $attrs['data-src'] = $this->escape($inline->getAttribute('destination'), true);
                 ...
        }
    }
```

### 针对开发版Typecho 1.1(15.5.12)

`var/MarkdownExtraExtended.php`

``` 
    替换'img src='为'img data-src='，共四处
```
