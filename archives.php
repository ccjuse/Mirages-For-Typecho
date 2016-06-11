<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php

/**
 * Archives
 *
 * @package custom
 */
$this->need('header.php'); ?>
<style type="text/css">

    #archives:after {
        clear: both;
        display: block;
        visibility: hidden;
        height: 0 !important;
        content: " ";
        font-size: 0 !important;
        line-height: 0 !important
    }

    #archives {
        zoom: 1;
        padding-top: 50px;
    }

    #archive-nav {
        float: left;
        width: 50px
    }

    .archive-nav {
        display: block;
        position: fixed;
        width: 40px;
        padding: 5px;
        border: 1px solid #eee;
        text-align: center
    }

    .year {
        border-top: 1px solid #ddd
    }

    .month {
        color: #ccc;
        padding: 5px;
        cursor: pointer;
        background: #f9f9f9
    }

    .month.monthed {
        color: #777
    }

    .month.selected, .month:hover {
        background: #f2f2f2
    }

    .monthall {
        display: none
    }

    .year.selected .monthall {
        display: block
    }

    .year-toogle {
        display: block;
        padding: 5px;
        text-decoration: none;
        background: #eee;
        color: #333;
        font-weight: bold
    }

    .archive-title {
        padding-bottom: 40px;
    }

    .brick {
        margin-bottom: 10px
    }

    .archives a {
        position: relative;
        display: block;
        padding: 10px;
        color: #333;
        font-style: normal;
        line-height: 18px;
        font-size: 1.143em;
    }

    .time {
        color: #888;
        padding-right: 10px
    }

    .archives a:hover {
        background: #eee
    }

    #archives h3 {
        padding-bottom: 10px;
        font-size: 2em;
        font-weight: 300;
    }
    #archives-title{
        font-size: 3em;
        font-weight: 100;
    }
    #archives-content{
        padding-top: 30px;
    }

    .brick em {
        color: #aaa;
        padding-left: 10px
    }

</style>
<div id="archives">
    <h1 id="archives-title">Archives</h1>
    <div id="archives-content">
        <br>
        <?php
        $Month_E = array(1 => "Jan",
            2 => "Feb",
            3 => "Mar",
            4 => "Apr",
            5 => "May",
            6 => "Jun",
            7 => "Jul",
            8 => "Aug",
            9 => "Sep",
            10 => "Oct",
            11 => "Nov",
            12 => "Dec");
        $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
        $year = 0;
        $mon = 0;
        $i = 0;
        $j = 0;
        $all = array();
        $output = '';
        while ($archives->next()):
            $year_tmp = date('Y', $archives->created);
            $mon_tmp = date('n', $archives->created);

            $y = $year;
            $m = $mon;
            if ($mon != $mon_tmp && $mon > 0) $output .= '</div></div>';
            if ($year != $year_tmp) {
                $year = $year_tmp;
                $all[$year] = array();
            }

            if ($mon != $mon_tmp) {
                $mon = $mon_tmp;
                array_push($all[$year], $mon);
                $output .= "<div class='archive-title' id='arti-$year-$mon'><h3>$year-$Month_E[$mon]</h3><div class='archives archives-$mon' data-date='$year-$mon'>";
            }
            $output .= '<div class="brick"><a href="' . $archives->permalink . '" style="text-decoration:none;"><span class="time">' . date('m-d', $archives->created) . '</span style="color:#888;">' . $archives->title . '</a></div>';
        endwhile;
        $output .= '</div></div>';
        echo $output;

        $html = "";
        $year_now = date("Y");
        foreach ($all as $key => $value) {
            $html .= "<li class='year' id='year-$key'><a href='#' class='year-toogle' id='yeto-$key'>$key</a><ul class='monthall'>";
            for ($i = 12; $i > 0; $i--) {
                if ($key == $year_now && $i > $value[0]) continue;
                $html .= in_array($i, $value) ? ("<li class='month monthed' id='mont-$key-$i'>$i</li>") : ("<li class='month'>$i</li>");
            }
            $html .= "</ul></li>";
        }
        ?>
    </div>
</div>
<?php $this->need('footer.php'); ?>