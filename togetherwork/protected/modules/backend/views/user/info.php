<div class="right">
<ul class="tabui">
	  <li class="on"><a href="">用户信息</a></li>
	  <!-- <li><a href="">美图</a></li>
	  <li><a href="">短句</a></li>
	  <li><a href="">日记</a></li> -->
	</ul>

<br>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tbody><tr>
				       <td width="90" class="t_title">账号</td>
					   <td class="co_link"><font><a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>$model->id)); ?>" target="_blank"><?php echo $model->username; ?></a></font></td>
				   </tr>
				   <tr>
				       <td width="90" class="t_title">昵称</td>
					   <td class="co_link"><font><?php echo $model->nickname; ?></font></td>
				   </tr>
				   <tr>
				       <td class="t_title">头像</td>
					   <td class="m_avata"><img style="width:60px;height:60px;" src="<?php echo $model->photo; ?>" alt="<?php echo $model->nickname; ?>" title="<?php echo $model->nickname; ?>"></td>
				   </tr>
				   <tr>
				       <td class="t_title">注册时间</td>
					   <td class="c_font"><?php
                    date_default_timezone_set('PRC');//设置默认时区
                    echo date('Y-m-d H:i:s',$model->regtime);//时间戳转化date() ?></td>
				   </tr>
				   <tr>
				       <td class="t_title">最近登陆</td>
					   <td class="c_font"><?php
                    date_default_timezone_set('PRC');//设置默认时区
                    echo date('Y-m-d H:i:s',$model->update_time);//时间戳转化date() ?></td>
				   </tr>
                   <tr>
				       <td class="t_title">足迹社区统计</td>
					   <td class="c_font m_num">
					       感觉/微语/美图(<font><?php
                                echo $ct = Article::model()->countByAttributes(array('author_id'=>$model->id));?>/<?php
                                echo $ct2 = Weiyu::model()->countByAttributes(array('create_user_id'=>$model->id));?>/<?php
                                echo $ct3 = Album::model()->countByAttributes(array('user_id'=>$model->id));?></font>) | 关注(<font><?php 
                                $shui = $model->id;
                                $gznu = "select * from {{follow}} where uid=$shui";
                                $numGZ = count(Follow::model()->findAllBySql($gznu));
                                echo $numGZ; ?></font>) | 粉丝(<font><?php 
                                $byshui = $model->id;
                                $fansnu = "select * from {{follow}} where touid=$byshui";
                                $numFAN = count(Follow::model()->findAllBySql($fansnu));
                                echo $numFAN; ?></font>)
                       </td>
				   </tr>
                   <tr>
				       <td class="t_title">用户操作</td>
					   <td class="fun_con c_font">
					   	<a class="f_novisit" href="" title="删除用户">删除</a>
						<a class="f_password" href="" title="修改密码">重设密码</a>
						<a class="f_delhead" href="" title="删除头像">删除头像</a>
					   </td>
				   </tr>
                   
			   </tbody></table>





</div>