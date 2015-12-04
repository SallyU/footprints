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
<div class="middle clearfix">
    <li class="post_wxts" style="padding:10px; width:578px;">
        <p class="p1">微语：</p>
        <p class="p2">每一次敲着键盘，你的心是何种摸样，又引导你走向了何种心情。微语都牢牢的记录下当下的那一刻，每次打开它，凝视它，它会告诉你的一切，你会找到真正快乐的自我。
        </p>
    </li>

    <div class="menu">
    </div>

    <div class="fa_content clearfix">

        <?php foreach ($showweiyu as $_v){?>
                        <dd>
                            <i class="icon-off"></i>
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->userid->id)); ?>" class="t-info">

                                <!--用户信息-->


                                <i class="online"></i>
                                <img src="<?php echo $_v->userid->photo; ?>" alt="<?php echo $_v->userid->photo;?>" width="50" height="50" class="img">
                            </a>
                        </dd>
                        <dt>
                            <div class="title font-gray">
                                <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->userid->id)); ?>" class="p14"><?php echo $_v->userid->nickname;?>：
                                    </a><?php echo $_v->weiyu_content; ?>
                            </div>

                            <div class="font-gray time" valign="top">
                                <?php
                                    date_default_timezone_set('PRC');//设置默认时区
                                    echo date('y年m月d日 H:m',$_v->create_time);//时间戳转化date() ?>&nbsp;
                            </div>
                        </dt>
                    <br>
                <?php }?>

    </div>

</div>
			
<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
</div><!--/ .main-->