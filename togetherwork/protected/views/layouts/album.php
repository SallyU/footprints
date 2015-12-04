<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>足迹相册</title>
<link rel='stylesheet' href='<?php echo CSS_URL; ?>album.css' media='screen' />
<script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo JS_URL; ?>html5.js"></script>
<![endif]-->
<script src="<?php echo JS_URL; ?>blocksit.min.js"></script>
<script>
$(document).ready(function() {
	//vendor script
	$('#header')
	.css({ 'top':-50 })
	.delay(1000)
	.animate({'top': 0}, 800);
	
	$('#footer')
	.css({ 'bottom':-15 })
	.delay(1000)
	.animate({'bottom': 0}, 800);
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 5,
			offsetX: 8,
			offsetY: 8
		});
	});
	
	//window resize
	var currentWidth = 1100;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = 4;
		} else {
			conWidth = 1100;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
                var topMain=$("#header").height()+20//是头部的高度加头部与nav导航之间的距离。
                var topWrapper=$(".topWrapper");
                $(window).scroll(function(){
                    if ($(window).scrollTop()>topMain){//如果滚动条顶部的距离大于topMain则就nav导航就添加类.nav_scroll，否则就移除。
                        topWrapper.addClass("topWrapper_scroll");
                    }
                    else
                    {
                        topWrapper.removeClass("topWrapper_scroll");
                    }
                });
     
        })
</script>
</head>




<body>

<div class="topWrapper" id="header">
	<div class="topHeader">
    	<a href="" class="topLogo"><h2>足迹相册</h2></a>
        <div class="topNav">
			<a href="./index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;首页</a>
			<a href="./index.php?r=article">感觉</a>
			<a href="./index.php?r=weiyu">微语</a>
			<a href="./index.php?r=album" class="selected">美图</a>
			<a href="./index.php?r=quiet" target="_blank">静 · 一个人</a>
			</div>
        <div class="topHeadeRight">
        	<?php
				if(Yii::app()->user->getIsGuest()){?>
			<a href="./index.php?r=user/login">登录</a>|<a href="./index.php?r=user/register">注册</a>
			<?php } else {?> 
			<span>欢迎您：</span><a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>"><?php echo Yii::app()->user->nickname; ?></a>|<a href="./index.php?r=user/logout" onclick="if (confirm('慢走，如果累了，记得这里有那份宁静！^_^ ~')) return true; else return false;"><span style="color:#ff6699">退出</span></a>
			<?php }?>
        </div>
    </div>
</div>


<?php echo $content; ?>


<div style="display:none;" id="gotopbtn" class="to_top"><a title="返回顶部" href="javascript:void(0);"></a></div>
                    

<script type="text/javascript">
$(function(){

    $(window).scroll(function(){
        $(window).scrollTop()>400 ? $("#gotopbtn").css('display','').click(function(){
            $(window).scrollTop(0);
        }):$("#gotopbtn").css('display','none');    
    });
    
});
</script>


</body>
</html>