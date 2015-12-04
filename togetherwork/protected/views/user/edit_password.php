<style type="text/css">
    div .errorMessage{color:red;}
    label  .required {color:red;}
</style>

<div class="main clearfix">
            <!--左边left 开始-->
    <?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->

<div class="article">
                <div class="menu">
                    <a href="./index.php?r=user/myprofile" >详细资料</a>
                    <a href="" class="on">修改密码</a>
                    <a href="<?php echo Yii::app()->createUrl('usertags/usertags'); ?>">个人标签</a>
                    <!-- <a href="">隐私设置</a> -->
                </div>


                <?php $form = $this->beginWidget('CActiveForm'); ?>
                <table cellspacing="0" cellpadding="2" class="margin-20 table" width="100%">
                            <tbody><tr>
                                <td width="102" align="right"><?php echo $form->label($model,'oldpass'); ?></td>
                                <td><?php echo $form->passwordField($model,'oldpass'); ?><?php echo $form->error($model,'oldpass'); ?></td>
                            </tr>
                            <tr>
                                <td align="right"><?php echo $form->label($model,'newpass'); ?></td>
                                <td><?php echo $form->passwordField($model,'newpass'); ?></td>
                            </tr>
                            <tr>
                                <td align="right"><?php echo $form->label($model,'newpass2'); ?></td>
                                <td><?php echo $form->passwordField($model,'newpass2'); ?><?php echo $form->error($model,'newpass2'); ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;
                                    </td><td>
                                        <input type="submit" value="确 定" class="button-blue">
                                    </td>
                            </tr>
                        </tbody></table>
                    <?php $this->endWidget(); ?>







</div>




</div>