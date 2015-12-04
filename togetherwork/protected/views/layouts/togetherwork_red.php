<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css' />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<title>足迹，走过的每一步</title>
	
	<meta name="description" content="" />
	<meta name="author" content="" />
	
	<link rel="shortcut" href="<?php echo IMG_URL; ?>favicon.ico" />
	<link rel="stylesheet" href="<?php echo CSS_URL; ?>style1.css" media="screen" />
	<link rel="stylesheet" href="<?php echo CSS_URL; ?>skeleton.css" media="screen" />
	
	
	<script type="text/javascript" src="<?php echo JS_URL; ?>jquery-1.7.2.js"></script>

	<!-- HTML5 Shiv + detect touch events -->
	<script type="text/javascript" src="<?php echo JS_URL; ?>modernizr.custom.js"></script>


<style type="text/css">

/*登录注册特别设计*/

.user-info.unlogged {
  height: 29px;
  margin: 20px 40px 10px 0;
  border-radius: 4px;
  float:right;
}
a.user-btn {
  position: relative;
  filter: none;
  display: inline-block;
  *display: inline;
  zoom: 1;
  height: 19px;
  line-height: 20px;
  padding: 5px 8px;
  background: #EEE;
  color: #777;
  text-shadow: 1px 1px #FFF;
  -webkit-user-select: none;
  -moz-user-select: none;
}
.user-btn.signup {
  border-radius: 4px 0 0 4px;
  border-right: 1px solid #CCC;
}
.user-btn.login {
  border-radius: 0 4px 4px 0;
  border-left: 1px solid #FFF;
}
.user-btn.signup:hover {
  background: #FF595B;
  color: #FFF;
  border-right-color: #F44;
  text-shadow: none;
}
.user-btn.login:hover {
  background: #0090FF;
  color: #FFF;
  border-left-color: #1AF;
  text-shadow: none;
}
.user-btn:active {
  top: 1px;
}
</style>


</head>
<body class="menu-1 h-style-1 text-1">
<div id="headernew">
<div class="head-wp">
<div class="logo z">
            <a href="" title=""><img src="<?php echo IMG_URL; ?>logo.png" alt=""></a>
        </div>
    </div>
<?php
				//在user组件里有个方法，getIsGuest(),判断是否是游客
				if(Yii::app()->user->getIsGuest()){?>
				<div class="user-info unlogged">
				<a class="user-btn signup" href="<?php echo Yii::app()->createUrl('user/register'); ?>">注册</a>
				<a class="user-btn login J_BtnLogin" href="<?php echo Yii::app()->createUrl('user/login'); ?>">登录</a>
				</div>
				
				<?php }?>
</div>
<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<div id="menu">
	<div class="menu-wp" id="nav-id">
    	<div class="a-link">
        	<ul id="sddm" style="width:1000px;">
	<li><a href="./index.php">首页</a></li>
				<li><a href="./index.php?r=article/index">感觉</a></li>
				<li><a href="./index.php?r=weiyu">微语</a></li>
	
				<li><a href="./index.php?r=album">美图</a></li>
				<li><a href="./index.php?r=quiet/index" target="_blank">静&nbsp;·&nbsp;一个人</a></li>
				<!-- 判断用户是否登录 -->
				<?php
				//在user组件里有个方法，getIsGuest(),判断是否是游客
				if(!Yii::app()->user->getIsGuest()){?>
				<li style="float:right;margin-right:-184px;"><a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>" onmouseover="mopen('m5')" onmouseout="mclosetime()"><?php echo Yii::app()->user->nickname;?>&nbsp;&nbsp;∨</a>
					<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>">我的足迹</a>
					<a href="<?php echo Yii::app()->createUrl('user/myprofile'); ?>">基本信息</a>
					<a href="<?php echo Yii::app()->createUrl('user/edit_password'); ?>">修改密码</a>
					<a href="<?php echo Yii::app()->createUrl('usertags/usertags'); ?>">个性标签</a>
					<a href="<?php echo Yii::app()->createUrl('user/logout'); ?>" onclick="if (confirm('慢走，如果累了，记得这里有那份宁静！^_^ ~')) return true; else return false;">退出</a>
					</div>
				</li>
				<?php }?>
</ul>
        </div>
    </div>
</div>
<div class="wrap" style="margin-top:60px;">
	
	
				
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	


<!--$content不包含头部、脚步等重复代码区-->
<!--普通模板内容-->
<?php echo $content; ?>

<!-- 页脚部分 -->


<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
<div id="footer">
	<div class="ie-fix">
		
	</div>
	<ul class="fw link-list">
		<li class="left">©2013 足迹</li>
		<li class="left">
			<a href="./index.php?r=backend/admin/login" target="_blank">管理中心</a>
		</li>
		<li class="left" style="margin-left: 20px;"><a href="http://weibo.com/qkyxmmxforcanyian930" style="color: rgb(238, 119, 119);" target="_blank"><img src="<?php echo IMG_URL; ?>weibo_sina_16.png" alt="我的微博" style="vertical-align: top;">&nbsp;关注我的微博</a>
		</li>
		<!-- <li class="left" style="margin-left: 40px;"><a target="_blank" href="http://sighttp.qq.com/authd?IDKEY=852c29a3a2ab63d43c6e69abe5a2aa0fa8f3937b3ebaa198"><img border="0"  src="http://wpa.qq.com/imgd?IDKEY=852c29a3a2ab63d43c6e69abe5a2aa0fa8f3937b3ebaa198&pic=50" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
		</li> -->
		<li>
			<a href="./index.php?r=index">回到首页</a>
		</li>
		<li>
			<a href="">关于足迹</a>
		</li>
		<li>
			<a href="">联系我</a>
		</li>
	</ul>
</div>
	
	<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->		
	
</div>
<script src="<?php echo JS_URL; ?>jquery-1.7.2.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo JS_URL; ?>jquery-1.7.2.min.js"><\/script>')</script>
<!--[if lt IE 9]>
	<script src="<?php echo JS_URL; ?>selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
<script src="<?php echo JS_URL; ?>custom.js"></script>
</body>
</html>