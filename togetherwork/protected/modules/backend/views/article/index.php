<div class="right">
<ul class="tabui">
	  <li class="on"><a href="">感觉</a></li>
	  <li><a href="">美图</a></li>
	  <li><a href="<?php echo Yii::app()->createUrl('backend/weiyu/index'); ?>">微语</a></li>
	  <li><a href="">日记</a></li>
	</ul>

<br>
<!-- <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablestyle">
        <form name="searchinfo" method="GET" action="ListInfo.php"></form>
    <tbody><tr>
            <td height="50" width="176" align="left"> 
              <input type="button" name="Submit" value="增加信息" onclick="self.location.href='ChangeClass.php?mid=10';" class="input_a">
                            <input type="button" name="Submit" value="己发布" onclick="self.location.href='ListInfo.php?mid=10&amp;ecmscheck=1';" class="input_a">
                        </td>
      <td><div align="left">&nbsp;搜索： 
          <input name="keyboard" type="text" id="keyboard" value="" class="input_b">
          <input type="submit" name="Submit2" value="搜索" class="input_a">
          <input name="show" type="hidden" id="show" value="0">
          <input name="sear" type="hidden" id="sear" value="1">
          <input name="mid" type="hidden" value="10">
        </div></td>
    </tr>
  
</tbody></table> -->
<div class="r_uinfo">
    <h2>感觉列表</h2>
  <div class="clear"></div>
    
</div>
<br>
<!-- 控制器setFlash建好之后，视图在此处使用 -->
            <?php
                if(Yii::app()->user->hasFlash('success')){
                    echo Yii::app()->user->getFlash('success');
                }
            ?>

            <?php
                if(Yii::app()->user->hasFlash('xiugai')){
                    echo Yii::app()->user->getFlash('xiugai');
                }
            ?>

            <?php
                if(Yii::app()->user->hasFlash('shanchu')){
                    echo Yii::app()->user->getFlash('shanchu');
                }
            ?>

<div class="con_index" style="margin-bottom:10px;">
    <div class="navpage"><div class="clear"></div></div>
    
    <input class="btn_return" type="button" onclick="checkAll('ckeckbox')" value="全选" name="button">
    <input class="btn_del submit" type="button" value="删除" onclick="delblog_all()">
    
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
           <tbody><tr class="table_title">
            <th width="30" class="m_title"><div align="left">操作</div></th>
            <th width="30"><div align="left">ID</div></th>
            <th width="200"><div align="left">标题</div></th>
            <th width="100"><div align="left">作者/uid</div></th>
            <th width="140"><div align="left">关键词</div></th>
            <th width="60"><div align="left">类型</div></th>
            <th width="30"><div align="left">点击</div></th>
            <th width="30"><div align="left">评论</div></th>
            <th width="30"><div align="left">收藏</div></th>
            <th width="140"><div align="left">时间</div></th>
             <th width="60"><div align="left">操作</div></th>
           </tr>
           <?php
            $i=1;
            //遍历传过来的值：$article_infos
            foreach ($article_infos as $_v) {
            ?>
          <tr class="table_hover" id="blog_2">
             <td class="m_title" style="padding-top:13px"><input id="checkbox" class="ckeckbox" type="checkbox" name="delid" delid="2"></td>
              <td><?php echo $_v->id;?></td>
            <td class="tt_title"><a href="" target="_blank"><?php echo $_v->title; ?></a></td>
            <td class="to_title"><a href="" target="_blank"><?php echo $_v->users->nickname; ?>/<?php echo $_v->author_id; ?></a></td>
            <td class="to_title"><?php echo $_v->keywords; ?> </td>
            <td><?php echo $_v->type->type_name; ?></td>
            <td><?php echo $_v->click; ?></td>
            <td><?php
                                //统计评论数量
                                $pl = $_v->id;
                                echo $count = Comment::model()->countByAttributes(array('article_id'=>$_v->id));?></td>
            <td><?php
                                //统计被收藏的数量
                                $sx = $_v->id;
                                echo $count = Shoucang::model()->countByAttributes(array('sixiangid'=>$_v->id));?></td>
            <td><?php
                    date_default_timezone_set('PRC');//设置默认时区
                    echo date('Y-m-d H:i:s',$_v->create_time);//时间戳转化date() ?></td>
            <td class="fun_con mfun">
                <a class="f_edit mtop" href="<?php echo Yii::app()->createUrl('backend/article/update',array('id'=>$_v->id)); ?>" target="_blank">编辑</a> 
              <a class="f_delete mtop" onclick="return confirm('你确定要删除《<?php echo $_v->title; ?> 》?')" href="<?php echo Yii::app()->createUrl('backend/article/delete',array('id'=>$_v->id)); ?>">删除</a></td>
           </tr>
           <?php
            $i++; 
            }?>

           
                  </tbody></table>

   </div>
<input class="btn_return" type="button" onclick="checkAll('ckeckbox')" value="全选" name="button">
<input class="btn_del submit" type="button" value="删除" onclick="delblog_all()">

<?php echo $page_list; ?> 
</div>