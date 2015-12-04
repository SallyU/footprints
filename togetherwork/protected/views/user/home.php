<div class="main clearfix">
            <!--左边left 开始-->
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->            

    <div class="middle">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top:10px;margin-bottom:20px;">
                    <tbody><tr>
                        <td width="110" rowspan="4" align="left" valign="top">
                            <img class="img" src="<?php echo $user->photo; ?>" title="<?php echo $user->nickname; ?>" width="100" height="100" style="border-radius: 5px;">
                        </td>
                        <td height="30">
                        <?php if($user->id != Yii::app()->user->id){?>
                            <div class="fr text-right">
                                <!-- <a name="dazhaohu" num="44398" class="font-green" href="#" style="margin-right:10px">
                                    打<span class="font-og">招</span>呼
                                                                    </a> -->
                                <!-- <a class="font-green" href="" style="margin-right:10px">发信息</a> -->
                                <?php
                                $me = Yii::app()->user->id;
                                $pd = "select * from {{follow}} where uid=$me and touid=$user->id";
                                $cc = count(Follow::model()->findBySql($pd));
                                $pd2 = "select * from {{follow}} where uid=$user->id and touid=$me";
                                $cc2 = count(Follow::model()->findBySql($pd2));
                                if($cc === 0){?>
                                <span><a href="<?php echo Yii::app()->createUrl('follow/add',array('id'=>$user->id)); ?>" class="font-green"  style="margin-right:10px">关注<?php
                                        switch ($user->sex)
                                            {
                                            case 1:
                                              echo "TA";
                                              break;
                                            case 2:
                                              echo "他";
                                              break;
                                            case 3:
                                              echo "她";
                                              break;
                                            default:
                                              echo "它";
                                            }
                                            ?></a>
                                </span>
                                <?php }else if(($cc === 1)&& ($cc2 ===0)){?>
                                <span><a class="font-green">已关注</a>
                                    (<a onclick="return confirm('确定取消关注<?php echo $user->nickname; ?>? T_T ~?')" href="<?php echo Yii::app()->createUrl('follow/unfollow',array('uid'=>$user->id)); ?>" class="font-og">取消关注</a>)
                                </span>
                                <?php }else{?><a class="font-green" href="<?php echo Yii::app()->createUrl('msg/newmsg'); ?>" style="margin-right:10px">发信息</a><span><a class="font-green">互相关注</a>
                                (<a onclick="return confirm('确定取消关注<?php echo $user->nickname; ?>? T_T ~?')" href="<?php echo Yii::app()->createUrl('follow/unfollow',array('uid'=>$user->id)); ?>" class="font-og">取消关注</a>)
                                </span>
                                <?php } ?>
                            </div>
                                 <?php }?>
                            <span class="p14 bold font-green"><?php echo $user->nickname; ?></span>
                            <span class="font-gray">
                                <b title="QQ号码">&nbsp;QQ：<?php echo $user->qq; ?>&nbsp;&nbsp;</b>
                                                            </span>
                        </td>
                       
                    </tr>
                    <tr>
                        <td height="30" valign="middle">
                            <p class="fr font-gray">
                                关注：<span class="p16"><a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>$user->id)); ?>"><?php echo $userfollow; ?></a></span> |
                                粉丝：<span class="p16"><a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>$user->id)); ?>"><?php echo $fans; ?></a></span> |
                                微语：<span class="p16"><a href="<?php echo Yii::app()->createUrl('weiyu/search',array('uid'=>$user->id)); ?>" target="_blank"><?php
                                echo $count = Weiyu::model()->countByAttributes(array('create_user_id'=>$user->id));?>&nbsp;</a></span>
                            </p>                   
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" class="font-gray h22">
                        <div class="mem_desc"><div class="tip"></div>
                        <div class="desc"><?php echo $user->introduce; ?><br/></div>
                        </div>
                        <br />
                        <?php
                                        switch ($user->sex)
                                            {
                                            case 1:
                                              echo '性别：保密';
                                              break;
                                            case 2:
                                              echo '<i class="ico sex_man"></i>&nbsp;男';
                                              break;
                                            case 3:
                                              echo '<i class="ico sex_woman"></i>&nbsp;女';
                                              break;
                                            default:
                                              echo "它";
                                            }
                                            ?>
                        </td>
                    </tr>

                </tbody>
            </table>
                                <!--发思想 结束-->


                <!--导航tab 开始-->
                <?php if($user->id != Yii::app()->user->id){ ?>
                <div class="menu ui-sortable"><a class="on">
                                    <?php
                                        switch ($user->sex)
                                            {
                                            case 1:
                                              echo "TA";
                                              break;
                                            case 2:
                                              echo "他";
                                              break;
                                            case 3:
                                              echo "她";
                                              break;
                                            default:
                                              echo "它";
                                            }
                                            ?>的动态</a></div>
                <?php }?>
                <?php if($user->id === Yii::app()->user->id){?>
                    <div class="menu ui-sortable"><a class="on">我的动态</a></div>
                <?php }?>

                  <!--用户信息-->
                  <?php foreach ($sixiang as $_s) {?>
                <div class="content2">
                    <dd>
                    <img src="<?php echo $user->photo; ?>" alt="<?php echo $user->nickname; ?>" width="50" height="50" class="img">
                    </dd>
                
                    <dt><div class="title font-gray">
                    <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$user->id)); ?>" class="p14"><?php echo $user->nickname; ?></a>：&nbsp;
                    新感觉<a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_s->id)); ?>">《<?php echo $_s->title; ?>》</a>
                    <div style="margin-top:5px;"><?php echo $_s->des; ?></div>
                    </div>
                    <div class="font-gray time clearfix"><a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_s->id)); ?>">
                        <?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('m月d日 H:m',$_s->create_time);//时间戳转化date() ?></a>
                    </div>
                    </dt>
                </div>
                <?php }?>

    </div>


    <div class="aside">
                <div class="h22" style="padding-bottom:8px;text-align: center;">
                    <iframe name="sinaWeatherTool" src="http://weather.news.sina.com.cn/chajian/iframe/weatherStyle1.html?city=%E5%AE%81%E6%B3%A2" width="200" height="40" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>
                </div>
               <div class="ads">
                    <h2>已有<span style="color: #F83432;"><?php echo $user->visitor;?></span>人在此留下印迹</h2>
                    <li style="*margin-left:-16px;">
                        <a href="#">
                            足迹使用帮助F&amp;Q</a><br>
                    </li>

                        <?php if(!Yii::app()->user->getIsGuest()){ ?>
                        <li>我加入足迹已经
                        <span style="color: #09f;">
                        <?php
                        date_default_timezone_set('PRC');//设置默认时区
                        $db_time = date('Y-m-d',Yii::app()->user->regtime);
                        $days = abs(strtotime($db_time) - strtotime(date("Y-m-d")))/86400;
                        echo $days;
                        ?></span>&nbsp;天了 @_@ ~</li>
                        <?php }?>
                        
                    
                </div>


                
                <!-- 标签 -->
                <h3 style="font-family: '微软雅黑';font-size: 14px;font-weight: bold;padding: 5px 0;">
                    <!-- <a class="fr l" href="#">其他标签</a> -->
                    <?php if($user->id != Yii::app()->user->id){ ?>
                                    <?php
                                        switch ($user->sex)
                                            {
                                            case 1:
                                              echo "TA";
                                              break;
                                            case 2:
                                              echo "他";
                                              break;
                                            case 3:
                                              echo "她";
                                              break;
                                            default:
                                              echo "它";
                                            }
                                            ?>的标签
                <?php }else{?>我的标签<?php }?>
                </h3>
                <div class="tags">
                    <ul class="clearfix">
                    <?php if($bq != NULL){?>
                    <?php foreach ($bq as $_t) {?>
                        <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>$_t->tagname)); ?>"><?php echo $_t->tagname; ?></a> 
                    <?php } ?> 
                    <?php }else{?>暂无 - -!<?php }?>
                    </ul>
                </div>

                <!--访问记录-->
