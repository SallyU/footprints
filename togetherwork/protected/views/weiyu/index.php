<div class="main clearfix">
            <!--左边left 开始-->
            <!-- 判断用户是否登录 -->
        <?php
        //在user组件里有个方法，getIsGuest(),判断是否是游客
        if(Yii::app()->user->getIsGuest()){?>

        <div class="na" style="padding-top:0px;"><a href="./index.php?r=user/register"><img src="<?php echo IMG_URL; ?>not_login.jpg"></a></div>

        <?php } else {?>

    <?php $this->widget('UserMenu'); ?>
            <?php }?>
<!--左边left 结束-->            


			<!-- 中间栏开始 -->


			<div class="middle clearfix"><img src="<?php echo IMG_URL; ?>sixiang.png">
                <?php
                    //在user组件里有个方法，getIsGuest(),判断是否是游客
                    if(Yii::app()->user->getIsGuest()){?>

                    <div class="menu">
                        <a href="" class="on">大家的微语</a>
                    </div>


                    <?php } else {?>

                    


					<div class="fa">

                        <?php $form = $this->beginWidget('CActiveForm'); ?>

						<div class="text-fa"><!-- 11月，梦想和自由一样，都有代价，但都值得，加油！ -->
                        <?php echo $form->textArea($model,'weiyu_content',array('class'=>'shuoshuo_content','placeholder'=>'12月，收集一年来点滴那些美丽。')); ?>
                        <?php echo $form->error($model,'weiyu_content'); ?>
                    	</div>

                        <?php
                        if(Yii::app()->user->hasFlash('success')){
                            echo Yii::app()->user->getFlash('success');}?>

                        <?php
                        if(Yii::app()->user->hasFlash('shanchu')){
                            echo Yii::app()->user->getFlash('shanchu');}?>

                        <input type="submit" value="发布" class="fr fabu"><span style="color:red;float:left;">* 禁止发表政治、反动、色情、低俗、以及带人身攻击或与主题内容无关的微语，否则将封禁帐号</span>
                        <?php $this->endWidget(); ?>


					</div>


<script>

    $(function(){
        $("#to_my_visitor_menu").click(function(){
            $("#to_my_visitor").show();
            $("#my_to_visitor").hide();
            $("#to_my_visitor_menu").addClass('on');
            $("#my_to_visitor_menu").removeClass();
            return false;
        });
        $("#my_to_visitor_menu").click(function(){
            $("#to_my_visitor").hide();
            $("#my_to_visitor").show();
            $("#to_my_visitor_menu").removeClass();
            $("#my_to_visitor_menu").addClass('on');
            return false;
        });
    });
</script>

                    <div class="menu">
                        <a id="to_my_visitor_menu" href="" class="on">大家的微语</a>
                        <a id="my_to_visitor_menu" href="">我的微语</a>
                    </div>
                    <?php }?>
					
					
					<div id="to_my_visitor" class="fa_content clearfix">
                        <?php foreach ($allthinking as $_v)
                        if($_v->userid->id != Yii::app()->user->id) {?>
						<dd id="to_my_visitor1">
							<i class="icon-off"></i>
							<a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->userid->id)); ?>" class="t-info">

								<!--用户信息-->


								<i class="online"></i>
								<img src="<?php echo $_v->userid->photo; ?>" alt="<?php echo $_v->userid->photo;?>" width="50" height="50" class="img">
							</a>
						</dd>
					<dt id="to_my_visitor2">
						<div class="title font-gray">
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->userid->id)); ?>" class="p14"><?php echo $_v->userid->nickname;?>：
                                </a><?php echo $_v->weiyu_content; ?>
                        </div>

                        <div class="font-gray time" valign="top">
                            <?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日 H:m',$_v->create_time);//时间戳转化date() ?>&nbsp;
                            <a href="#"><span id="fcnum_89559"></span>评论</a> |
                            <a href="<?php echo Yii::app()->createUrl('weiyu/zan',array('id'=>$_v->id)); ?>">赞
                                <?php if($_v->weiyu_zan != 0){?>(<?php echo $_v->weiyu_zan;?>)<?php }?>
                            </a> 
                        </div>
					</dt>
                    <br>
                    <?php }?>
					</div>

                    <div id="my_to_visitor" style="display:none;" class="fa_content clearfix">
                        <?php foreach ($allthinking as $_v)
                        if($_v->create_user_id === Yii::app()->user->id) {?>
                        <dd id="my_to_visitor1">
                            <i class="icon-off"></i>
                            <a href="" class="t-info">

                                <!--用户信息-->


                                <i class="online"></i>
                                <img src="<?php echo $_v->userid->photo; ?>" alt="<?php echo $_v->userid->photo;?>" width="50" height="50" class="img">
                            </a>
                        </dd>
                    <dt id="my_to_visitor2">
                        <div class="title font-gray">
                            <a href="" class="p14"><?php echo $_v->userid->nickname;?>：
                                </a><?php echo $_v->weiyu_content; ?>
                        </div>

                        <div class="font-gray time" valign="top">
                            <?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日 H:m',$_v->create_time);//时间戳转化date() ?>&nbsp;
                            <a onclick="return confirm('你确定要删除这条微语么 T_T ~?')" href="<?php echo Yii::app()->createUrl('weiyu/delete',array('id'=>$_v->id)); ?>">删除</a> 
                        </div>
                    </dt>
                    <br>
                    <?php }?>
                    </div>
					
		</div>


		
		<!-- 右边栏开始 -->
			<div class="aside">
                <div class="h22" style="padding-bottom:8px;text-align: center;">
                	<iframe name="sinaWeatherTool" src="http://weather.news.sina.com.cn/chajian/iframe/weatherStyle1.html?city=%E5%AE%81%E6%B3%A2" width="200" height="40" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>
                </div>
               <div class="ads">
                <?php if(Yii::app()->user->getIsGuest()){?>

                    <h2>在这里，让微语自由的呼吸！</h2>

                    <?php } else {?>
                    <h2>加入足迹已经
                        <?php
                        date_default_timezone_set('PRC');//设置默认时区
                        $db_time = date('Y-m-d',Yii::app()->user->regtime);
                        $days = abs(strtotime($db_time) - strtotime(date("Y-m-d")))/86400;
                        echo $days;
                        ?>
                     天了 @_@ ~</h2>
                    <?php }?>
                    <li style="*margin-left:-16px;">
                        <a href="#">
                            足迹使用帮助F&amp;Q
                        </a>
                    </li>
                </div>
            </div>

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->