<div class="right">
<ul class="tabui">
	  <li class="on"><a href="<?php echo Yii::app()->createUrl('backend/article/index'); ?>">感觉</a></li>
	  <li><a href="">美图</a></li>
	  <li><a href="">短句</a></li>
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

<!-- 控制器setFlash建好之后，视图在此处使用 -->
<?php $form = $this->beginWidget('CActiveForm'); ?>            
 <div style="font-size:16px;">
        &nbsp;您当前的位置-&gt;修改文章《<?php echo $article_model->title; ?> 》
    </div>           
            
<div class="con_index" style="margin-bottom:10px;">
    <div class="navpage"><div class="clear"></div></div>

    
    
    <div id="container">
        <div class="tr-1">
        <div class="td-1">
            <!-- 标题： -->
            <?php echo $form->labelEx($article_model,'title'); ?>
            </div>
            <div class="td-2">
            <!-- <input name="name" style="width: 350px;" type="text"> -->
            <?php echo $form->textField($article_model,'title',array('size'=>30)); ?>
            </div>
            <div class="td-3">
            <span class="must">&nbsp;*&nbsp;</span>请填写少于20个字.
            </div>
        </div>

        <div class="tr-1">
            <div class="td-1">
            <?php echo $form->labelEx($article_model,'author'); ?>
            </div>
            <div class="td-2">
            <?php echo $form->textField($article_model,'author',array('size'=>30)); ?>
            </div>
            <div class="td-3">
            <span class="must">&nbsp;*&nbsp;</span>请填写少于6个字.
            </div>
        </div>

        <div class="tr-1">
            <div class="td-1">
            <?php echo $form->labelEx($article_model,'des'); ?>
            </div>
            <div class="td-2">
            <?php echo $form->textArea($article_model,'des',array('cols'=>80,'rows'=>2)); ?>
            </div>
            <div class="td-3">
            </div>
        </div>


        <div class="tr-2">
            <div class="td-1">
            <?php echo $form->labelEx($article_model,'content'); ?>
            </div>
            <div class="td-2">
            <?php echo $form->textArea($article_model,'content',array('cols'=>110,'rows'=>19)); ?>
            </div>
            <div class="td-3">
            </div>
        </div>
        <div class="tr-3">
            <div class="td-1">
            </div>
            <div class="td-2">
            <input name="button" value="修改" style="border: 0px none; height: 20px; width: 50px; background: none repeat scroll 0% 0% rgb(132, 204, 201); color: white;" type="submit">
            </div>
            <div class="td-3">
            注意：<span class="must">&nbsp;*&nbsp;</span>部分为必须填写的内容.
            </div>
        </div>
    </div>
<!-- </form> -->
<?php $this->endWidget(); ?>

   </div>
</div>