<div class="menu">
    <a id="to_my_visitor_menu" class="on" href="#">谁来过这</a>
    <a id="my_to_visitor_menu" href="#">去看过谁</a>
</div>
<div class="item box clearfix">
<?php foreach ($fangwenwo as $_w) {?>
    <ul id="to_my_visitor">
        <li id="to_my_visitor1">
            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_w->uid)) ?>">
                <i class="offline"></i>
                <img style="width:60px;height:60px;" alt="<?php echo $_w->user->nickname; ?>" src="<?php echo $_w->user->photo; ?>"><?php echo $_w->user->nickname; ?></a>
            </li>
        </ul>
<?php } ?>

<?php foreach ($visitwho as $_v) {?>
    <ul id="my_to_visitor" style="display:none;">
        <li id="my_to_visitor1">
            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->toid)); ?>">
                <i class="online"></i>
                <img style="width:60px;height:60px;" alt="<?php echo $_v->touser->nickname; ?>" src="<?php echo $_v->touser->photo; ?>"><?php echo $_v->touser->nickname; ?></a>
            </li>
        </ul>
<?php }?>
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
</script><!--来访记录-->






                <!--活跃榜-->
                <div class="huoyue">
                    <div class="menu" style="margin-right:-1px;">
                        <a href="#" class="on">
                            <span class="font-og">活跃小分队</span>
                        </a>
                    </div>
                    <ul class="clearfix">
                        <?php foreach ($yaya as $k) {?>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$k->id)); ?>" class="img">
                                <img alt="<?php echo $k->nickname; ?>" src="<?php echo $k->photo; ?>" title="<?php echo $k->nickname; ?>">
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>





    </div>
</div>