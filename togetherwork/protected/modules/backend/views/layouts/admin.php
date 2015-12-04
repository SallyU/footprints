<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>足迹后台管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<link href="<?php echo BACKEND_CSS_URL; ?>style.css" rel="stylesheet" type="text/css">

</head>
<body class="body_bg" screen_capture_injected="true">
<div style="margin: 0 auto;
width: 1200px;">
<div class="head">
	<ul class="uinfo">
    	<li class="uout"><a href="./index.php?r=backend/admin/logout" onclick="return confirm('确认要退出?');" class="u">退出</a></li>
    	<!-- <li class="ublog"><a href="" class="u">个人</a></li> -->
    	<li class="uback"><a href="<?php echo Yii::app()->homeUrl; ?>" class="u" target="_blank">返回足迹首页</a></li>
    </ul>
	<div class="logo"><a href="<?php echo Yii::app()->createUrl('backend/index/index'); ?>" title="足迹" class="white">足迹</a>&nbsp;&nbsp;<span><a href="<?php echo Yii::app()->createUrl('backend/index/index'); ?>" class="white">后台管理中心</a></span></div>
</div>
<div class="cpmain">
	<div class="left">
    	<ul id="navlist">
        	<!-- <li class="on"> --><li><a href="<?php echo Yii::app()->createUrl('backend/index/index'); ?>"><span class="home"></span>后台首页</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('backend/user/index'); ?>"><span class="py"></span>用户管理</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('backend/article/index'); ?>"><span class="fabu"></span>内容管理</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('backend/create/index'); ?>"><span class="edit"></span>发布内容</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('backend/msg/index'); ?>"><span class="msg"></span>站内信息</a></li>
            <li><a href=""><span class="space"></span>标签设置</a></li>
            <li><a href=""><span class="buybak"></span>评论管理</a></li>
            <li><a href=""><span class="listdd"></span>留言管理</a></li>
        	<!-- <li><a href=""><span class="member"></span>帐号状态</a></li> -->
        	
        	<!-- <li><a href=""><span class="news"></span>修改资料</a></li> -->
            <!-- <li><a href=""><span class="fav"></span>我的收藏</a></li> -->
        	
        	<!-- <li><a href=""><span class="buymony"></span>在线充值</a></li>
        	<li><a href=""><span class="car"></span>我的购物车</a></li> -->
        	
        	<!-- <li><a href=""><span class="tg"></span>我的推广</a></li> -->
        </ul>
    </div>



    <?php echo $content; ?>


<div class="clear"></div>
</div>
</div>
<div class="footer">
    <div class="w960">


        <div class="copyright">
            <p>版权所有：<a href="<?php echo Yii::app()->homeUrl; ?>" target="_blank" style="color: rgb(255, 255, 255);">足迹</a></p>
            
        </div>
    </div> 
</div>

</body></html>