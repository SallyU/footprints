<div class="right">
<ul class="tabui">
	  <li><a href="<?php echo Yii::app()->createUrl('backend/article/index'); ?>">感觉</a></li>
	  <li><a href="">美图</a></li>
	  <li class="on"><a href="<?php echo Yii::app()->createUrl('backend/weiyu/index'); ?>">微语</a></li>
	  <li><a href="">日记</a></li>
	</ul>

<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablestyle">
    <tbody><tr>
            <td height="50" width="176" align="left"> 
              <input type="button" value="增加信息" class="input_a">
                        </td>
      <td><div align="left">&nbsp;搜索： 
          <input name="keyboard" type="text" value="" class="input_b">
          <input type="submit"  value="搜索" class="input_a">
        </div></td>
    </tr>
  
</tbody></table>

<table width="100%" border="0" cellpadding="3" cellspacing="0" class="tablestyle">
  <tbody><tr class="header"> 
    <td width="50%" height="40"> <div align="center">内容</div></td>
    <td width="13%"> <div align="center">发布时间</div></td>
  <td width="17%"> 
      <div align="center">操作</div></td>
  </tr>
  <?php foreach ($weiyu as $_v) {?>
    <tr bgcolor="#FFFFFF" id="news773"> 
    <td height="40"> <div align="left">【<?php echo $_v->userid->nickname; ?>】：&nbsp;<?php echo $_v->weiyu_content; ?>
    
         
      </div></td>
    <td> <div align="center"><?php date_default_timezone_set('PRC');
                                    echo date('Y-m-d',$_v->create_time); ?></div></td>
  <td><div align="center"><a href="<?php echo Yii::app()->createUrl('backend/weiyu/update',array('id'=>$_v->id)); ?>">修改</a> | <a href="<?php echo Yii::app()->createUrl('backend/weiyu/delete',array('id'=>$_v->id)); ?>" onclick="return confirm('确认要删除?');">删除</a> 
    </div></td>
  </tr>
<?php } ?>
    <tr bgcolor="#FFFFFF"> 
    <td height="40" colspan="3"> 
    <?php echo $page_list; ?> 
          </td>
  </tr>
</tbody></table>

</div>