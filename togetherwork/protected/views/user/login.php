<style type="text/css">
    label  .required {color:red;}
</style>


<div class="main">
	<section class="container clearfix">
		<h3 style="color: #FE5214;">你不在的日子，足迹一直为你守候你的那份净土 ^_^ ，想起我的时候，这里已是满园芬芳</h3>
		<br> 
		<div class="wp-pagenavi clearfix"></div>
		<div class="eight columns">
			<?php $form = $this -> beginWidget('CActiveForm'); ?>
		<div class="item"><div class="wenzi">
			<?php echo $form->labelEx($user_login,'username'); ?></div>
			<?php echo $form->textField($user_login,'username',array('placeholder'=>'例如：qukaiyuan1234','class'=>'basic-input','maxlength'=>32)); ?>
		<span class="error-tip" style="display: inline; ">
        	<?php echo $form ->error($user_login,'username'); ?></span>
        </div>

	
		<div class="item"><div class="wenzi">
			<?php echo $form->labelEx($user_login,'password'); ?></div>

			<?php echo $form->passwordField($user_login,'password',array('class'=>'basic-input','placeholder'=>'例如：123456','maxlength'=>32)); ?>
		<span class="error-tip" style="display: inline; ">
        	<?php echo $form ->error($user_login,'password'); ?></span>
        </div>

		<div class="item"><div class="wenzi">
        	<label>&nbsp;</label></div>
        	
            <?php echo $form->checkBox($user_login,'rememberMe',array('class'=>'checkbox')); ?>
            <p class="remember">
            <?php echo $form->label($user_login,'rememberMe',array('class'=>'remember')); ?>
            | <a href="">忘记密码了</a>
        	</p>
    	</div>

    	<div class="item">
        	<p class="input-block">
				<label>&nbsp;</label>
				<button class="button orange" type="submit" id="submit">登录</button>
			</p>
    	</div>
		<?php $this->endWidget(); ?>
	</div>

	

	<div class="eight columns">
		<center>
		<h3 style="margin-top:20px">>>还没有加入足迹？<a href="./index.php?r=user/register" target="_blank" style="font-size:16px">>立即注册 </a></h3>
		</center>
	</div>

</section>

</div>