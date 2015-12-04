<style type="text/css">
    div .errorMessage{color:red;}
    label .required {color:red;}
</style>
<div class="main clearfix">
            <!--左边left 开始-->
    <?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->
           

<div class="article">
                <div class="menu">
                    <a href="./index.php?r=user/myprofile">详细资料</a>
                    <a href="" class="on">修改资料</a>
                    <a href="<?php echo Yii::app()->createUrl('user/edit_password'); ?>">修改密码</a>
                    <a href="<?php echo Yii::app()->createUrl('usertags/usertags'); ?>">个人标签</a>
                    <!-- <a href="">隐私设置</a> -->
                </div>
                <div class="box-yellow" style="display:none;">
                    <?php
                    if(Yii::app()->user->hasFlash('xiugai')){
                    echo Yii::app()->user->getFlash('xiugai');}?></div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
                            <tbody><tr>
                                <td align="right" valign="middle">账 号：<span class="font-og">* </span></td>
                                <td colspan="3" valign="middle" class="font-blue bold"><?php echo $model->username; ?><span class="font-gray">(<?php echo $model->email; ?>)</td>
                            </tr>
                        <?php $form = $this->beginWidget('CActiveForm'); ?>
                            <tr>
                                <td align="right" valign="middle"><?php echo $form->labelEx($model,'nickname'); ?></td>
                                <td colspan="3" valign="middle">
                                    <?php echo $form->textField($model,'nickname',array('size'=>25)); ?>
                                    &nbsp;<span style="padding:3px;display:none;" id="write_name_note"></span><span class="font-og">(昵称控制在2-12个字符哦~)</span>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle"><?php echo $form->label($model,'sex'); ?></td>
                                <td colspan="3" valign="middle">
                                    <?php echo $form->radioButtonList($model,'sex',$sex,array('separator'=>'&nbsp;')); ?>
                                </td>
                            </tr>

                            <tr>
                                <td align="right" valign="middle"><?php echo $form->label($model,'qq'); ?></td>
                                <td colspan="3" valign="middle">
                                    <?php echo $form->textField($model,'qq',array('size'=>25,'maxlength'=>11)); ?>
                                    &nbsp;<span style="padding:3px;display:none;" id="write_name_note"></span>
                                </td>
                            </tr>

                            <tr>
                                <td align="right" valign="middle"><?php echo $form->label($model,'introduce'); ?></td>
                                <td colspan="3" valign="middle">
                                    <?php echo $form->textArea($model,'introduce',array('cols'=>70,'rows'=>6)); ?>
                                    <span class="font-gray">(200字以内)</span>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle"><?php echo $form->label($model,'tel'); ?></td>
                                <td valign="middle">
                                    <?php echo $form->textField($model,'tel',array('size'=>25,'maxlength'=>11)); ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle">&nbsp;</td>
                                <td colspan="3" valign="middle">
                                    <input type="submit" class="button-blue" value=" 保 存 ">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php $this->endWidget(); ?>
    </div>
</div>