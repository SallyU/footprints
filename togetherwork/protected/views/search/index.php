<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->


	<div class="article">
	<div style="color:#89cd46;font-size:16px;">搜索关键字为&nbsp;&nbsp;<span style="color:red;font-size:18px;">“<?php echo $id; ?>”</span>&nbsp;&nbsp;的标签：</div>
		<div class="menu">
		    <a class="on" href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>$id)); ?>">标签</a>
		    <a href="<?php echo Yii::app()->createUrl('search/nickname',array('keywords'=>$id)); ?>">昵称</a>
		    <a href="<?php echo Yii::app()->createUrl('search/uid',array('keywords'=>$id)); ?>">会员ID</a>
		    <a href="<?php echo Yii::app()->createUrl('search/feel',array('keywords'=>$id)); ?>">感觉</a>
		</div>

		<div class="inboxlist">
		<?php foreach ($tag as $_t) {?>
                    <ul>
	                    <li class="clearfix">
	                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_t->uid)); ?>">
	                                <img src="<?php echo $_t->usertag->photo; ?>" width="50" height="50" class="img">
	                            </a>
	                            <p>
	                                <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_t->uid)); ?>"><?php echo $_t->usertag->nickname; ?></a> <i class="cz0"></i> <i class="icon-woman"></i>- 关注<b><?php 
                                $shui = $_t->uid;
                                $gznu = "select * from {{follow}} where uid=$shui";
                                $numGZ = count(Follow::model()->findAllBySql($gznu));
                                echo $numGZ; ?></b>人，粉丝<b><?php 
                                $byshui = $_t->uid;
                                $fansnu = "select * from {{follow}} where touid=$byshui";
                                $numFAN = count(Follow::model()->findAllBySql($fansnu));
                                echo $numFAN; ?></b>人</p>

	                            <p class="tagsList" style="padding-top:5px;">
	                            <?php 
	                            $sqlbq = "select * from {{usertags}} where uid=$_t->uid";
	                            $bqian= Usertags::model()->findAllBySql($sqlbq);
	                            foreach ($bqian as $bq) {?>
	                                	<a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>$bq->tagname)); ?>" class=""><?php echo $bq->tagname; ?></a>
	                            <?php } ?>

	                    </li>
	                </ul>
        <?php }?>
        
        </div>

		<div class="pg clearfix"></div>
	</div>







</div>