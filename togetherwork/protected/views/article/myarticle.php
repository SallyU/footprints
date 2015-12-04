<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->

<div class="article">
                <div class="menu">
                    <a href="" class="on">我的感觉</a>
                    <a href="">我回复的感觉</a>
                    <a href="<?php echo Yii::app()->createUrl('article/index'); ?>">感觉大厅</a>
                </div>

                <table width="100%" border="0" cellspacing="0" cellpadding="5" class="table">
                    <tbody>
                        <tr height="26" class="tr">
                            <td>标题</td>
                            <td>所属分类</td>
                            <td>发布时间</td>
                            <td>人气(藏/评/看)</td>
                            <td>操作</td>
                        </tr>

                        <?php foreach ($model as $_v) {?>
                        <tr>
                            <td class="line_r">
                                <a href="<?php echo Yii::app()->createUrl('article/detail',array('id'=>$_v->id)); ?>"><?php echo $_v->title; ?></a>
                            </td>
                            <td class="line_r"><?php echo $_v->type->type_name;?></td>
                            <td class="line_r">
                            <?php
                            date_default_timezone_set('Asia/shanghai');
                            echo date('Y-m-d H:i:s',$_v->create_time);?>
                            </td>
                            <td class="line_r">
                            <?php
                                //统计被收藏的数量
                                $sx = $_v->id;
                                echo $count = Shoucang::model()->countByAttributes(array('sixiangid'=>$sx));?> - 
                            <?php
                                //统计评论数量
                                $pl = $_v->id;
                                echo $count = Comment::model()->countByAttributes(array('article_id'=>$pl));?> - 
                            <?php echo $_v->click;?>
                            </td>
                            <td>
                                <a href="<?php echo Yii::app()->createUrl('article/update',array('id'=>$_v->id)); ?>" class="font-blue">编辑</a> | <a onclick="return confirm('你确定要删除这条感觉么 T_T ~?')" href="<?php echo Yii::app()->createUrl('article/delete',array('id'=>$_v->id)); ?>">删除</a>
                            </td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
</div>

</div>