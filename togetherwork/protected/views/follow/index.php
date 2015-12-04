<div class="main clearfix">
            <!--左边left 开始-->
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->  

<div class="middle">
                

                <div style="color:red;">
                <?php if(Yii::app()->user->hasFlash('unfollow'))
                    echo Yii::app()->user->getFlash('unfollow'); ?>
				</div>

   <div class="info_list">
	<div class="newslist">
    	<h4><?php if($self === Yii::app()->user->id){?>我<?php }else{?><?php echo $name->nickname; ?><?php } ?>
    	的关注&nbsp;(<?php echo count($guanzhuren); ?>)</h4>
    	<?php foreach ($guanzhuren as $_g) {?>
        <ul class="list_pl">
        	<div class="follow clearfix">	  	  
                    <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_g->touid)); ?>">
                        <img src="<?php echo $_g->touser->photo; ?>" width="50" height="50" class="img">
                    </a>
                    <ul>
                        <li>
                            <span class="font-gray">
                            <?php if($name->id === Yii::app()->user->id){?>
                                <div class="p">
                                    <a onclick="return confirm('确定取消关注<?php echo $_g->touser->nickname; ?>? T_T ~?')" href="<?php echo Yii::app()->createUrl('follow/unfollow',array('uid'=>$_g->touid)); ?>" class="font-og">取消关注</a>
                                </div>
                                <?php
                                $me = Yii::app()->user->id;
                                $pd = "select * from {{follow}} where uid=$me and touid=$_g->touid";
                                $cc = count(Follow::model()->findAllBySql($pd));
                                $pd2 = "select * from {{follow}} where uid=$_g->touid and touid=$me";
                                $cc2 = count(Follow::model()->findBySql($pd2));
                                $plus = $cc +$cc2;
                                if($plus === 2){?>
                                <div class="d">互相关注</div><a href="<?php echo Yii::app()->createUrl('msg/newmsg'); ?>" class="font-green">发私信</a>
                                <?php } ?>
                            <?php }?>
                                </span>
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_g->touid)); ?>" class="font-green p14 bold"><?php echo $_g->touser->nickname; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>$_g->touid)); ?>">关注<?php
                                echo $togz = Follow::model()->countByAttributes(array('uid'=>$_g->touid)); ?></a>人，
                                <a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>$_g->touid)); ?>">粉丝
                                <?php
                                echo $tofans = Follow::model()->countByAttributes(array('touid'=>$_g->touid));?></a>人
                        </li>
                        <li class="font-gray" style="margin-top:6px;">
                            
                        </li>			
                    </ul>	  
                </div>
        
                </ul>
        <?php }?>
        
    </div>
</div><div class="pg clearfix"></div>

</div>

<!-- 我的粉丝右侧开始 -->
<div class="aside">
	<div class="info_list">
         <div class="friendlist">
    	<h4><?php if($self === Yii::app()->user->id){?>我<?php }else{?><?php echo $name->nickname; ?><?php }?>的粉丝&nbsp;(<?php echo count($myfans); ?>)</h4>
    	<?php foreach ($myfans as $_m) {?>
        <ul class="list_f">

        	<div class="follow clearfix">	  	  
                    <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_m->uid)); ?>">
                        <img src="<?php echo $_m->user->photo; ?>" width="50" height="50" class="img">
                    </a>
                    <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_m->uid)); ?>" class="font-green p14 bold"><?php echo $_m->user->nickname; ?></a>
                    <br /><a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>$_m->uid)); ?>">关注<?php
                                echo $ugz = Follow::model()->countByAttributes(array('uid'=>$_m->uid)); ?></a>人，<a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>$_m->uid)); ?>">粉丝
                                <?php
                                echo $ufans = Follow::model()->countByAttributes(array('touid'=>$_m->uid));?></a>人
                    <ul>
                        <li>
                            <span class="font-gray">
                                <?php
                                $me2 = Yii::app()->user->id;
                                $pd1 = "select * from {{follow}} where uid=$me2 and touid=$_m->uid";
                                $cc1 = count(Follow::model()->findAllBySql($pd1));
                                $pd22 = "select * from {{follow}} where uid=$_m->uid and touid=$me2";
                                $cc22 = count(Follow::model()->findBySql($pd22));
                                $plus1 = $cc1 +$cc22;
                                if($plus1 === 2){?>互相关注<a href="<?php echo Yii::app()->createUrl('msg/newmsg'); ?>" class="font-green">发私信</a><?php }else{?><?php if(($plus1 ===1)&&($cc1 ===0)){?><a href="<?php echo Yii::app()->createUrl('follow/add',array('id'=>$_m->user->id)); ?>" class="font-green"  style="margin-right:10px">关注<?php
                                        switch ($_m->user->sex)
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
                                            ?></a><?php }?>
                                <?php } ?>
                                </span>
                        </li>
                        <li class="font-gray" style="margin-top:6px;">
                            
                        </li>			
                    </ul>	  
                </div>
          
        </ul>
        <?php } ?>
        
    	</div>
    </div>
      <div class="clearfix"></div>
</div>

<!-- 粉丝结束 -->





</div>