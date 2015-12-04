<div class="main clearfix">
            <!--左边left 开始-->
    <?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->
<div style="color:red;">
<?php
if(Yii::app()->user->hasFlash('quxiao')){
    echo Yii::app()->user->getFlash('quxiao');}?>
</div>

<div class="article">
                <div class="menu">
    <a href="#" class="on">我的收藏</a>
</div>
<div class="box-blue margin-10">
    <a href=""class="bold">收藏的感觉(<?php echo $count;?>)</a> ┆
    <a href="<?php echo Yii::app()->createUrl('user/mystore'); ?>">收藏的图片(<?php
                                echo $count = Picshoucang::model()->countByAttributes(array('pic_uid'=>Yii::app()->user->id));?>)</a>
</div>

<div class="pubu clearfix">

<?php foreach ($model as $_v) {?>
    <div class="pin">
        <a class="img" href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->sixiangid)); ?>" title="<?php echo $_v->sixiang->title; ?>" style="background-image:url(<?php echo $_v->sixiang->img; ?>)" target="_blank">
        </a>
        <p class="title" title="<?php echo $_v->sixiang->title; ?>">
        <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->sixiangid)); ?>" target="_blank"><?php echo $_v->sixiang->title; ?></a>
        </p>
        <p class="title">
        <?php echo $_v->sixiang->click; ?>浏览&nbsp;&nbsp;
        <a onclick="return confirm('确定取消收藏《<?php echo $_v->sixiang->title; ?>》? T_T ~?')" href="<?php echo Yii::app()->createUrl('user/quxiao',array('id'=>$_v->id)); ?>" style="float:right">取消收藏</a>
        </p>

        <div class="member">
        <a title="<?php echo $_v->sixiang->users->nickname; ?>" href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->sixiang->author_id)); ?>" target="_blank">
        <img src="<?php echo $_v->sixiang->users->photo; ?>">
        </a>
        <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$_v->sixiang->author_id)); ?>" target="_blank">
        <!-- 多表关联，前提是model里面定义好了relation -->
        <?php echo $_v->sixiang->users->nickname; ?></a>&nbsp;<br>发布于:&nbsp;
        <?php
        date_default_timezone_set('PRC');//设置默认时区
        echo date('Y-m-d',$_v->sixiang->create_time);//时间戳转化date() ?>
        </div>
    </div>

<?php }?>


</div>


</div>
</div>