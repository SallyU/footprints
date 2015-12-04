<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->
<div class="edit">
    <div class="menu">
                    <a href="" class="on">修改感觉</a>
                </div>
                <?php $form = $this->beginWidget('CActiveForm'); ?>
                <ul class="fabu">
                    <h3 style="font-size: 1.5em;font-weight: bold;padding: 5px 0;" class="margin-10">标题</h3>
                    <?php echo $form->textField($model,'title',array('size'=>40,'maxlength'=>40,'class'=>'input')); ?>
                    <h3 class="margin-10" style="font-size: 1.5em;font-weight: bold;padding: 5px 0;">所属分类&nbsp;<?php echo $form->dropDownList($model,'type_id',Type::model()->getTypesList(),array('class'=>'select2')); ?>
                    </h3>
                    <li class="text-fa">
                        <?php echo $form->textArea($model,'des',array('cols'=>45,'rows'=>3,'maxlength'=>50)); ?> (简单的描述或摘要)
                    </li><br/>
                    <li class="text-fa">
                        <?php echo $form->textArea($model,'content',array('cols'=>45,'rows'=>15)); ?>
                    </li>
                    <li>
                        <?php echo $form->textField($model,'keywords',array('size'=>40,'maxlength'=>8,'class'=>'input')); ?>(文章关键词，多个用逗号隔开，最多2个)
                    </li><br/>
                    <li>
                        <input type="submit" class="button-blue" value="提交">
                        <input type="button" value="返回" onclick="javascript:history.back(-1);" class="button-gray">
                    </li>
                </ul>
                <?php $this->endWidget(); ?>

</div>

<div class="aside clearfix" style="margin-top:20px">
                <div class="box-blue h22">将生活中的每集情节，细细品味：伤心时的泪，开心时的媚，成功时的奋都因追求而可贵，因留恋而陶醉。<br><br>用心感受生活，我们都是有故事的人！
                </div>

                <div class="box-blue h22 margin-10">为了首页显示丰富，在此不支持封面图片修改，小丫丫们最好在发表思想的时候添加好封面哦！ ^_^<br>
                <span style="color:#808000"></span>
                </div>

</div>