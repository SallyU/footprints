<div class="right">
<ul class="tabui">
	<li class="on"><a>足迹信箱</a></li>
</ul>
<br>
<div align="center"> 
        <table width="98%" border="0" align="left" cellpadding="3" cellspacing="0" class="tablestyle">
          <form name="listmsg" method="post" action="../../enews/index.php" onsubmit="return confirm('确认要删除?');"></form>
            <tbody>
            <tr class="header"> 
              <td width="4%" height="30"> <div align="center">编号</div></td>
              <td width="45%"><div align="center">内容</div></td>
              <td width="18%"><div align="center">发送者</div></td>
              <td width="23%"><div align="center">发送时间</div></td>
              <td width="10%"><div align="center">操作</div></td>
            </tr>
          <?php foreach ($msg as $_v) {?>
            <tr bgcolor="#FFFFFF">
              <td width="4%" height="30"><?php echo $_v->id; ?></td>
              <td width="45%" height="40">
               <div align="left">对“<?php echo $_v->touser->nickname; ?>”说：<?php echo $_v->content; ?></div>
               </td>
              <td width="18%"><div align="center"><?php echo $_v->senduser->nickname; ?></div></td>
              <td width="23%"> <div align="center"><?php date_default_timezone_set('PRC');echo date('Y-m-d',$_v->time); ?></div></td>
              <td width="10%"><div align="center"><a href="<?php echo Yii::app()->createUrl('backend/msg/delete',array('id'=>$_v->id)); ?>" onclick="return confirm('确认要删除?');">删除</a></div></td>
            </tr>
          <?php } ?>
            <tr bgcolor="#FFFFFF"> 
              <td height="30" colspan="5">
              <div align="center">
              <!-- 说明：<img src="../../data/images/nohaveread.gif" width="14" height="11"> 
                  代表未阅读信息，<img src="../../data/images/haveread.gif" width="15" height="12"> 
                  代表已阅读信息 -->
              <?php echo $page_list; ?>
                  </div>
              </td>
            </tr>
          
        </tbody></table>
      </div>
</div>