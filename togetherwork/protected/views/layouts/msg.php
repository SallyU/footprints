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

	<style type="text/css"> 
body{font-size:12px;}
.selectItemcont{padding:8px;}
#selectItem{background:#FFF;position:absolute;top:0px;left:center;border:1px solid #000;overflow:hidden;width:240px;z-index:1000;}
#selectItem2{background:#FFF;position:absolute;top:0px;left:center;border:1px solid #000;overflow:hidden;width:240px;z-index:1000;}
.selectItemtit{line-height:20px;height:20px;margin:1px;padding-left:12px;}
.bgc_ccc{background:#E88E22;}
.selectItemleft{float:left;margin:0px;padding:0px;font-size:12px;font-weight:bold;color:#fff;}
.selectItemright{float:right;cursor:pointer;color:#fff;}
.selectItemcls{clear:both;font-size:0px;height:0px;overflow:hidden;}
.selectItemhidden{display:none;}
</style> 
<script src="<?php echo JS_URL; ?>jquery-1.3.1.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo JS_URL; ?>jquery.bgiframe.js"></script>
<script>
 
jQuery.fn.selectFriend = function(targetId) {
    var _seft = this;
    var targetId = $(targetId);

    this.click(function(){
        var A_top = $(this).offset().top + $(this).outerHeight(true);  //  1
        var A_left =  $(this).offset().left;
        targetId.bgiframe();
        targetId.show().css({"position":"absolute","top":A_top+"px" ,"left":A_left+"px"});
    });

    targetId.find("#selectItemClose").click(function(){
        targetId.hide();
    });

    targetId.find("#selectSub :checkbox").click(function(){     
        targetId.find(":checkbox").attr("checked",false);
        $(this).attr("checked",true);   
        _seft.val( $(this).val() );
        targetId.hide();
    });

    $(document).click(function(event){
        if(event.target.id!=_seft.selector.substring(1)){
            targetId.hide();    
        }
    });

    targetId.click(function(e){
        e.stopPropagation(); //  2
    });

    return this;
}
 
$(function(){
    $("#Msg_touser").selectFriend("#selectItem");
});
 </script>
</head>
<body class="menu-1 h-style-1 text-1">

<div class="wrap">
	
	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	<header id="header" class="clearfix">
		
		<a href="./index.php?r=index/index" id="logo"><img src="<?php echo IMG_URL; ?>logo.png" alt="Car Dealer" /></a>
		
		<div class="widget-container widget_search">

			<!-- <form action="#" id="" method="get" /> -->
			<?php $form=$this->beginWidget('CActiveForm', array(
												'id'=>'searchform',
										        'enableAjaxValidation'=>false,//是否启用ajax验证
										    	'action'=>Yii::app()->createUrl('search/index'),//这里我把action重新指向
												)); ?>

				<p>
					<input name="keywords" type="text" placeholder="搜标签、用户名、会员ID、感觉" />
					<button type="submit" ></button>
				</p>
				<?php $this->endWidget(); ?>
			<!-- </form> --><!--/ #searchform-->

		</div><!--/ .widget-container-->		
		
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
<!--[if lt IE 9]>
	<script src="<?php echo JS_URL; ?>selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
</body>
</html>