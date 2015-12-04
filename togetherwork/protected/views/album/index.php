<div class="m-menu">
                    <ul style="margin-left:-50px;">
                        <li class="hot"><img src="<?php echo IMG_URL; ?>album.jpg" /></li>
                        <!-- <li class="new">
                            <a href="<?php echo Yii::app()->createUrl('album/upload'); ?>" style="padding-left:15px;">发照片</a> -->
                    <!-- <a href="">分类管理</a> -->
                    </ul>
                </div>

<!-- Content -->
<section id="wrapper">
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
              <a href="<?php echo Yii::app()->createUrl('album/upload'); ?>" style="padding-left:15px;">分享照片</a>
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
    <?php } ?>
    
    <?php foreach ($model as $_p) {?>
    <div class="grid">
      <div class="imgholder"> <a href="<?php echo Yii::app()->createUrl('album/view',array('id'=>$_p->id)); ?>"><img src="<?php echo $_p->album_img; ?>" /></a> 

      <?php if(!Yii::app()->user->getIsGuest()){?>
                        <?php
                        //收藏与已经收藏判断,不能放在控制器中
                        $userid= Yii::app()->user->id;
                        $picid = $_p->id;
                        // 联合查询同时满足同一主键的数据，如果返回为NULL就是未收藏，否则一经收藏
                        $sql = "select * from {{picshoucang}} where pic_uid=$userid and pic_id=$picid";
                        $sc_sixiang = Picshoucang::model()->findAllBySql($sql);
                         if($sc_sixiang == NULL){?>
                            <a href="<?php echo Yii::app()->createUrl('album/storepic',array('id'=>$_p->id)); ?>" class="img_album_btn"><div>加入专辑</div></a>
                        <?php } else {?>
                            <a class="img_album_btn"><div>已收藏</div></a>
                        <?php }?>
                        <?php } else {?>
                        <a href="<?php echo Yii::app()->createUrl('user/login'); ?>" class="img_album_btn"><div>登录收藏</div></a>
                        <?php }?>
          

      </div>
      <strong><?php echo $_p->name; ?></strong>
      <p>美图来自：<?php echo $_p->user->nickname; ?></p>
      
      <div class="meta">
        <div class="items_likes" style="float:left;">
          <a href="<?php echo Yii::app()->createUrl('album/like',array('id'=>$_p->id)); ?>" id="like_btn" ></a>
          <em style="line-height: 23px;display: block;float: left;padding: 0px 6px;color: #FF6699;font-weight: 800;border: 1px solid #ff6fa6;border-radius: 3px;"><?php echo $_p->like; ?></em>
        </div>
      <a href="<?php echo Yii::app()->createUrl('album/search',array('id'=>$_p->photo_cate_id)); ?>" target="_blank"><?php echo $_p->cate->cate_name; ?></div></a>
    </div>
    <?php }?>
  </div>
</section>
