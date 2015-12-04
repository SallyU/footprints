<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Create</title>
    <link rel="stylesheet" href="<?php echo BACKEND_CSS_URL; ?>main.css">
<style type="text/css">
    div .errorMessage{color:red;}
    label .required {color:red;}
</style>
</head>
<body>
<!-- <form action="" method="post" name=""> -->
<?php $form = $this->beginWidget('CActiveForm', array('enableClientValidation'=>true)); ?>
<div id="main">
    <div id="position">
        &nbsp;您当前的位置-&gt;添加新文章
    </div>
    <div id="container">
        <div class="tr-1">
        <div class="td-1">
            <!-- 标题： -->
            <?php echo $form->labelEx($model,'title'); ?>
            </div>
            <div class="td-2">
            <!-- <input name="name" style="width: 350px;" type="text"> -->
            <?php echo $form->textField($model,'title',array('size'=>30)); ?>
            <?php echo $form->error($model,'title'); ?>
            </div>
            <div class="td-3">
            <span class="must">&nbsp;*&nbsp;</span>请填写少于20个字.
            </div>
        </div>

        <div class="tr-1">
            <div class="td-1">
            <!-- 作者： -->
            <?php echo $form->labelEx($model,'author'); ?>
            </div>
            <div class="td-2">
            <!-- <input name="name" style="width: 150px;" type="text"> -->
            <?php echo $form->textField($model,'author',array('size'=>30)); ?>
            </div>
            <div class="td-3">
            <span class="must">&nbsp;*&nbsp;</span>请填写少于6个字.
            </div>
        </div>

        <div class="tr-1">
            <div class="td-1">
            <!-- 描述: -->
            <?php echo $form->labelEx($model,'des'); ?> 
            </div>
            <div class="td-2">
            <!-- <textarea style="width: 550px; height: 40px"></textarea> -->
            <!--textArea($model,$attribute,$htmlOptions=array())-->
            <?php echo $form->textArea($model,'des',array('cols'=>80,'rows'=>2)); ?>

            </div>
            <div class="td-3">
            </div>
        </div>


        <div class="tr-2">
            <div class="td-1">
            <!-- 内容: --> 
            <?php echo $form->labelEx($model,'content'); ?>
            </div>
            <div class="td-2">
			<!-- <textarea style="width: 800px; height: 300px"></textarea> -->
            <?php echo $form->textArea($model,'content',array('cols'=>110,'rows'=>19)); ?>
			</div>
            <div class="td-3">
            </div>
        </div>
        <div class="tr-3">
            <div class="td-1">
            </div>
            <div class="td-2">
            <input name="button" value="添加" style="border: 0px none; height: 20px; width: 50px; background: none repeat scroll 0% 0% rgb(132, 204, 201); color: white;" type="submit">
            </div>
            <div class="td-3">
            注意：<span class="must">&nbsp;*&nbsp;</span>部分为必须填写的内容.
            </div>
        </div>
    </div>

</div>
<!-- </form> -->
<?php $this->endWidget(); ?>





</body></html>