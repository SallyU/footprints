<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>
<span style="color:red;">* 禁止发表政治、反动、色情、低俗、以及带人身攻击或与主题无关的评论，否则将禁止帐号发布短评</span>
		<?php echo $form->textArea($model,'content',array('rows'=>6)); ?><br>
		<?php echo $form->error($model,'content',array('style'=>"color:red")); ?>

		<span class="clearfix">
		<input type="submit" class="button-blue fr" value="发布">
		</span>

<?php $this->endWidget(); ?>

<!-- form -->