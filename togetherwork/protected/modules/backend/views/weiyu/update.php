<div class="right">

<ul class="tabui">
	<li class="on"><a>修改微语</a></li>
	<li style="float:right;"><a href="<?php echo Yii::app()->createUrl('backend/weiyu/index'); ?>">【返回】</a></li>
</ul>

<div class="table-ui">
<br>
  <?php $form = $this->beginWidget('CActiveForm'); ?>
    <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="#DBEAF5">
      <tbody>
        <tr></tr>
        <tr><td width="16%" height="25" bgcolor="ffffff" class="td_a">内容</td><td bgcolor="ffffff" class="td_b">
        <?php echo $form->textArea($model,'weiyu_content',array('cols'=>65,'rows'=>10,'class'=>'input_area')); ?>
</td></tr></tbody></table>    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
    <tbody><tr> 
      <td height="25" bgcolor="#FFFFFF" class="td_a">&nbsp;</td>
      <td height="25" bgcolor="#FFFFFF" class="td_b"> <input type="submit" value="修改信息" class="input_a">
      </td>
    </tr>
    </tbody></table>
<?php $this->endWidget(); ?>
</div>
</div>