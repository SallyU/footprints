<!-- - - - - - - - - - - - - - Top Panel - - - - - - - - - - - - - - - - -->	
	<script type="text/javascript">
	(function(a){a.fn.slide=function(b){return a.fn.slide.defaults={effect:"fade",autoPlay:!1,delayTime:500,interTime:2500,triggerTime:150,defaultIndex:0,titCell:".hd li",mainCell:".bd",targetCell:null,trigger:"mouseover",scroll:1,vis:1,titOnClassName:"on",autoPage:!1,prevCell:".prev",nextCell:".next",pageStateCell:".pageState",opp:!1,pnLoop:!0,easing:"linear",startFun:null,endFun:null,switchLoad:null},this.each(function(){var c=a.extend({},a.fn.slide.defaults,b),d=c.effect,e=a(c.prevCell,a(this)),f=a(c.nextCell,a(this)),g=a(c.pageStateCell,a(this)),h=a(c.titCell,a(this)),i=h.size(),j=a(c.mainCell,a(this)),k=j.children().size(),l=c.switchLoad;if(null!=c.targetCell)var m=a(c.targetCell,a(this));var n=parseInt(c.defaultIndex),o=parseInt(c.delayTime),p=parseInt(c.interTime);parseInt(c.triggerTime);var r=parseInt(c.scroll),s=parseInt(c.vis),t="false"==c.autoPlay||0==c.autoPlay?!1:!0,u="false"==c.opp||0==c.opp?!1:!0,v="false"==c.autoPage||0==c.autoPage?!1:!0,w="false"==c.pnLoop||0==c.pnLoop?!1:!0,x=0,y=0,z=0,A=0,B=c.easing,C=null,D=n;if(0==i&&(i=k),v){var E=k-s;i=1+parseInt(0!=E%r?E/r+1:E/r),0>=i&&(i=1),h.html("");for(var F=0;i>F;F++)h.append("<li>"+(F+1)+"</li>");var h=a("li",h)}if(j.children().each(function(){a(this).width()>z&&(z=a(this).width(),y=a(this).outerWidth(!0)),a(this).height()>A&&(A=a(this).height(),x=a(this).outerHeight(!0))}),k>=s)switch(d){case"fold":j.css({position:"relative",width:y,height:x}).children().css({position:"absolute",width:z,left:0,top:0,display:"none"});break;case"top":j.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; height:'+s*x+'px"></div>').css({position:"relative",padding:"0",margin:"0"}).children().css({height:A});break;case"left":j.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; width:'+s*y+'px"></div>').css({width:k*y,position:"relative",overflow:"hidden",padding:"0",margin:"0"}).children().css({"float":"left",width:z});break;case"leftLoop":case"leftMarquee":j.children().clone().appendTo(j).clone().prependTo(j),j.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; width:'+s*y+'px"></div>').css({width:3*k*y,position:"relative",overflow:"hidden",padding:"0",margin:"0",left:-k*y}).children().css({"float":"left",width:z});break;case"topLoop":case"topMarquee":j.children().clone().appendTo(j).clone().prependTo(j),j.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; height:'+s*x+'px"></div>').css({height:3*k*x,position:"relative",padding:"0",margin:"0",top:-k*x}).children().css({height:A})}var G=function(){a.isFunction(c.startFun)&&c.startFun(n,i)},H=function(){a.isFunction(c.endFun)&&c.endFun(n,i)},I=function(b){b.eq(n).find("img").each(function(){a(this).attr(l)!==void 0&&a(this).attr("src",a(this).attr(l)).removeAttr(l)})},J=function(a){if(D!=n||a||"leftMarquee"==d||"topMarquee"==d){switch(d){case"fade":case"fold":case"top":case"left":n>=i?n=0:0>n&&(n=i-1);break;case"leftMarquee":case"topMarquee":n>=1?n=1:0>=n&&(n=0);break;case"leftLoop":case"topLoop":var b=n-D;i>2&&b==-(i-1)&&(b=1),i>2&&b==i-1&&(b=-1);var p=Math.abs(b*r);n>=i?n=0:0>n&&(n=i-1)}if(G(),null!=l&&I(j.children()),m&&(null!=l&&I(m),m.hide().eq(n).animate({opacity:"show"},o,function(){j[0]||H()})),k>=s)switch(d){case"fade":j.children().stop(!0,!0).eq(n).animate({opacity:"show"},o,B,function(){H()}).siblings().hide();break;case"fold":j.children().stop(!0,!0).eq(n).animate({opacity:"show"},o,B,function(){H()}).siblings().animate({opacity:"hide"},o,B);break;case"top":j.stop(!0,!1).animate({top:-n*r*x},o,B,function(){H()});break;case"left":j.stop(!0,!1).animate({left:-n*r*y},o,B,function(){H()});break;case"leftLoop":0>b?j.stop(!0,!0).animate({left:-(k-p)*y},o,B,function(){for(var a=0;p>a;a++)j.children().last().prependTo(j);j.css("left",-k*y),H()}):j.stop(!0,!0).animate({left:-(k+p)*y},o,B,function(){for(var a=0;p>a;a++)j.children().first().appendTo(j);j.css("left",-k*y),H()});break;case"topLoop":0>b?j.stop(!0,!0).animate({top:-(k-p)*x},o,B,function(){for(var a=0;p>a;a++)j.children().last().prependTo(j);j.css("top",-k*x),H()}):j.stop(!0,!0).animate({top:-(k+p)*x},o,B,function(){for(var a=0;p>a;a++)j.children().first().appendTo(j);j.css("top",-k*x),H()});break;case"leftMarquee":var q=j.css("left").replace("px","");0==n?j.animate({left:++q},0,function(){if(j.css("left").replace("px","")>=0){for(var a=0;k>a;a++)j.children().last().prependTo(j);j.css("left",-k*y)}}):j.animate({left:--q},0,function(){if(2*-k*y>=j.css("left").replace("px","")){for(var a=0;k>a;a++)j.children().first().appendTo(j);j.css("left",-k*y)}});break;case"topMarquee":var t=j.css("top").replace("px","");0==n?j.animate({top:++t},0,function(){if(j.css("top").replace("px","")>=0){for(var a=0;k>a;a++)j.children().last().prependTo(j);j.css("top",-k*x)}}):j.animate({top:--t},0,function(){if(2*-k*x>=j.css("top").replace("px","")){for(var a=0;k>a;a++)j.children().first().appendTo(j);j.css("top",-k*x)}})}h.removeClass(c.titOnClassName).eq(n).addClass(c.titOnClassName),D=n,0==w&&(f.removeClass("nextStop"),e.removeClass("prevStop"),0==n?e.addClass("prevStop"):n==i-1&&f.addClass("nextStop")),g.html("<span>"+(n+1)+"</span>/"+i)}};J(!0),t&&("leftMarquee"==d||"topMarquee"==d?(u?n--:n++,C=setInterval(J,p),j.hover(function(){t&&clearInterval(C)},function(){t&&(clearInterval(C),C=setInterval(J,p))})):(C=setInterval(function(){u?n--:n++,J()},p),a(this).hover(function(){t&&clearInterval(C)},function(){t&&(clearInterval(C),C=setInterval(function(){u?n--:n++,J()},p))})));var K;"mouseover"==c.trigger?h.hover(function(){n=h.index(this),K=window.setTimeout(J,c.triggerTime)},function(){clearTimeout(K)}):h.click(function(){n=h.index(this),J()}),f.click(function(){(1==w||n!=i-1)&&(n++,J())}),e.click(function(){(1==w||0!=n)&&(n--,J())})})}})(jQuery),jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(a,b,c,d,e){return jQuery.easing[jQuery.easing.def](a,b,c,d,e)},easeInQuad:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},easeInOutQuad:function(a,b,c,d,e){return 1>(b/=e/2)?d/2*b*b+c:-d/2*(--b*(b-2)-1)+c},easeInCubic:function(a,b,c,d,e){return d*(b/=e)*b*b+c},easeOutCubic:function(a,b,c,d,e){return d*((b=b/e-1)*b*b+1)+c},easeInOutCubic:function(a,b,c,d,e){return 1>(b/=e/2)?d/2*b*b*b+c:d/2*((b-=2)*b*b+2)+c},easeInQuart:function(a,b,c,d,e){return d*(b/=e)*b*b*b+c},easeOutQuart:function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c},easeInOutQuart:function(a,b,c,d,e){return 1>(b/=e/2)?d/2*b*b*b*b+c:-d/2*((b-=2)*b*b*b-2)+c},easeInQuint:function(a,b,c,d,e){return d*(b/=e)*b*b*b*b+c},easeOutQuint:function(a,b,c,d,e){return d*((b=b/e-1)*b*b*b*b+1)+c},easeInOutQuint:function(a,b,c,d,e){return 1>(b/=e/2)?d/2*b*b*b*b*b+c:d/2*((b-=2)*b*b*b*b+2)+c},easeInSine:function(a,b,c,d,e){return-d*Math.cos(b/e*(Math.PI/2))+d+c},easeOutSine:function(a,b,c,d,e){return d*Math.sin(b/e*(Math.PI/2))+c},easeInOutSine:function(a,b,c,d,e){return-d/2*(Math.cos(Math.PI*b/e)-1)+c},easeInExpo:function(a,b,c,d,e){return 0==b?c:d*Math.pow(2,10*(b/e-1))+c},easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},easeInOutExpo:function(a,b,c,d,e){return 0==b?c:b==e?c+d:1>(b/=e/2)?d/2*Math.pow(2,10*(b-1))+c:d/2*(-Math.pow(2,-10*--b)+2)+c},easeInCirc:function(a,b,c,d,e){return-d*(Math.sqrt(1-(b/=e)*b)-1)+c},easeOutCirc:function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},easeInOutCirc:function(a,b,c,d,e){return 1>(b/=e/2)?-d/2*(Math.sqrt(1-b*b)-1)+c:d/2*(Math.sqrt(1-(b-=2)*b)+1)+c},easeInElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(1==(b/=e))return c+d;if(g||(g=.3*e),Math.abs(d)>h){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},easeOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(1==(b/=e))return c+d;if(g||(g=.3*e),Math.abs(d)>h){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(2==(b/=e/2))return c+d;if(g||(g=e*.3*1.5),Math.abs(d)>h){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return 1>b?-.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c:.5*h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInBack:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),d*(b/=e)*b*((f+1)*b-f)+c},easeOutBack:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),d*((b=b/e-1)*b*((f+1)*b+f)+1)+c},easeInOutBack:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),1>(b/=e/2)?d/2*b*b*(((f*=1.525)+1)*b-f)+c:d/2*((b-=2)*b*(((f*=1.525)+1)*b+f)+2)+c},easeInBounce:function(a,b,c,d,e){return d-jQuery.easing.easeOutBounce(a,e-b,0,d,e)+c},easeOutBounce:function(a,b,c,d,e){return 1/2.75>(b/=e)?d*7.5625*b*b+c:2/2.75>b?d*(7.5625*(b-=1.5/2.75)*b+.75)+c:2.5/2.75>b?d*(7.5625*(b-=2.25/2.75)*b+.9375)+c:d*(7.5625*(b-=2.625/2.75)*b+.984375)+c},easeInOutBounce:function(a,b,c,d,e){return e/2>b?.5*jQuery.easing.easeInBounce(a,2*b,0,d,e)+c:.5*jQuery.easing.easeOutBounce(a,2*b-e,0,d,e)+.5*d+c}});
	
	
	</script>
	
	
    
	
	<div class="top-panel clearfix">
	<img style="float:left" src="<?php echo IMG_URL; ?>title.png" />
	
	<!-- - - - - - - - - - - - - - 幻灯片 轮播组 - - - - - - - - - - - - - - - - -->
	
	<div class="m-slide">
	<ul class="img" style="position: relative; width: 490px; height: 200px;">
		<?php foreach ($ppt as $_v) { ?>
		<li style="position: absolute; width: 490px; left: 0px; top: 0px; display: list-item;">
		<a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>" target="_blank"><img src="<?php echo $_v->img; ?>"></a></li>
		<?php }?>
	</ul>
	<ul class="tab">
		<?php foreach ($ppt as $_v) {?>
		<li class="  on"><a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>" target="_blank"><b></b>
		<span class="title"><?php echo $_v->title; ?></span><span class="des"><?php echo $_v->keywords; ?></span></a>
		</li>
		<?php }?>
	</ul>
	<b class="bottom-shadow"></b></div>
<script type="text/javascript">jQuery(".m-slide").slide({ titCell:".tab li", mainCell:".img",effect:"fold", autoPlay:true});</script>
		<!-- - - - - - - - - - - 轮播结束 - - - - - - - - - - - - - -->
		
		<!-- - - - - - - - - - - 每日一句开始 - - - - - - - - - - - - - -->
		
		<div class="widget_custom_search" style="font-size:16px;background-color: #F0FCFF;
border: 1px solid #DBECFC;
display: block;
padding: 6px;">
			
			<h3 class="widget-title"><span style="color: #FE5214">每日一句</span></h3>

			<span style="font-size:16px;"><p><?php $this->renderPartial('_quote', array('quote' => $quote,))?></p></span>
			
		</div>
		
		<!-- - - - - - - - - - 每日一句结束 - - - - - - - - - - - - -->
		<!-- - - - - - - - - - 图片专辑导航开始 - - - - - - - - - - - - -->
	</div>
<script type="text/javascript">
function $(id){return document.getElementById(id)};
</script>

    <div id="Box" class="page-cat" style="background: rgba(0,0,0,0.5);margin-top:-19px;">
        <ul id="Content">
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>7)); ?>" target="_blank" title="查看更多唯美图片"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/wm.jpg"></a><div class="tp_t">唯美图片</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>4)); ?>" target="_blank" title="查看更多坐看喧嚣"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/zkxx.jpg"></a><div class="tp_t">坐看喧嚣</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>9)); ?>" target="_blank" title="更多小清新图图"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/xqx.jpg"></a><div class="tp_t">小清新图</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>10)); ?>" target="_blank" title="更多美丽图"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/mbss.jpg"></a><div class="tp_t">美不胜收</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>1)); ?>" target="_blank" title="找找共鸣？"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/xlxz.jpg"></a><div class="tp_t">心灵写照</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>3)); ?>" target="_blank" title="更多感性"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/gxsf.jpg"></a><div class="tp_t">感性释放</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>2)); ?>" target="_blank" title="美好人生不止这些"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/mhrs.jpg"></a><div class="tp_t">美好人生</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>8)); ?>" target="_blank" title="八卦下"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/mx.jpg"></a><div class="tp_t">明星图片</div></li>
                <li><a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>11)); ?>" target="_blank" title="可爱无界限"><img style="width:100px;height:100px;border: 0px;" src="<?php echo IMG_URL; ?>albumcover/keai.jpg"></a><div class="tp_t">可爱图片</div></li>
        </ul>
    </div>
