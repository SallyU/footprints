<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>足迹管理登录</title>
<LINK rel=icon type=image/x-icon href="<?php echo IMG_URL; ?>favicon.ico">
<LINK rel=stylesheet type=text/css href="<?php echo BACKEND_CSS_URL; ?>login.css">
<style type="text/css">
	div .errorMessage {clear: both;margin: -20px 0 0 330px;color: red;}
</style>
</head>
<body class="login_new">
<div class="wrapper">
  <center>
  <div class="login_main">
    <div>
     <h1><a href="./index.php?r=index" target="_blank"><img src="<?php echo IMG_URL; ?>logo.png"></a></h1>
     <h3><img src="<?php echo BACKEND_IMG_URL; ?>login_h.png"></h3>
    </div>
        <?php $form = $this->beginWidget('CActiveForm'); ?>
       <div>
        <?php echo $form->textField($login_model,'username',array('maxlength'=>20,'class'=>'txt l_text gray1','placeholder'=>'请输入管理员账号')); ?>
      </div>
      <div>
        <?php echo $form->error($login_model,'username'); ?>
      </div>
      <div>
        <?php echo $form->passwordField($login_model,'password',array('class'=>'txt l_password','maxlength'=>20,'placeholder'=>'请输入密码')); ?>
      </div>
      <div>
        <?php echo $form->error($login_model,'password',array('class'=>'errorMessage')); ?>
      </div>
    <div class="login_foot">
		  <button class="l_botton" type="submit">登录</button>
    </div>
    <?php echo $this->endWidget(); ?>
  </div>
  </center>   
</div>
</body>
</html>
