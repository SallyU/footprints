<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->


	<div class="article">
		<div class="menu">
		    <a class="on" href="">感觉列表</a>
		</div>

		<div class="inboxlist">
                    <ul>
                    <?php foreach ($atype as $_a) {?>
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