<script type="text/javascript">
new Marquee(
{
    MSClass   : ["Box","Content"],
    Direction : 2,
    Step      : 1,
    Width     : 1020,
    Height    : 104,
    Timer     : 20,
    DelayTime : 0,
    WaitTime  : 0,
    ScrollStep: 110,
    SwitchType: 0,//注释掉上面几行表示连续
    AutoStart : true
});
</script>

	
	<!-- - - - - - - - - - - - - 首页第一栏结束 - - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - 首页中下部分开始 - - - - - - - - - - - - - - - -->
	
	<div class="index-main clearfix">

		<!-- - - - - - - - - - - - - - - 左半边开始 - - - - - - - - - - - - - - - - -->	
		<div class="index-article">
                <div class="index-feeling" style="padding-left:5px;">
                    <h3>感觉●发现<b>（<a href="./index.php?r=article" target="_blank">更多</a>）</b></h3>
                    <ul class="clearfix">
                    	<?php foreach ($sixiang as $v) {?>
                    	<li>
                            <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$v->id)); ?>" title="<?php echo $v->title;?>">
                                <img src="<?php echo $v->img; ?>" class="img">
                            </a>
                            <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$v->id)); ?>" class="title" title="<?php echo $v->title;?>" alt="<?php echo $v->title;?>"><?php echo $v->title;?></a>
                            <div title="<?php echo $v->des;?>" alt="<?php echo $v->des;?>" class="text">文/<?php echo $v->users->nickname;?>&nbsp;&nbsp;<?php echo $v->des;?></div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <!-- 感觉结束 -->

                <div class="index-app">
                    <h3>得瑟小丫丫</h3>
                    <div class="index-group-topic" style="padding-left:5px;">
                        <ul>
                        	<?php foreach ($jiaoya as $_v) {?>
                        	<li>
                                <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->id)); ?>" title="<?php echo $_v->nickname; ?>">
                                    <img src="<?php echo $_v->photo; ?>" class="img">
                                </a>
                                <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->id)); ?>"><?php echo $_v->nickname; ?></a><br><?php echo $_v->introduce; ?>
                            </li>
                            <?php }?>
                                                  
                        </ul>
                    </div>
                    <!-- 得瑟小脚丫结束 -->
                    <div class="index-book">
                        <h3>标签推荐：<b><!-- （<a href="">更多</a>） --></b></h3>
                        美图标签：
                        <?php foreach ($pictag as $_pic) {?>
                        <a href="" class="tags"><?php echo $_pic->cate_name; ?></a>
                        <?php }?><br /><br />
                        感觉标签：
                        <?php foreach ($articletag as $_a) {?>
                        <a href="" class="tags"><?php echo $_a->type_name; ?></a>
                        <?php }?>
                    </div>
                </div>



                <!--<div class="index-group">
                    <h3>小集体<b>（<a href="http://www.myjy.com/group/">更多</a>）</b></h3>
                    <div class="index-group-topic">
                        <ul>
                                                        <li><a href="http://www.myjy.com/group/info174/" title="梦境左岸">
                                    <img src="http://www.myjy.com/upload/group/20130504/20130504111534104_s.jpg" alt="梦境左岸" title="梦境左岸" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info174/">梦境左岸</a> (1成员)<br>
                                每个人心中都有一条塞纳河，它把我们的一颗心分做两边，
									左岸柔软，右岸 冷硬；
									左岸感性，右岸理性
									左岸是梦境，右岸是生活……
									飘香的梦境写着哀伤写着期盼，更有一望无际的极致想象
									新来的你，请告诉我你为什么喜欢左岸
                            </li>
                                                        <li><a href="http://www.myjy.com/group/info203/" title="叽里咕噜啰嗦梦境">
                                    <img src="http://www.myjy.com/upload/group/20130802/20130802221553100_s.jpg" alt="叽里咕噜啰嗦梦境" title="叽里咕噜啰嗦梦境" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info203/">叽里咕噜啰嗦梦境</a> (1成员)<br>
                                这片梦境无肉无酒，但我有七分江湖豪气三分江湖柔情保你能痛快说完，保你能痛快骂完
                            </li>
                                                        <li><a href="http://www.myjy.com/group/info202/" title="丢掉理智与文字会死星">
                                    <img src="http://www.myjy.com/upload/group/20130801/20130801221627174_s.jpg" alt="丢掉理智与文字会死星" title="丢掉理智与文字会死星" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info202/">丢掉理智与文字会死星</a> (1成员)<br>
                                请打着伞走进这几天的阴雨绵绵
                            </li>
                                                        <li><a href="http://www.myjy.com/group/info217/" title="印记">
                                    <img src="http://www.myjy.com/upload/group/20131011/20131011193217111_s.jpg" alt="印记" title="印记" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info217/">印记</a> (1成员)<br>
                                如果可以，你说，我听。这里有我，有印记，有梦的声音。
                            </li>
                                                        <li><a href="http://www.myjy.com/group/info220/" title="告诉未来，现在的自己">
                                    <img src="http://www.myjy.com/upload/group/20131104/20131104174248116_s.jpg" alt="告诉未来，现在的自己" title="告诉未来，现在的自己" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info220/">告诉未来，现在的自己</a> (2成员)<br>
                                
									未来的你，是否会怀念现在的你。

									未来的你，是否会懂得曾经的我。

									未来的你，是否会记得此时的我们。


                            </li>
                                                    </ul>
                    </div>
                    <div class="index-group-top">
                        <ul>
                                                        <li><a href="http://www.myjy.com/group/info32/" title="旅行和旅行者">
                                    <img src="http://www.myjy.com/upload/group/20130318/20130318004228137_s.jpg" alt="旅行和旅行者" title="旅行和旅行者" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info32/">旅行和旅行者</a> (1677成员)<br>
                                对未知的恐惧，对舒适的留恋将阻止我们成为一个旅行者走上的冒险旅程。可是，当你作出这样的选择，你就永远不会后悔。
                         ——《我们为什么要旅行》

						背包客、穷游客、沙发客、沙发主、在路上的旅行者和即将开始旅行的人们的故事。



                            </li>
                                                        <li><a href="http://www.myjy.com/group/info33/" title="复古老清新。">
                                    <img src="http://www.myjy.com/upload/group/20130917/20130917191259137_s.jpg" alt="复古老清新。" title="复古老清新。" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info33/">复古老清新。</a> (11成员)<br>
                                你举着一枝花，等着有人带你去流浪。

                            </li>
                                                        <li><a href="http://www.myjy.com/group/info36/" title="黄昏之后°">
                                    <img src="http://www.myjy.com/upload/group/20121123/20121123125021118_s.jpg" alt="黄昏之后°" title="黄昏之后°" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info36/">黄昏之后°</a> (14成员)<br>
                                你有很多小情绪吗？那么，来这里吧。我们愿为你分享一切。欢心，快乐，伤感，哭泣，愤怒。相信我们会是你最忠实的听众。每一种心情都是人们心中一个音符。我们愿为你，敲响他们。黄昏之后，我们等你。
                            </li>
                                                        <li><a href="http://www.myjy.com/group/info53/" title="生命中的那些小感动">
                                    <img src="http://www.myjy.com/upload/group/20121124/20121124230523150_s.jpg" alt="生命中的那些小感动" title="生命中的那些小感动" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info53/">生命中的那些小感动</a> (1537成员)<br>
                                记录我们的生活，其实它很精彩，反省生命中的那些小感动。
                            </li>
                                                        <li><a href="http://www.myjy.com/group/info25/" title="脚印家塾">
                                    <img src="http://www.myjy.com/upload/group/20121122/20121122194830113.png" alt="脚印家塾" title="脚印家塾" class="img">
                                </a>
                                <a href="http://www.myjy.com/group/info25/">脚印家塾</a> (32成员)<br>
                                小集体专为新注册的脚印用户而设，是为方便大家快速了解脚印社区而设。在脚印遇见的任何问题与困惑，都可在这提出，确保每一个问题得到解释与答复。 
                            </li>
                                                    </ul>
                    </div>
                </div>-->
                <!-- 小集体结束 -->
                
            </div>

 		<!-- - - - - - - - - - - - - - - 左半边结束 - - - - - - - - - - - - - - - - -->	


 		<!-- - - - - - - - - - - - - - - 右半边开始 - - - - - - - - - - - - - - - - -->	

		<div class="index-aside">
        <div class="index-thinking">
            <script src='<?php echo JS_URL; ?>cloud.js' type="text/javascript"></script>
            <link href="<?php echo CSS_URL; ?>cloud.css" rel="stylesheet" type="text/css"   />
                    <h3>&nbsp;&nbsp;&nbsp;标签云</h3>
                    <div id="tagscloud" style="border-top: solid 3px #f9f9f9;">
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>1)); ?>" class="tagc1">个人心情</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>2)); ?>" class="tagc2">生活随笔</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>3)); ?>" class="tagc5">内心力量</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>4)); ?>" class="tagc2">美好人生<a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>5)); ?>" class="tagc2" >感性释放</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>6)); ?>" class="tagc1" >坐看喧嚣</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>7)); ?>" class="tagc2">校园时光</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'敏感')); ?>" class="tagc5">敏感</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'旅行爱好者')); ?>" class="tagc2">旅行爱好者</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'阳光')); ?>" class="tagc2">阳光</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'感性')); ?>" class="tagc5">感性</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>1)); ?>" class="tagc1">个人心情</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>2)); ?>" class="tagc2">生活随笔</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>3)); ?>" class="tagc5">内心力量</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>4)); ?>" class="tagc2">美好人生<a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>5)); ?>" class="tagc2" >感性释放</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>6)); ?>" class="tagc1" >坐看喧嚣</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>7)); ?>" class="tagc2">校园时光</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'敏感')); ?>" class="tagc5">敏感</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'旅行爱好者')); ?>" class="tagc2">旅行爱好者</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'阳光')); ?>" class="tagc2">阳光</a>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>'感性')); ?>" class="tagc5">感性</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>1)); ?>" class="tagc1">个人心情</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>2)); ?>" class="tagc2">生活随笔</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>3)); ?>" class="tagc5">内心力量</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>4)); ?>" class="tagc2">美好人生<a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>5)); ?>" class="tagc2" >感性释放</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>6)); ?>" class="tagc1" >坐看喧嚣</a>
                        <a href="<?php echo Yii::app()->createUrl('article/type',array('id'=>7)); ?>" class="tagc2">校园时光</a>
                    </div>
                    <h3>微语<b>（<a href="./index.php?r=weiyu" target="_blank">更多</a>）</b></h3>
                    <ul><marquee direction="up" height="150px" scrollamount="1" onmouseover="this.stop();" onmouseout="this.start();">
                    	<?php foreach ($wei as $_v){ ?>
                    	<li>
                    		<a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->userid->id)); ?>" title="<?php echo $_v->userid->nickname; ?>">
                    			<img class="img" alt="<?php echo $_v->userid->nickname; ?>" src="<?php echo $_v->userid->photo; ?>"></a>
                    			<a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->userid->id)); ?>"><?php echo $_v->userid->nickname; ?>：</a><?php echo $_v->weiyu_content;?>
                    			<br>
                    			<p class="font-gray"><a href="">
                    		<?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日 H:m',$_v->create_time);//时间戳转化date() ?></a>
                    				<a href="">
                    				<span>5</span>评论</a></p>
                    	</li>
                    	<?php }?></marquee>
                    </ul>
                </div>
                <!-- 微语结束 -->
                <div class="index-movie">
                    <h3>最新美图<b>（<a href="<?php echo Yii::app()->createUrl('album'); ?>">更多</a>）</b></h3>
                    <ul>
                    <?php foreach ($likepic as $_p) {?>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('album/view',array('id'=>$_p->id)); ?>" title="<?php echo $_p->name; ?>">
                                <img src="<?php echo $_p->album_img; ?>" alt="<?php echo $_p->name; ?>" title="<?php echo $_p->name; ?>" class="img">
                            </a>
                            <a href="<?php echo Yii::app()->createUrl('album/view',array('id'=>$_p->id)); ?>"><?php echo $_p->name; ?></a>
                        </li>
                        <?php } ?>
                                                <!-- <li>
                            <a href="http://www.myjy.com/app/movie/info564/" title="八月圣诞节 8月のクリスマス (2005)">
                                <img src="http://www.myjy.com/upload/movie/20130320/20130320113530133_s.jpg" alt="八月圣诞节 8月のクリスマス (2005)" title="八月圣诞节 8月のクリスマス (2005)" class="img">
                            </a>
                            <a href="http://www.myjy.com/app/movie/info564/">八月圣诞节 8月のクリスマス (2005)</a>
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/movie/info568/" title="葬礼上的死亡 Death at a Funeral (200">
                                <img src="http://www.myjy.com/upload/movie/20130321/20130321140847155_s.jpg" alt="葬礼上的死亡 Death at a Funeral (200" title="葬礼上的死亡 Death at a Funeral (200" class="img">
                            </a>
                            <a href="http://www.myjy.com/app/movie/info568/">葬礼上的死亡 Death at a Funeral (200</a>
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/movie/info573/" title="星尘 Stardust (2007)">
                                <img src="http://www.myjy.com/upload/movie/20130321/20130321143751196_s.jpg" alt="星尘 Stardust (2007)" title="星尘 Stardust (2007)" class="img">
                            </a>
                            <a href="http://www.myjy.com/app/movie/info573/">星尘 Stardust (2007)</a>
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/movie/info574/" title="奇幻精灵事件簿 The Spiderwick Chronic">
                                <img src="http://www.myjy.com/upload/movie/20130321/20130321144015100_s.jpg" alt="奇幻精灵事件簿 The Spiderwick Chronic" title="奇幻精灵事件簿 The Spiderwick Chronic" class="img">
                            </a>
                            <a href="http://www.myjy.com/app/movie/info574/">奇幻精灵事件簿 The Spiderwick Chronic</a>
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/movie/info579/" title="初三大四我爱你 (2009)">
                                <img src="http://www.myjy.com/upload/movie/20130322/20130322144916101_s.jpg" alt="初三大四我爱你 (2009)" title="初三大四我爱你 (2009)" class="img">
                            </a>
                            <a href="http://www.myjy.com/app/movie/info579/">初三大四我爱你 (2009)</a>
                        </li> -->
                                            </ul>
                </div>
                <!-- 电影结束 -->
                <!-- <div class="index-music">
                    <h3>音乐<b>（<a href="http://www.myjy.com/app/music/">更多</a>）</b></h3>
                    <ul>
                                                <li>
                            <a href="http://www.myjy.com/app/music/info1365/"><img src="http://www.myjy.com/upload/music/20131102/20131102080736139_s.jpg" alt="" class="img"></a>
                            <a href="http://www.myjy.com/app/music/info1365/">Over You</a> <br>
                            <a href="http://www.myjy.com/app/music/?singer_id=757">Jay Nash</a> / 英语 / 乡村 Country Music
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/music/info1371/"><img src="http://www.myjy.com/upload/music/20131103/20131103224749130_s.jpg" alt="" class="img"></a>
                            <a href="http://www.myjy.com/app/music/info1371/">晚安晚安</a> <br>
                            <a href="http://www.myjy.com/app/music/?singer_id=195">魏如萱</a> / 国语 / 流行音乐
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/music/info1372/"><img src="http://www.myjy.com/upload/music/20131105/20131105160316178_s.jpg" alt="" class="img"></a>
                            <a href="http://www.myjy.com/app/music/info1372/">Hello Seattle</a> <br>
                            <a href="http://www.myjy.com/app/music/?singer_id=228">Owl City</a> / 英语 / 流行音乐
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/music/info1377/"><img src="http://www.myjy.com/upload/music/20131108/20131108145450195_s.jpg" alt="" class="img"></a>
                            <a href="http://www.myjy.com/app/music/info1377/">Young For You </a> <br>
                            <a href="http://www.myjy.com/app/music/?singer_id=325">GALA</a> / 英语 / 流行音乐
                        </li>
                                                <li>
                            <a href="http://www.myjy.com/app/music/info1378/"><img src="http://www.myjy.com/upload/music/20131111/20131111121608113_s.jpg" alt="" class="img"></a>
                            <a href="http://www.myjy.com/app/music/info1378/">德国下雪了</a> <br>
                            <a href="http://www.myjy.com/app/music/?singer_id=763">许哲佩</a> / 国语 / 流行音乐
                        </li>
                                            </ul>
                </div> -->
                <!-- 音乐结束 -->
            </div>

			
		
	</div><!--/ .main-->