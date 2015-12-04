<div id="container">
<?php if(!Yii::app()->user->getIsGuest()){ ?>
  <!-- 个人信息卡片 -->
    <div class="pin wfc" style="position: absolute; left: 0px; top: 0px;">
      <div id="Profile">
        <div class="profile-basic">
        <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>" title="<?php echo Yii::app()->user->nickname; ?>" class="img x"><img width="54" height="54" src="<?php echo Yii::app()->user->photo; ?>"></a>
        <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>" class="userlink"><?php echo Yii::app()->user->nickname; ?></a>
        <a href="<?php echo Yii::app()->createUrl('user/myprofile') ?>" title="帐号设置" class="settings"></a>
        </div>

        <div class="profile-stats">
          <a href="<?php echo Yii::app()->createUrl('album/myalbum'); ?>"><strong><?php
                                echo $sl = Album::model()->countByAttributes(array('user_id'=>Yii::app()->user->id));?></strong>我的照片</a>
          <a href="<?php echo Yii::app()->createUrl('user/mystore'); ?>" class="middle"><strong><?php
                                echo $count = Picshoucang::model()->countByAttributes(array('pic_uid'=>Yii::app()->user->id));?></strong>收藏</a>
          <a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>"><strong><?php 
                                $byshui = Yii::app()->user->id;
                                $fansnu = "select * from {{follow}} where touid=$byshui";
                                $numFAN = count(Follow::model()->findAllBySql($fansnu));
                                echo $numFAN; ?></strong>粉丝</a>

        </div>

        <div class="fazhaopian">
          <ul>
            <li>
              <a href="<?php echo Yii::app()->createUrl('album/upload'); ?>" style="padding-left:15px;">分享照片</a> &nbsp;|
              <a href="<?php echo Yii::app()->createUrl('album'); ?>" style="padding-left:15px;">图片首页</a>
            </li>
          </ul>

        </div>

        <div class="unit">
          <div id="task_start_tip">用照片记录生活<br />将定格的美好分享
            <div class="cls"></div>
          </div>
        </div>
        

      </div>
    </div>
    <!-- 个人资料结束，图片瀑布流开始 -->
    <?php }?>

  	<div class="pinview-right">
  		<div class="wt clearfix">
  			<div id="pin_action_buttons" style="display:block" class="actions clearfix">
  			<a href="<?php echo Yii::app()->createUrl('album/zan',array('id'=>$model->id)); ?>" class="like btn-with-icon btn btn14"><i class="class"></i><span class="text"> 赞 <?php echo $model->like; ?></span></a><!-- <a href="#PinPinner"><span class="comments-count count btn wbtn"><i></i>评论</span></a> -->标签：<a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>$model->photo_cate_id)); ?>"><?php echo $model->cate->cate_name; ?></a>
  			</div>
  			<div id="pin_img" class="pin-img clearfix">
	  			<a href="" target="_blank" class="jd-link">
	  			<img src="<?php echo $model->album_img; ?>" alt="<?php echo $model->name; ?>"></a>
          <div id="pin_view_arrows" style="top: 50%;">
            <a title="上一张" href="<?php echo $next->id?$this->createUrl('/album/view', array('id'=>$next->id)):'javascript:void(0)'; ?>" target="_self" class="prev x self "></a>
            <a title="下一张" class="next x self " href="<?php echo $prev->id?$this->createUrl('/album/view', array('id'=>$prev->id)):'javascript:void(0)'; ?>" target="_self"></a>
            
          </div>
  			</div>

		<!-- <div class="clearfix">
			<div class="stats">
				<a data-id="122791427" href="#" onclick="return false;" class="like count likes-count btn-with-icon btn btn14"><i class="class"></i><span class="text"> 赞</span></a>
				<span class="comments-count count btn wbtn"><i></i>评论</span>
			</div>
			<br/>
		</div> -->
		</div>

		<div class="wt clearfix">
<!-- 上传者信息 -->
			<div id="PinPinner" style="border-bottom: 1px solid #EDEDED;">
				<a id="PinnerImage" href="" class="img">
				<img src="<?php echo $model->user->photo; ?>"></a>
				<p id="PinnerName"><a href=""><?php echo $model->user->nickname; ?></a><span class="less">&nbsp;于&nbsp;</span><a href=""><?php date_default_timezone_set('PRC');//设置默认时区
                                echo date('y年m月d日',$model->create_time); ?></a></p>
				<div id="PinnerStats" class="less"><span data-ts="1385970718" class="ts-words"><?php date_default_timezone_set('PRC');//设置默认时区
          echo date('H:i:s',$model->create_time); ?></span>上传&nbsp;
				</div>
		  </div>
      <!-- 上传者信息结束，评论列表开始 -->

		<!-- <div id="pin_comments">
			<div id="pin_caption" class="pin-caption">
				<p class="text"><br>塔普伦寺，吴哥，柬埔寨。</p>
			</div>
		</div>

		<div id="PinAddComment" class="clearfix"><div id="PinInputArea"><a href="/sspujnkbpz/" title="熙源" class="img x"><img src="http://img.hb.aicdn.com/23a58517fb73f86bca85937f069724486b3e00a44caa-GMc99I_sq75" class="avatar"></a><div class="InputContainer"><textarea id="CloseupComment" name="caption" placeholder="添加评论或把采集@给好友" class="clear-input"></textarea></div><div id="PinAddCommentControls" style="display:none;"><a id="PostComment" href="#" onclick="return false;" class="disabled btn btn14 wbtn"><strong> 添加评论</strong><span></span></a></div></div></div> -->


		</div>

		
	</div>


</div>
