<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<!-- <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css' /> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<title>足迹，走过的每一步</title>
	
	<meta name="description" content="" />
	<meta name="author" content="" />
	
	<link rel="shortcut" href="<?php echo IMG_URL; ?>favicon.ico" />
	<link rel="stylesheet" href="<?php echo CSS_URL; ?>style1.css" media="screen" />
	<link rel="stylesheet" href="<?php echo CSS_URL; ?>skeleton.css" media="screen" />
	
	<script src="<?php echo JS_URL; ?>MSClass.js" type="text/javascript"></script>

	<script type="text/javascript" src="<?php echo JS_URL; ?>jquery-1.7.2.js"></script>

	<!-- HTML5 Shiv + detect touch events -->
	<script type="text/javascript" src="<?php echo JS_URL; ?>modernizr.custom.js"></script>


<style type="text/css">

/*登录注册特别设计*/

.user-info.unlogged {
  height: 29px;
  margin: 10px 10px 10px 0;
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

<div class="wrap">
	
	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	<header id="header" class="clearfix">
		
		<a href="./index.php?r=index/index" id="logo"><img src="<?php echo IMG_URL; ?>logo.png" alt="Car Dealer" /></a>
		
		<div class="widget-container widget_search">

			<?php $form=$this->beginWidget('CActiveForm', array(
											'htmlOptions'=>array('onsubmit'=>'return check()','name'=>'yuan'),
												'id'=>'searchform',
										        'enableAjaxValidation'=>false,//是否启用ajax验证
										    	'action'=>Yii::app()->createUrl('search/index'),//这里我把action重新指向
												)); ?>

				<p>
					<input name="keywords" type="text" placeholder="搜标签、用户名、会员ID、感觉" />
					<button type="submit" ></button>
				</p>
<script LANGUAGE="javascript">
<!--
function check()
{
if(document.yuan.keywords.value.length==0){
     alert("关键字不能为空！");
     document.yuan.keywords.focus();
     return false;
    }

 }
//-->
</script> 		


				<?php $this->endWidget(); ?>

		</div><!--/ .widget-container-->		
		<!-- <div id="templatemo_search">
            <form action="#" method="get">
              <input type="text" placeholder="搜索" name="keyword" id="keyword" title="关键字" class="txt_field">
              <input type="submit" name="Search" value="" alt="Search" title="搜索" class="sub_btn">
            </form>
        </div> -->
		<nav id="navigation" class="navigation">
			
			<ul>
				<li><a href="./index.php">首页</a></li>
				<li><a href="./index.php?r=article/index">感觉</a>
				<!-- 	<ul>
						<li><a href="">具体</a></li>
						<li><a href="#">A</a>
							<ul>
								<li><a href="">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
							</ul>
						</li>
						<li><a href="#">B</a></li>
						<li><a href="#">C</a></li>
					</ul>
 -->				</li>
				<li><a href="./index.php?r=weiyu">微语</a></li>
	
				<li><a href="./index.php?r=album">美图</a></li>
					<!-- <ul>
						<li><a href="">A</a></li>
						<li><a href="">B</a></li>
						<li><a href="">Images and Floats</a></li>
						<li><a href="">Pricing Tables</a></li>
						<li><a href="">Typography</a></li>
						<li><a href="">FAQ Toggle</a></li>
						<li><a href="">Column Layout</a></li>
					</ul> -->
				
				<li><a href="./index.php?r=quiet/index" target="_blank">静&nbsp;·&nbsp;一个人</a></li>


				<!-- 判断用户是否登录 -->
				<?php
				//在user组件里有个方法，getIsGuest(),判断是否是游客
				if(Yii::app()->user->getIsGuest()){?>
				<div class="user-info unlogged">
				<a class="user-btn signup" href="<?php echo Yii::app()->createUrl('user/register'); ?>">注册</a>
				<a class="user-btn login J_BtnLogin" href="<?php echo Yii::app()->createUrl('user/login'); ?>">登录</a>
				</div>
				
				<?php } else {?>

				<li class="right">
				<a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>"><span class="username"><?php echo Yii::app()->user->nickname;?>&nbsp;&nbsp;∨</span></a>
				<ul style="width:120px">
					<li><a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>"><img height="35" width="35" class="fl" title="<?php echo Yii::app()->user->nickname;?>" alt="<?php echo Yii::app()->user->nickname;?>" src="<?php echo Yii::app()->user->photo;?>"><p style="line-height: 22px;padding-top:5px">我的足迹</p></a></li>
					<li><a href="<?php echo Yii::app()->createUrl('user/myprofile'); ?>">基本信息</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('user/edit_password'); ?>">修改密码</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('usertags/usertags'); ?>">个性标签</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('msg/inbox'); ?>">查看消息</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('user/logout'); ?>" onclick="if (confirm('慢走，如果累了，记得这里有那份宁静！^_^ ~')) return true; else return false;">退出</a></li>
				</ul>
				</li>
				<?php }?>
			</ul>
			
		</nav><!--/ #navigation-->
		
	</header><!--/ #header-->
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	


<!--$content不包含头部、脚步等重复代码区-->
<!--普通模板内容-->
<?php echo $content; ?>



<!-- 页脚部分 -->


<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
<div id="templatemo_footer">
    	<div class="col_4">
        	<h5>页面</h5>
            <ul class="footer_list">
            	<li><a href="">首页</a></li>
                <li><a href="">关于我们</a></li>
                <li><a href="">联系我们</a></li>
			</ul>
        </div>
        <div class="col_4">
        	<h5>本程序采用</h5>
            <ul class="footer_list">
                <li><a href="">CSS(2.0 + 3.0)</a></li>
            	<li><a href="">部分HTML5</a></li>
                <li><a href="">PHP+JS+Yii+Mysql</a></li>
			</ul>             
        </div>
        <div class="col_4">
        	<h5>我的社交网站</h5><br />
            <ul class="twitter_post">
	            <li><a href="http://hi.baidu.com/canyian">百度空间</a></li><br />
                <!-- <li>宁波工程学院<a href="http://nbut.cn">http://nbut.cn</a></li> -->
			</ul>
        </div>
        <div class="col_4 col_l">
        	<h5>关注我</h5>
            <p><a href="" target="_parent">微博：</a></p>
            | <a href="http://weibo.com/qkyxmmxforcanyian930" style="color: rgb(238, 119, 119);" target="_blank"><img src="<?php echo IMG_URL; ?>weibo_sina_16.png" alt="我的微博" style="vertical-align: top;">&nbsp;关注我的微博</a> 
		</div>
        <div class="cleaner"></div>
    </div>
	
	<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->		
</div>

<div id="templatemo_cr_bar_wrapper">
	<div id="templatemo_cr_bar">
    	Copyright © 2013 足迹  (<a href="./index.php?r=backend/admin/login" target="_blank">管理中心</a>)| By <a href="" target="_parent">渠开源(Canyian Qu)</a>
    </div>
</div>

<script src="<?php echo JS_URL; ?>jquery-1.7.2.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo JS_URL; ?>jquery-1.7.2.min.js"><\/script>')</script>
<!--[if lt IE 9]>
	<script src="<?php echo JS_URL; ?>selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
<script src="<?php echo JS_URL; ?>custom.js"></script>
</body>
</html>