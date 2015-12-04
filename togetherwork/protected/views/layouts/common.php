<!--展示首页、登录、注册等代买信息-->
<!DOCTYPE html>
  <!--[if lt IE 8]>
  <script>
  alert('您使用的浏览器版本过低了哦！');
  alert('建议使用现代浏览器浏览本站哦！');
  alert('如果你能用 Firefox / Chrome ，那真是极好的！');
  </script>
  <script src="http://cdn.staticfile.org/json2/20121008/json2.js"></script>
  <![endif]-->
  <!--[if IE 9]> <html  class="ie9"> <![endif]-->
  <!--[if !IE]><!-->
<html ><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>promo.css">
<title>TogetherWork</title>
<meta name="keywords" content=" ">
<meta name="description" content="">
<meta name="classification" content="">
 
<link href="<?php echo CSS_URL; ?>bootstrap-yii.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>style-metro.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>style.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>style-responsive.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>default_002.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo CSS_URL; ?>uniform.css" rel="stylesheet" type="text/css">
 
<link href="<?php echo CSS_URL; ?>animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_URL; ?>jquery.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>chosen.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>select2_metro.css">
<link href="<?php echo CSS_URL; ?>glyphicons.css" rel="stylesheet">
<link href="<?php echo CSS_URL; ?>halflings.css" rel="stylesheet">
<link href="<?php echo CSS_URL; ?>default.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="<?php echo IMG_URL; ?>favicon.ico">
<script src="<?php echo JS_URL; ?>ga.js" async="" type="text/javascript"></script><script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-33076957-1']);
      _gaq.push(['_setDomainName', 'busymatch.com']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

   </script>

</head>
 
 
<body class="page-full-width page-header-fixed page-boxed">
 
<div class="header navbar navbar-inverse navbar-fixed-top">
 
<div class="navbar-inner">
<div class="container">
 
<a class="brand" href="http://busymatch.com/">
<img src="<?php echo IMG_URL; ?>logo.png" alt="logo">
</a>
 
 
<div class="navbar hor-menu hidden-phone hidden-tablet">
<div class="navbar-inner">
<ul class="nav">
<li>
<a href="./index.php?r=index">
首页
</a>
</li>
<li>
<a href="#">
推荐
</a>
</li>
<li>
<a href="#">
发现
</a>
</li>
<li>
<a href="#">
更多
</a>
</li>
</ul>
</div>
</div>
 
 
<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
<img src="<?php echo IMG_URL; ?>menu-toggler.png" alt="">
</a>
 
 
<ul class="nav pull-right">

<!-- 判断用户是否登录 -->
<?php
//在user组件里有个方法，getIsGuest(),判断是否是游客
if(Yii::app()->user->getIsGuest()){?>

<li><a href="./index.php?r=user/login">登 录</a></li>
<li><a href="./index.php?r=user/register">注 册</a></li>

<?php } else {?>
 
<li class="dropdown" id="header_inbox_bar">
<a href="#" id="drop1" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon-bell"></i>
</a>
<ul class="dropdown-menu extended inbox" id="notifyList">
<li><p class="tc">Opening...</p></li>
</ul>
</li>
 
<li class="dropdown user">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img class="size32" src="<?php echo IMG_URL; ?>nophoto_0.jpg"> <span class="username"><?php echo Yii::app()->user->name;?><!-- &nbsp;&nbsp;∨ --></span>
<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu">
<li><a href=""><i class="icon-user"></i>我的主页</a></li>
<li class="divider"></li>
<li><a href=""><i class="icon-calendar"></i>设置</a></li>
<li class="divider"></li>
<li><a href="./index.php?r=user/logout"><i class="icon-key"></i>退出</a></li>
</ul>
</li>

<?php }?>
 


</ul>
 
</div>
</div>
 
</div>
 
<div class="container">
 
<div class="page-container row-fluid">
 
<div style="" class="page-sidebar nav-collapse collapse visible-phone visible-tablet">
<ul class="page-sidebar-menu">
<li>
<a href="#">
首页
</a>
</li>
<li>
<a href="#">
推荐
</a>
</li>
<li>
<a href="#">
阅读
</a>
</li>
<li>
<a href="#">
建议
</a>
</li>
</ul>
</div>




<!--$content不包含头部、脚步等重复代码区-->
<!--普通模板内容-->
<?php echo $content; ?>

<!-- 页脚部分 -->

<div class="footer">
<div class="container">
<div class="footer-inner">
<p>
<small>Copyright © 2013 Love Soft TogetherWork. <a href="#">Qu</a>开源</small>
</p>
<p class="hint footerLinks"><small>管理员？<a class="hint" href="./index.php?r=backend/manager/login" target="_blank">点我进入！</a>
<br>TW</small>
</p>
</div>
<div class="footer-tools">
<span class="go-top">
<i class="icon-angle-up"></i>
</span>
</div>
</div>
</div>
 
 
 
<script src="<?php echo JS_URL; ?>jquery-1.js" type="text/javascript"></script>
<script src="<?php echo JS_URL; ?>jquery-migrate-1.js" type="text/javascript"></script>
 
<script src="<?php echo JS_URL; ?>jquery-ui-1.js" type="text/javascript"></script>
<script src="<?php echo JS_URL; ?>bootstrap.js" type="text/javascript"></script>

<!--[if lt IE 9]>
   <script src="<?php echo PLUG_URL; ?>excanvas.js"></script>
   <script src="<?php echo PLUG_URL; ?>respond.js"></script>  
   <![endif]-->

<script src="<?php echo JS_URL; ?>breakpoints.js" type="text/javascript"></script>
 
<script src="<?php echo JS_URL; ?>jquery_003.js" type="text/javascript"></script>
<script src="<?php echo JS_URL; ?>jquery_002.js" type="text/javascript"></script>
<script src="<?php echo JS_URL; ?>jquery_006.js" type="text/javascript"></script>
<script src="<?php echo JS_URL; ?>jquery.js" type="text/javascript"></script>
<script src="<?php echo JS_URL; ?>jquery_004.js" type="text/javascript"></script>
<script src="<?php echo JS_URL; ?>jquery_005.js"></script>
<script type="text/javascript" src="<?php echo JS_URL; ?>chosen.js"></script>
<script type="text/javascript" src="<?php echo JS_URL; ?>select2.js"></script>
 
<script src="<?php echo JS_URL; ?>app.js"></script>
<script src="<?php echo JS_URL; ?>setting.js"></script>
<script src="<?php echo JS_URL; ?>form.js"></script>
<script src="<?php echo JS_URL; ?>main.js"></script>
<script>
      jQuery(document).ready(function() {    
         App.init();
         jQuery('#promo_carousel').carousel({
            interval: 10000,
            pause: 'hover'
         });
      });
   </script>
 
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('a[rel="tooltip"]').tooltip();
jQuery('a[rel="popover"]').popover();
});
/*]]>*/
</script>

 
</body></html>