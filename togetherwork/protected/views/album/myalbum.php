<div class="wrapper2 clearfix" style="width: 1244px;">
	<div id="user_card">
		<div class="maozi"></div>
		<div class="inner clearfix without-side">
			<div class="avatar-unit">
				<a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)) ?>" title="<?php echo Yii::app()->user->nickname; ?>" class="img x">
				<img style="width:140px;height:140px;" src="<?php echo Yii::app()->user->photo; ?>"></a>
				<div class="counts clearfix">
					<a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>" class="followers"><div class="num"><?php 
                                $byshui = Yii::app()->user->id;
                                $fansnu = "select * from {{follow}} where touid=$byshui";
                                $numFAN = count(Follow::model()->findAllBySql($fansnu));
                                echo $numFAN; ?></div><div class="sub">粉丝</div></a>

					<a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>" class="follows">
					<div class="num"><?php 
                                $shui = Yii::app()->user->id;
                                $gznu = "select * from {{follow}} where uid=$shui";
                                $numGZ = count(Follow::model()->findAllBySql($gznu));
                                echo $numGZ; ?></div><div class="sub">关注</div>
					</a>
				</div>
			</div>

			<div class="head-line">
				<div class="name"><?php echo Yii::app()->user->nickname; ?></div>
			</div>

			<ul class="introduction"></ul>

			<div class="about"></div>
			<div class="action-buttons">
				<a href="<?php echo Yii::app()->createUrl('user/myprofile'); ?>" class="btn btn14"><span class="text"> 账号设置</span></a>
			</div>

		</div>

		<div class="tabs">
			<a href="#" class="tab active">我的照片（<?php echo $shuliang; ?>）</a>
			<a href="<?php echo Yii::app()->createUrl('album/upload'); ?>" class="tab active">分享美图</a>
			<a href="<?php echo Yii::app()->createUrl('user/mystore'); ?>" class="tab active" style="float:right;">收藏的图片（<?php
                                echo $count = Picshoucang::model()->countByAttributes(array('pic_uid'=>Yii::app()->user->id));?>）</a>
		</div>
	</div>

		<div id="waterfall" style="height:auto;">

		<?php foreach ($model as $_v) { ?>
			<div class="item" style="float:left;">
					<div class="item_t">
						<div class="img">
							<a href="<?php echo Yii::app()->createUrl('album/view',array('id'=>$_v->id)); ?>"><img width="210" height="285" alt="" src="<?php echo $_v->album_img; ?>"></a>
						</div>
						<div class="title"><span><?php echo $_v->name; ?></span> <a onclick="return confirm('你确定要删除么 T_T ~?')" href="<?php echo Yii::app()->createUrl('album/delete',array('id'=>$_v->id)); ?>" style="float:right;">删除</a></div>
					</div>
					<div style="float:right;font-size:12px;color:#5C5C5C;margin:auto 10px 10px auto"><?php echo $_v->cate->cate_name; ?></div>
			</div>
		<?php }?>

		</div>


</div>