<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->
<div class="article">
                <div class="menu"><a href="<?php echo Yii::app()->createUrl('msg/inbox'); ?>" class="on">信息中心</a><a href="<?php echo Yii::app()->createUrl('msg/newmsg'); ?>">发送新短信</a></div>
                <div class="inbox">
                    <div id="box-yellow" class="box-blue">
                        <span class="fr"> &nbsp;&nbsp;<a href="#" title="删除所有对话" alt="删除所有对话" style="color:#0080C0;">[清空信箱]</a></span>
                        共与 <b><?php echo $fa; ?></b> 人有过联系，共收到信息 <b><?php echo $shou; ?></b> 条
                       
                    </div>
                    <div id="inboxlist" class="inboxlist">
                        <ul>

                        <?php foreach ($duihua as $_x) {?>
                        	<li class="clearfix">
                                <a><i class="icon-close position-absolute" style="margin-left: 750px;" title="删除对话" alt="删除对话"></i></a>
                                <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_x->uid)); ?>" target="_blank"><img src="<?php echo $_x->senduser->photo; ?>" width="50" height="50" class="img"></a>
                                <p style="margin-top:-3px;"><a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_x->uid)); ?>" target="_blank"><?php echo $_x->senduser->nickname; ?></a>：<?php echo $_x->content; ?></p>
                                <p class="font-gray" style="margin-top:5px;">
                                    <span class="fr"><a href="<?php echo Yii::app()->createUrl('msg/list',array('uid'=>$_x->uid)); ?>">共有
                                    <?php 
                                    $yonghu = Yii::app()->user->id;
                                    $duihua = "select * from {{msg}} where (uid=$_x->uid and touid=$yonghu) or (uid=$yonghu and touid=$_x->uid)";echo count(Msg::model()->findAllBySql($duihua));?>对话</a> | <a href="<?php echo Yii::app()->createUrl('msg/list',array('uid'=>$_x->uid)); ?>">回复</a></span>
                                <?php date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日 H:i',$_x->time); ?>
                                </p>
                            </li>
                        <?php }?>
                        </ul>
                     </div>
                    <div class="pg"></div>
                </div>
            </div>









</div>