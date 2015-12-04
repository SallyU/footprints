<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->


	<div class="article"><div style="color:#89cd46;font-size:16px;">搜索关键字为&nbsp;&nbsp;<span style="color:red;font-size:18px;">“<?php echo $id; ?>”</span>&nbsp;&nbsp;的感觉：</div>
		<div class="menu">
		    <a href="<?php echo Yii::app()->createUrl('search/index',array('keywords'=>$id)); ?>">标签</a>
		    <a  href="<?php echo Yii::app()->createUrl('search/nickname',array('keywords'=>$id)); ?>">昵称</a>
		    <a  href="<?php echo Yii::app()->createUrl('search/uid',array('keywords'=>$id)); ?>">会员ID</a>
		    <a class="on" href="<?php echo Yii::app()->createUrl('search/feel',array('keywords'=>$id)); ?>">感觉</a>
		</div>

		<div class="inboxlist">
                    <ul>
                    <?php foreach ($article as $_a) {?>
                    	<li>
                            <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_a->id)); ?>">
                            <img src="<?php echo $_a->img; ?>" class="img"></a>
                            标题：<a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_a->id)); ?>"><?php echo $_a->title; ?></a><br>(<?php echo $_a->type->type_name; ?>)
                        </li>
                    <?php } ?>
                    </ul>
                </div>








	</div>
</div>