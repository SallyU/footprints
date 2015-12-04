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


<!-- 右半边开始 -->

<div class="article"><div style="color:red;"><?php if(Yii::app()->user->hasFlash('shoucang')){echo Yii::app()->user->getFlash('shoucang');}?></div>
                <div class="content">
                    <h1>《<?php echo $model->title; ?>》</h1>
                    <ul>
                        <li class="info">
                            <?php
                                date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日 H:i:s',$model->create_time);//时间戳转化date() ?>
                                浏览<?php echo $model->click; ?>次
                        </li>

                        <?php if(!Yii::app()->user->getIsGuest()){?>

                        <li class="img">
                        <?php
                        //收藏与已经收藏判断,不能放在控制器中
                        $userid= Yii::app()->user->id;
                        $sxid = $model->id;
                        // 联合查询同时满足同一主键的数据，如果返回为NULL就是未收藏，否则一经收藏
                        $sql = "select * from {{shoucang}} where uid=$userid and sixiangid=$sxid";
                        $sc_sixiang = Shoucang::model()->findAllBySql($sql);
                         if($sc_sixiang == NULL){?>
                            <a href="<?php echo Yii::app()->createUrl('article/shoucang',array('id'=>$model->id)); ?>"><div>收藏</div><img src="<?php echo $model->img; ?>"></a>
                        <?php } else {?>
                            <a><div>已收藏&nbsp;^_^</div><img src="<?php echo $model->img; ?>"></a>
                        <?php }?>
                        </li>
                        <?php } else {?>
                        <li class="img"><a href=""><img src="<?php echo $model->img; ?>"></a>
                        </li>
                        <?php }?>

                        <li class="text"><?php echo $model->content; ?><br>
                            <br>
                            ---------------<?php echo $model->users->nickname; ?>----------------
                        </li>

                        <li class="by">By：<a href="#"><?php echo $model->users->nickname; ?></a></li>

                        <li class="next">
                            <a href="<?php echo $prev->id?$this->createUrl('/article/detail', array('id'=>$prev->id)):'javascript:void(0)'; ?>" target="_self">上一篇：<?php echo $prev->title?$prev->title:'没有了'; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo $next->id?$this->createUrl('/article/detail', array('id'=>$next->id)):'javascript:void(0)'; ?>" target="_self">下一篇：<?php echo $next->title?$next->title:'没有了'; ?></a>
                        </li>   
                    </ul>
                </div>


                <div class="comment">
                <div style="color:red;">
                <?php if(Yii::app()->user->hasFlash('commentSubmitted'))
                    echo Yii::app()->user->getFlash('commentSubmitted'); ?>
                <?php if(Yii::app()->user->hasFlash('delcomment'))
                    echo Yii::app()->user->getFlash('delcomment'); ?>
                </div>
                    <div class="menu">
                        <a href="" class="on">
                            小脚丫们的感受（<span><?php
                                echo $count = Comment::model()->countByAttributes(array('article_id'=>$model->id));?></span>）
                        </a>
                        <a href="#" class="r" onclick="window.location.href='./index.php?r=article/create';">
                            找不到我的感觉？分享一个吧&gt;&gt;
                        </a>
                    </div>
                    <ul>
                    <li class="info">
                            <span class="fr">
                                <a href="<?php echo $prev->id?$this->createUrl('/article/detail', array('id'=>$prev->id)):'javascript:void(0)'; ?>" target="_self">上一篇：<?php echo $prev->title?$prev->title:'没有了'; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo $next->id?$this->createUrl('/article/detail', array('id'=>$next->id)):'javascript:void(0)'; ?>" target="_self">下一篇：<?php echo $next->title?$next->title:'没有了'; ?></a>
                                <a href="<?php echo Yii::app()->createUrl('article/index'); ?>">感觉大厅</a>
                            </span>
                            <?php if(!Yii::app()->user->getIsGuest()){ ?>说说我的感受<?php }else{ ?>脚丫们的评论<?php }?>
                        </li>
                    <?php if(!Yii::app()->user->getIsGuest()){ ?>
                    <li class="clearfix">
                                        <!-- 发表评论 -->
                            <?php $this->renderPartial('/comment/_form',array('model'=>$comment)); ?>
                    </li>
                    <?php }else{?>
                    想要添加评论？先<a href="<?php echo Yii::app()->createUrl('user/login'); ?>" style="color: #35BFFF;">登录</a>或者<a href="<?php echo Yii::app()->createUrl('user/register'); ?>" style="color: #35BFFF;">注册</a>
                    <?php }?>
                        <div id="load_div">
                        <?php foreach ($xianshicomment as $pinglun) {?>
                            <dl class="clearfix ying" id="com_30210">
                                <dd>
                                    <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$pinglun->comment_userid)); ?>">
                                        <img src="<?php echo $pinglun->commentusers->photo;?>"><?php echo $pinglun->commentusers->nickname; ?>
                                    </a>
                                </dd>

                                <dt><b></b><?php echo $pinglun->content; ?>
                                    <div class="clearfix font-gray" style="margin:10px 0 0px 0;">
                                        <input type="hidden" id="is_zan30210" value="1">
                                        <input type="hidden" id="open_close30210" value="1">
                                        <span class="fr font-gray">
                                            <?php
                                                date_default_timezone_set('PRC');//设置默认时区
                                                echo date('Y-m-d H:i',$pinglun->create_time);//时间戳转化date() ?>

                                            <?php if($pinglun->comment_userid === Yii::app()->user->id){?>
                                            |&nbsp;<a onclick="return confirm('删除这条评论 T_T ~?')" href="<?php echo Yii::app()->createUrl('article/deletecomment',array('id'=>$pinglun->id)); ?>">删除</a>
                                            <?php }?>
                                        </span>

                                    <div id="comment_30210" class="clearfix" style="display: none;">

                                        <div id="comment_list30210" style="margin-top:10px;">
                                        </div>

                                        <div class="clearfix" style="margin-top:15px;">
                                            <textarea placeholder="我也说一句..." id="comment_content30210" style="height:30px;"></textarea>
                                            <input islogin="true" type="button" id="btn30210" name="btn30210" class="button-blue-s" value="回 复" onclick="comment_comment(event,'30210');">
                                        </div>
                                    </div>

                                </dt>
                            </dl>
                            <?php }?>
                        </div>
                    </ul>
                </div>
            </div>

</div>