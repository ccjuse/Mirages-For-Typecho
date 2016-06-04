<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <link rel="stylesheet" href="http://fonts.useso.com/css?family=Open+Sans:100,300,400,600&subset=latin,latin-ext">
    <style>
        body{
            font-family: 'Open Sans', 'Helvetica Neue', 'Hiragino Sans GB', 'Microsoft YaHei', Helvetica, arial, sans-serif !important;
            font-weight: 100;
        }
        #wrap{
            color: #191919;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            /*background-color: rgba(255,255,255,.7);*/
            background: -moz-radial-gradient(50% 50%, farthest-side, #fff, #efefef);
            background: -webkit-gradient(radial, 50% 50%, 250, 50% 50%, 750, from(#fff), to(#bbb));
            overflow: hidden;
        }
        #content{
            padding-top: 30vh;
            text-align: center;
        }
        #content .title {
            font-size: 4em;
        }
        #content .content {
            font-size: 1.78em;
        }
        .rotate{
            -webkit-transition: all 10s;
            transition: all 10s;
        }
        .rotate:hover{
            -webkit-transform: rotate(36000deg);
            transform: rotate(36000deg);
        }
    </style>
    <title>PAGE NOT FOUND</title>
    <script>
        <?php $this->options->tongJi(); ?>
    </script>
</head>

<body>
<div id="wrap">
    <div id="content">
        <p class="title">PAGE NOT FOUND</p>
    </div>
</div>
</body>
</html>