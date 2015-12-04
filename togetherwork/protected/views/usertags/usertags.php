<div class="main clearfix">
            <!--左边left 开始-->
    <?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->

<div class="article">
    <div class="menu">
        <a href="./index.php?r=user/myprofile">详细资料</a>
        <a href="<?php echo Yii::app()->createUrl('user/edit_password'); ?>">修改密码</a>
        <a href="#" class="on">个人标签</a>
        <!-- <a href="">隐私设置</a> -->
    </div>

<div style="color:red;">
<?php if(Yii::app()->user->hasFlash('success')){
	echo Yii::app()->user->getFlash('success');}?>
<?php if(Yii::app()->user->hasFlash('shanchu')){
    echo Yii::app()->user->getFlash('shanchu');}?>

</div>

    <h3 style="font-size: 1em;font-weight: bold;padding: 5px 0;" class="margin-10">标签让你与众不同</h3>

    		<div class="box-blue clearfix">
                    <div class="fl h22" style="width:30%;">为啥要打标签？<br>每个标签后面都隐藏着一群志同道合的人<br>贴上你的标签，找到你的同道中人<br>
                    <?php $form = $this->beginWidget('CActiveForm'); ?>
                            <?php echo $form->textField($model,'tagname',array('maxlength'=>10)); ?>
                            <input type="submit" value="添加标签" class="button-blue-s">
                            <?php echo $form->error($model,'tagname'); ?>
                            
                    <?php $this->endWidget(); ?>
                    </div>
                    <div class="fr" style="width:60%;">
                        <h2 class="font-gray" style="padding: 3px 0;letter-spacing: -1px;font-size: 1.5em;">标签秘籍：<span style="color:#f60;">你有什么兴趣？</span>寻找同道中人吧！</h2>
                        <ul id="tagsList" class="tagsList">
                            <li>
                                你是？<span style="display:block"><a href="#" class="disabled">旅行爱好者</a><a href="#">美食</a><a href="#">小资</a><a href="#">忧郁</a><a href="#">或者是其他...</a></span>
                            </li>
                        </ul>
                    </div>
                </div>

               <h3 class="margin-10" style="font-size: 1em;font-weight: bold;padding: 5px 0;">我已经添加的标签：</h3>

               <div class="clearfix box-blue" id="mytagshow2">
                    <ul class="tagList" id="tag_list">
                        <span id="mytags">
                        <?php foreach ($my as $_v) { ?>
                        <li><?php echo $_v->tagname; ?><a onclick="return confirm('你确定要删除么 T_T ~?')" href="<?php echo Yii::app()->createUrl('usertags/delete',array('id'=>$_v->id)); ?>" title="删除标签" class="icon-close"></a></li>
                        <?php } ?>
                        </span>
                    </ul>
                </div>

               <div id="hasCommon" class="hasCommon">
                    <div class="title">
                        <h3>你的同道中人</h3>
                        <span class="bg"></span>
                    </div>
                    <!-- <div id="mulTagTitle" class="title title2">
                        <h3>多标签相似</h3>
                    </div> -->
                    <div id="similar_all" class="round similar"></div>
                    <div class="title title2">
                        <h3>标签命中</h3>
                        <span class="bg"></span>
                    </div>
                  <div>
					<ul class="comList">
                    <?php foreach ($my as $_k) { ?>
                    <?php 
                    $name = $_k->tagname;
                    $sql = "select * from {{usertags}} where tagname='$name' order by create_time desc"; 
                    $same=Usertags::model()->findAllBySql($sql);
                    foreach ($same as $_s) {?>
                    <?php if($_s->uid != Yii::app()->user->id){?>
						<li>
							<div class="tagpic">
							<a title="<?php echo $_s->usertag->nickname; ?>" href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_s->uid)); ?>">
							<img src="<?php echo $_s->usertag->photo; ?>" title="<?php echo $_s->usertag->nickname; ?>">
							</a>
							</div>
							<div class="userInfo">
								<a title="<?php echo $_s->usertag->nickname; ?>" href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_s->uid)); ?>"><?php echo $_s->usertag->nickname; ?></a><br>[<?php echo $_s->tagname; ?>]<br>
								<a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>$_s->tagname)); ?>"><span class="tag"><?php $sql = "select * from {{usertags}} where tagname='$name' order by create_time desc"; 
                                    $sa=Usertags::model()->findAllBySql($sql);echo $c=count($sa);?>位同道中人<span class="ffsong">&gt;&gt;</span></span></a>
							</div>
						</li>
                        <?php }?>
                    <?php }?>
                    <?php } ?>
					</ul>

				</div>
               </div>

  



</div>

</div>