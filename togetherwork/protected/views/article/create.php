<style type="text/css">
    div .errorMessage{color:red;}
    label .required {color:red;}
</style>

<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->   



<!-- 右边开始 -->
<div class="article"><div class="banner1"></div>
    <div class="m-menu"><span style="color:red;float:left;">* 禁止发表政治、反动、色情、低俗、以及带人身攻击或与主题无关的内容，否则将禁止帐号发布内容</span>
        <ul>
            <li class="new">
                <a href="#">查看我的感觉</a> |
                <a href="./index.php?r=article">查看大家的感觉</a><!-- cate -->
            </li>
        </ul>
    </div>
    <div class="thinking">
        <div class="fabu">
            <?php $form=$this->beginWidget('CActiveForm',array('enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
                    <h2 style="padding: 3px 0;letter-spacing: -1px;font-size: 1.5em;"><?php echo $form->labelEx($model,'title'); ?></h2>
                    <div class="text-fa">
                        <?php echo $form->textField($model,'title',array('size'=>30,'class'=>'blog_title')); ?>
                        <?php echo $form->error($model,'title'); ?>
                    </div>

                    <h2 style="padding: 3px 0;letter-spacing: -1px;font-size: 1.5em;"><?php echo $form->labelEx($model,'type_id'); ?></h2>
                    <div>
                        <?php echo $form->dropDownList($model,'type_id',Type::model()->getTypesList(),array('class'=>'select')); ?>
                    </div>

                    <h2 style="padding: 3px 0;letter-spacing: -1px;font-size: 1.5em;">
                        <?php echo $form->labelEx($model,'des'); ?></h2>
                    <div class="text-fa">
                        <?php echo $form->textArea($model,'des',array('rows'=>4,'class'=>'blog_title')); ?>
                        <?php echo $form->error($model,'des'); ?>
                    </div>

                    <h2 style="padding: 3px 0;letter-spacing: -1px;font-size: 1.5em;">
                        <?php echo $form->labelEx($model,'img'); ?></h2>
                    <div>
                        <?php echo CHtml::activeFileField($model,'img'); ?>
                    </div>





                    <h2 style="padding: 3px 0;letter-spacing: -1px;font-size: 1.5em;"><?php echo $form->labelEx($model,'content'); ?></h2>
                    <?php
                    $this->widget('application.extensions.editor.CKkceditor',array(
                            "model"=>$model,                # Data-Model
                            "attribute"=>'content',         # Attribute in the Data-Model
                            "height"=>'400px',
                            "width"=>'98%',
                            "filespath"=>Yii::app()->basePath."/../up/",
                            "filesurl"=>Yii::app()->baseUrl."/up/",
                        ) ); ?>

                    <h2 style="padding: 3px 0;letter-spacing: -1px;font-size: 1.5em;"><?php echo $form->labelEx($model,'keywords'); ?></h2>
                    <div class="text-fa">
                        <?php echo $form->textField($model,'keywords',array('size'=>30,'class'=>'blog_title')); ?>
                        <?php echo $form->error($model,'keywords'); ?>
                    </div>

                    <input type="submit" class="button-blue"  value="确 定" style="margin-top:10px;">
            <?php $this->endWidget(); ?>
                    
        </div>
    </div>

</div>



</div> 

             
   