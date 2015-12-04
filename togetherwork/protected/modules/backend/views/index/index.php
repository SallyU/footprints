<div class="right">
    <div class="r_uinfo">
      <ul>
        <li class="rtop"><strong>欢迎您：<?php echo Yii::app()->user->name;?></strong>&nbsp;(超级管理员)&nbsp;<!-- <a href="" class="color">编辑资料</a> -->
        <p>上次登录时间：<?php
                    date_default_timezone_set('PRC');//设置默认时区
                    echo date('Y-m-d H:i:s',Yii::app()->user->createtime);//时间戳转化date() ?>        </p>
        </li>
        <li class="list"><a href="<?php echo Yii::app()->createUrl('backend/article/index'); ?>">感觉:&nbsp;<?php echo count(Article::model()->findAll()); ?>篇</a></li>
        <li class="list"><a href="<?php echo Yii::app()->createUrl('backend/weiyu/index'); ?>">微语:&nbsp;<?php echo count(Weiyu::model()->findAll()); ?>句</a></li>
        <li class="list"><a href="<?php echo Yii::app()->createUrl('backend/user/index'); ?>">注册会员:&nbsp;<?php echo count(User::model()->findAll()); ?>名</a></li>
        <li class="list"><a href="">美图:&nbsp;<?php echo count(Album::model()->findAll()); ?>张</a></li>
        <!-- <li class="list">余额:0.00元</li>
        <li class="list">短信:无</li> -->
    </ul>
	<div class="clear"></div>
    
</div>
<ul class="tabui">
    <li class="on"><a href="">服务器信息</a></li>
</ul>

<div class="table-ui">

<br> 
<table width="90%" border="0" align="left" cellpadding="3" cellspacing="0" class="tablestyle">

  <tbody><tr bgcolor="#FFFFFF">
    <td height="25" width="16%" class="td_a">PHP版本：</td>
    <td height="25" class="td_b"><?php echo PHP_VERSION; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">MySQL版本：</td>
    <td height="25" class="td_b"><?php echo mysql_get_server_info();?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="33%" height="25" class="td_a">服务器IP地址：</td>
    <td width="67%" height="25" class="td_b"><?php echo $_SERVER['SERVER_ADDR']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">服务器时间：</td>
    <td height="25" class="td_b"><?php 
            date_default_timezone_set("PRC");
            echo gmdate("y年m月d日 h:i:s",time());?>&nbsp;(格林威治标准时间)&nbsp;&nbsp;<?php echo gmdate("y年n月j日 h:i:s",time()+8*3600)?>&nbsp;(北京时间)</td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">服务器解译引擎：</td>
    <td height="25" class="td_b"> <?php echo($_SERVER["SERVER_SOFTWARE"]); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">服务器操作系统文字编码：</td>
    <td height="25" class="td_b"><?php echo($_SERVER["HTTP_ACCEPT_LANGUAGE"]); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">服务端剩余空间：</td>
    <td height="25" class="td_b"><?php echo intval(diskfreespace(".") / (1024 * 1024)).'mb';?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">操作系统：</td>
    <td height="25" class="td_b"><?php $os = explode(" ", php_uname()); echo $os[0]; echo "&nbsp;&nbsp;";
                if ($os[0] =="windows") {echo "主机名称：".$os[2];} else {echo "内核版本：".$os[2];}?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">物理路径：</td>
    <td height="25" class="td_b"><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">gzip压缩：</td>
    <td height="25" class="td_b"><?php echo $_SERVER['HTTP_ACCEPT_ENCODING']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">系统管理员：</td>
    <td height="25" class="td_b"><?php echo $_SERVER['SERVER_ADMIN']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" class="td_a">系统当前用户名：</td>
    <td height="25" class="td_b"><?php echo @get_current_user();?></td>
  </tr>
</tbody></table>
<br>
</div>
</div>
    

</div>