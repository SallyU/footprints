<style type="text/css">
label  .required {color:red;}
.aside3 {
float: left;
overflow: hidden;
}
.h223 {
line-height: 22px;
}
.box-blue3 {
background-color: #F0FCFF;
border: 1px solid #DBECFC;
display: block;
padding: 6px;
}
</style>

<div class="main">	

		<section class="container clearfix">
			
			<div class="four columns">
				
				<div class="widget_contacts">

					<h3 class="widget-title">已经拥有 账号？</h3>			

					<ul class="our-contacts">
						<li>
							<a href="./index.php?r=user/login"><b style="font-size:18px;">>赶快登录吧！^_^~</b></a>
						</li>

					</ul>
				<br>

				<div class="aside3 clearfix">
                	<div class="box-blue3 h223">将生活中的每集情节，细细品味：伤心时的泪，开心时的媚，成功时的奋都因追求而可贵，因留恋而陶醉。<br><br>用心感受生活，我们都是有故事的人！</div>
					
				<br>
                	<div class="box-blue3 h223 margin-10">加入我们，分享你心中的那个故事 ^_^<br><br>当发布的故事与足迹小友们产生共鸣时，你会收到意外的惊喜 ^_^<br><br><span style="color:#808000">&nbsp;&nbsp;我们都是有故事的人<a href=""> &nbsp;</a></span></div>
            </div>

				</div>
				
			</div>
			
			<div class="twelve columns">

				<div id="contact">

					<h3 class="widget-title">轻松 注册</h3>
					<?php $form=$this->beginWidget('CActiveForm',array('enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>

						<div class="item">
							<div class="wenzi">
							<?php echo $form->labelEx($user_model, 'username'); ?>
							</div>
							<?php echo $form->textField($user_model,'username',array('placeholder'=>'例如：qukaiyuan1234','class'=>'basic-input','maxlength'=>32)); ?>
						
						<span class="error-tip" style="display: inline; ">
							<?php echo $form ->error($user_model,'username'); ?>
						</span>
						</div>

						<div class="item"><div class="wenzi">
							<?php echo $form->labelEx($user_model, 'nickname'); ?></div>
							<?php echo $form->textField($user_model,'nickname',array('class'=>'basic-input','placeholder'=>'例如：熙源','maxlength'=>24)); ?>
						<span class="error-tip" style="display: inline; ">
        					<!--表单验证失败显示错误信息-->
        					<?php echo $form ->error($user_model,'nickname'); ?></span>
						</div>

						<div class="item"><div class="wenzi">
							<?php echo $form->labelEx($user_model,'password'); ?></div>
							<?php echo $form->passwordField($user_model,'password',array('class'=>'basic-input','placeholder'=>'例如：123456','maxlength'=>32)); ?>
						<span class="error-tip" style="display: inline; ">
        					<?php echo $form ->error($user_model,'password'); ?></span>
						</div>

						<div class="item"><div class="wenzi">
							<?php echo $form->labelEx($user_model,'passwordConfirm'); ?></div>
							<?php echo $form->passwordField($user_model,'passwordConfirm',array('class'=>'basic-input','placeholder'=>'两次密码请输入的一致','maxlength'=>32)); ?>
						<span class="error-tip" style="display: inline; ">
        					<?php echo $form ->error($user_model,'passwordConfirm'); ?></span>
						</div>

						<div class="item"><div class="wenzi">
							<?php echo $form->labelEx($user_model, 'email'); ?></div>
							<?php echo $form->textField($user_model,'email',array('class'=>'basic-input','placeholder'=>'例如:yy@qukaiyuan.com','maxlength'=>50)); ?>
						<span class="error-tip" style="display: inline; ">
							<?php echo $form ->error($user_model,'email'); ?></span>
						</div>

						<div class="item"><div class="wenzi">
							<?php echo $form->labelEx($user_model, 'photo'); ?></div>
							<?php echo CHtml::activeFileField($user_model,'photo'); ?>
						<span class="error-tip" style="display: inline; "></span>
						</div>

						

						<div class="item"><div class="wenzi">
							<?php echo $form->labelEx($user_model,'verifyCode'); ?></div>
							<?php $this->widget('CCaptcha', array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'看不清楚？点击获取新的验证码','style'=>'cursor:pointer'))); ?>
							<?php echo $form->textField($user_model,'verifyCode',array('class'=>'verify','id'=>'verify','maxlength'=>4,'placeholder'=>'请输入图片上的字符~')); ?>
						<span class="error-tip" style="display: inline; ">
							<?php echo $form ->error($user_model,'verifyCode'); ?></span>
						</div>
						
						<p class="input-block">
							<label>&nbsp;</label>
							<button class="button orange" type="submit" id="submit">注册</button>
						</p>
						
					<?php $this->endWidget(); ?>			   

				</div><!--/ #contact-->
					
			</div><!--/ .twelve .columns-->
			


		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->
