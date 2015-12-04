<div class="right">
<ul class="tabui">
	  <li class="on"><a href="">用户管理</a></li>
	  <!-- <li><a href="">美图</a></li>
	  <li><a href="">短句</a></li>
	  <li><a href="">日记</a></li> -->
	</ul>

<br>

<div class="r_uinfo">
    <h2>用户列表，共 <?php echo $cnt; ?> 名会员</h2>
  <div class="clear"></div>
    
</div>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
			     <tbody><tr class="table_title">
				    <th width="30" class="m_title"><div align="left">UID</div></th>
					<th width="150"><div align="left">账号</div></th>
					<th width="100"><div align="left">操作</div></th>
					<th width="130"><div align="left">昵称</div></th>
					<th width="150"><div align="left">注册时间</div></th>
					<th width="150"><div align="left">上次登录时间</div></th>
					<th width="160"><div align="center">感觉/微语/美图</div></th>
					<th width="40"><div align="left">关注</div></th>
					<th width="40"><div align="left">粉丝</div></th>
				   </tr>
				  <tr class="table_hover">
				  	<?php
            $i=1;
            foreach ($users as $_u) {
            ?>
					<td class="m_title"><?php echo $_u->id; ?></td>
					<td class="tt_title">
					      <a href="" target="_blank"><?php echo $_u->username; ?></a> 					
					</td>
					<td class="fun_con">
					    <a class="f_look mtop" href="<?php echo Yii::app()->createUrl('backend/user/info',array('uid'=>$_u->id)); ?>" title="详情" target="_blank">详情</a>
						<a class="f_novisit mtop" href="" title="删除用户">删除</a>
						<a class="f_password mtop" href="" title="修改密码">重设密码</a>
					</td>
					<td><?php echo $_u->nickname; ?></td>
					<td><?php
                    date_default_timezone_set('PRC');//设置默认时区
                    echo date('Y-m-d H:i:s',$_u->regtime);//时间戳转化date() ?></td>
					<td><?php
                    date_default_timezone_set('PRC');//设置默认时区
                    echo date('Y-m-d H:i:s',$_u->update_time);//时间戳转化date() ?></td>
					<td><div align="center"><?php
                                echo $ct = Article::model()->countByAttributes(array('author_id'=>$_u->id));?>/<?php
                                echo $ct2 = Weiyu::model()->countByAttributes(array('create_user_id'=>$_u->id));?>/<?php
                                echo $ct3 = Album::model()->countByAttributes(array('user_id'=>$_u->id));?></div></td>
					<td><?php 
                                $shui = $_u->id;
                                $gznu = "select * from {{follow}} where uid=$shui";
                                $numGZ = count(Follow::model()->findAllBySql($gznu));
                                echo $numGZ; ?></td>
					<td><?php 
                                $byshui = $_u->id;
                                $fansnu = "select * from {{follow}} where touid=$byshui";
                                $numFAN = count(Follow::model()->findAllBySql($fansnu));
                                echo $numFAN; ?></td>

				   </tr>

			<?php
            $i++; 
            }?>
				   				   



	</tbody></table>
            
        <?php echo $page_list; ?>   
 
</div>