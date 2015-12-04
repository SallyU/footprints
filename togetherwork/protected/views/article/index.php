<div class="main clearfix">

                <!-- 判断用户是否登录 -->
        <?php
        //在user组件里有个方法，getIsGuest(),判断是否是游客
        if(Yii::app()->user->getIsGuest()){?>

		<div class="na" style="padding-top:0px;"><a href="./index.php?r=user/register"><img src="<?php echo IMG_URL; ?>not_login.jpg"></a></div>

        <?php } else {?>

        <?php $this->widget('UserMenu'); ?>
            <?php }?>
<!--左边left 结束-->    

<div class="article">
                <div class="banner">
                    <!-- <span class="banner-feeling"></span>
                    <a href="#" class="banner-feeling"></a>
                    <span class="banner-feeling"></span>
                    <a href="#" class="banner-feeling"></a>
                    <a href="#" class="banner-feeling"></a> -->
                </div>


<?php
//在user组件里有个方法，getIsGuest(),判断是否是游客
if(Yii::app()->user->getIsGuest()){?> 

<div class="m-menu">
    <ul>
        <li class="new">
            一共有<?php echo $count; ?>个感觉啦，加入我们，添加更多新鲜的思想吧&nbsp;*_*
        </li>
    </ul>
</div>

<div class="pubu clearfix">

                    <?php
                        $i=1;
                        //遍历传过来的值：$article_infos
                        foreach ($article_infos as $_v) {?>
                    <div class="pin">
                        <a class="img" href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>" title="《<?php echo $_v->title; ?>》" style="background-image:url(<?php echo $_v->img; ?>)">
                            <!-- <div><b>收藏</b></div> -->
                            
                        </a>
                        <p class="title" title="《<?php echo $_v->title; ?>》">
                            <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>">《<?php echo $_v->title; ?>》</a>
                        </p>
                        <p class="title font-gray">
                            <span class="fr">
                                <a href="#" class="font-gray"><?php echo $_v->type->type_name;?></a>
                            </span>
                            <?php echo $_v->click; ?> 浏览&nbsp;&nbsp;
                            <?php
                                //统计感觉回应数量
                                $huiying = $_v->id;
                                echo $count = Comment::model()->countByAttributes(array('article_id'=>$huiying));?>回应
                        </p>
                        <div class="member">
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->users->id)); ?>"><img src="<?php echo $_v->users->photo; ?>" alt="<?php echo $_v->users->nickname; ?>">
                            </a>

                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->users->id)); ?>" ><?php echo $_v->users->nickname; ?></a>&nbsp;
                            <br>发布于:&nbsp;
                                <?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日',$_v->create_time);//时间戳转化date() ?>
                        </div>
                    </div>
                     <?php
                        $i++;}?>
                </div>
            <div style="clear:both;"></div>
                <div class="pg clearfix">
                    <?php echo $page_list; ?>
                </div>


<?php } else {?>

<div class="m-menu">
    <ul>
        <li class="hot">
            <a id="to_my_visitor_menu" class="on" href="#">默认排序</a>|
            <a id="my_to_visitor_menu" href="#">浏览最多</a>|
            <a href="<?php echo Yii::app()->createUrl('article/myarticle',array('uid'=>Yii::app()->user->id)); ?>">我的感觉</a>
        </li>

        <li class="new">
            <a href="./index.php?r=article/create">分享我的感觉</a> | 一共有<?php echo $count; ?>个感觉啦
        </li>
    </ul>
</div>

<div class="item box clearfix">
    <ul id="to_my_visitor">
        <li id="to_my_visitor1">
                <div class="pubu clearfix">
                    <?php
                        $i=1;
                        //遍历传过来的值：$article_infos
                        foreach ($article_infos as $_v) {?>
                    <div class="pin">
                        <a class="img" href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>" title="《<?php echo $_v->title; ?>》" style="background-image:url(<?php echo $_v->img; ?>)"><!-- <div><b>收藏</b></div> -->
                            
                        </a>
                        <p class="title" title="《<?php echo $_v->title; ?>》">
                            <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>">《<?php echo $_v->title; ?>》</a>
                        </p>
                        <p class="title font-gray">
                            <span class="fr">
                                <a href="#" class="font-gray"><?php echo $_v->type->type_name;?></a>
                            </span>
                            <?php echo $_v->click; ?> 浏览&nbsp;&nbsp;<?php
                                //统计感觉回应数量
                                $huiying = $_v->id;
                                echo $count = Comment::model()->countByAttributes(array('article_id'=>$huiying));?> 回应
                        </p>
                        <div class="member">
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->users->id)); ?>"><img src="<?php echo $_v->users->photo; ?>" alt="<?php echo $_v->users->nickname;?>">
                            </a>

                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->users->id)); ?>" ><?php echo $_v->users->nickname;?></a>&nbsp;
                            <br>发布于:&nbsp;
                                <?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日',$_v->create_time);//时间戳转化date() ?>
                        </div>
                    </div>
                     <?php
                        $i++;}?>
                </div>
            </li>
                <div style="clear:both;"></div>
                <div class="pg clearfix">
                    <?php echo $page_list; ?>
                </div>
        </ul>
    <ul id="my_to_visitor" style="display:none;">
        <li id="my_to_visitor1">
            <div class="pubu clearfix">
                    <?php
                        foreach ($re as $_v) {?>
                    <div class="pin">
                        <a class="img" href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>" title="《<?php echo $_v->title; ?>》" style="background-image:url(<?php echo $_v->img; ?>)"><!-- <div><b>收藏</b></div> -->
                            
                        </a>
                        <p class="title" title="《<?php echo $_v->title; ?>》">
                            <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>">《<?php echo $_v->title; ?>》</a>
                        </p>
                        <p class="title font-gray">
                            <span class="fr">
                                <a href="#" class="font-gray"><?php echo $_v->type->type_name;?></a>
                            </span>
                            <?php echo $_v->click; ?> 浏览&nbsp;&nbsp;<?php
                                //统计感觉回应数量
                                $huiying = $_v->id;
                                echo $count = Comment::model()->countByAttributes(array('article_id'=>$huiying));?> 回应
                        </p>
                        <div class="member">
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->users->id)); ?>"><img src="<?php echo $_v->users->photo; ?>" alt="<?php echo $_v->users->nickname;?>">
                            </a>

                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->users->id)); ?>" ><?php echo $_v->users->nickname;?></a>&nbsp;
                            <br>发布于:&nbsp;
                                <?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日',$_v->create_time);//时间戳转化date() ?>
                        </div>
                    </div>
                     <?php }?>
                </div>
            </li>
        </ul>
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

            <?php }?>
                
            </div>
        
    </div>
   