<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->


<div class="article">
                <div class="menu"><a href="<?php echo Yii::app()->createUrl('msg/inbox'); ?>">信息中心</a><a href="<?php echo Yii::app()->createUrl('msg/newmsg'); ?>">发送新短信</a><a class="on">对话列表</a><a href="<?php echo Yii::app()->createUrl('msg/inbox'); ?>" class="r">&gt;&gt; 返回收件箱</a></div>

    <div class="inbox-content">
         <?php foreach ($msglist as $_m) {?>
            <?php if($_m->uid != Yii::app()->user->id){ ?>
                    <div class="clearfix">
                        <a style="float:left" href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_m->uid)); ?>" target="_blank" class="inbox-img">
                            <img src="<?php echo $_m->senduser->photo; ?>" alt="<?php echo $_m->senduser->nickname; ?>" title="<?php echo $_m->senduser->nickname; ?>">
                            <?php echo $_m->senduser->nickname; ?>
                        </a>
                        <ul class="clearfix inbox-her">
                            
                            <p>对我说：<?php echo $_m->content; ?><br /><time class="time"><?php date_default_timezone_set('PRC');//设置默认时区
                                echo date('Y-m-d H:i:s',$_m->time); ?></time></p>
                        </ul>
                    </div>
                <?php }else{ ?> 
                <div class="clearfix">
                        <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_m->uid)); ?>" target="_blank" class="inbox-img-fr">
                            <img src="<?php echo $_m->senduser->photo; ?>" alt="<?php echo $_m->senduser->nickname; ?>" title="<?php echo $_m->senduser->nickname; ?>">
                            <?php echo $_m->senduser->nickname; ?>
                        </a>
                        <ul class="clearfix inbox-me">
                            
                            <p><?php echo $_m->content; ?><time class="time"><?php date_default_timezone_set('PRC');//设置默认时区
                                echo date('Y-m-d H:i:s',$_m->time); ?>
                            </time></p>
                        </ul>
                    </div>
            <?php }} ?>



                <div class="clearfix margin-10">
                <?php $form=$this->beginWidget('CActiveForm'); ?>
                         <h3 style="font-size: 1em;font-weight: bold;padding: 5px 0;">回复私信</h3>
                         <div style="color:red;">
                <?php if(Yii::app()->user->hasFlash('fasong'))
                    echo Yii::app()->user->getFlash('fasong'); ?></div>
                        <div class="text-fa" style="height:160px;">
                            <?php echo $form->textArea($model,'content',array('class'=>'textarea')); ?>
                        </div>
                        <p class="clearfix margin-10">
                            <input type="submit" value="发 送"class="button-blue">&nbsp;&nbsp;
                            <input type="button" value="返 回" onclick="history.back();return false;" class="button-gray">
                        </p>
                <?php $this->endWidget(); ?>
                </div>
            </div>
</div>


</div>