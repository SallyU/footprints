<div class="main clearfix">
            <!--左边left 开始-->
    <?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->
	<div style="color:red;">
	<?php
	if(Yii::app()->user->hasFlash('unstore')){
	    echo Yii::app()->user->getFlash('unstore');}?>
	</div>

	<div class="article">
	    <div class="menu"><a class="on">我的收藏</a></div>
		<div class="box-blue margin-10">
		    <a href="<?php echo Yii::app()->createUrl('user/fav'); ?>">收藏的感觉(<?php
		                                echo $count = Shoucang::model()->countByAttributes(array('uid'=>Yii::app()->user->id));?>)</a> ┆
		    <a href="" class="bold">收藏的图片(<?php echo $count2;?>)</a>
		</div>


		<!-- 展示收藏的图片 -->
	<div class="fav clearfix">
		<?php foreach ($model as $_v) {?>
			<div class="cell">
			<a href="<?php echo Yii::app()->createUrl('album/view',array('id'=>$_v->pic_id)); ?>" title="<?php echo $_v->pic->name; ?>" class="img" style="background-image:url(<?php echo $_v->pic->album_img; ?>)">
                        </a>
                        <p class="title" title="">
                            <a href="<?php echo Yii::app()->createUrl('album/view',array('id'=>$_v->pic_id)); ?>" title="<?php echo $_v->pic->name; ?>"><?php echo $_v->pic->name; ?></a>
                        </p>
                        <div class="a-member">
                        	<a title="<?php echo $_v->pic->user->nickname; ?>" href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->pic->user_id)); ?>">
                                <img src="<?php echo $_v->pic->user->photo; ?>">
                            </a>
                            <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->pic->user_id)); ?>"><?php echo $_v->pic->user->nickname; ?></a>
                            &nbsp;<br>发布于:
                            <?php date_default_timezone_set('PRC');//设置默认时区
          						  echo date('y-m-d',$_v->pic->create_time); ?>
                            <a onclick="return confirm('确定取消收藏么? T_T ~?')" href="<?php echo Yii::app()->createUrl('user/unstore',array('id'=>$_v->id)); ?>" name="fav_album" num="7264">取消收藏</a>
                        </div>
            </div>
        <?php }?>
    </div>




	</div>

</div>