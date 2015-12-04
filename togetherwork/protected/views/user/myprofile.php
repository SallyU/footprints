<div class="main clearfix">
            <!--左边left 开始-->
    <?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->

<div class="article">
                <div class="menu">
                    <a href="./index.php?r=user/myprofile" class="on">详细资料</a>
                    <a href="<?php echo Yii::app()->createUrl('user/edit_password'); ?>">修改密码</a>
                    <a href="<?php echo Yii::app()->createUrl('usertags/usertags'); ?>">个人标签</a>
                    <!-- <a href="">隐私设置</a> -->
                </div>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
                            <tbody>
                                <tr>
                                <td align="right" valign="middle"> 帐 号：</td>
                                <td colspan="3" valign="middle" class="font-blue bold"> <?php echo $model->username; ?><span class="font-gray">(<?php echo $model->email; ?>)</span> </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="middle"><span class="font-og">* </span>昵 称：</td>
                                    <td colspan="3" valign="middle" class="font-blue bold"><?php echo $model->nickname; ?></td>
                                </tr>
                                <tr>
                                    <td align="right" valign="middle"><span class="font-og">* </span> 性 别：</td>

                                    <td colspan="3" valign="middle" class="font-blue bold">
                                        <?php
                                        switch ($model->sex)
                                            {
                                            case 1:
                                              echo "保密";
                                              break;
                                            case 2:
                                              echo "男";
                                              break;
                                            case 3:
                                              echo "女";
                                              break;
                                            default:
                                              echo "无";
                                            }
                                            ?>
                                    </td>

                                <tr>
                                    <td align="right" valign="middle">QQ号码：</td>
                                    <td colspan="3" valign="middle" class="font-blue bold"><?php echo $model->qq; ?></td>
                                </tr>

                                <tr>
                                    <td align="right" valign="middle"> 社区签名： </td>
                                    <td colspan="3" valign="middle" class="font-blue bold">
                                        <?php echo $model->introduce; ?>
                                    </td>
                                </tr>
                                <tr>
                                                    <td align="right" valign="middle"> 联系电话： </td>
                                                    <td valign="middle" colspan="3" valign="middle" class="font-blue bold">
                                                        <?php echo $model->tel; ?>
                                                    </td>
                                </tr>

                                <tr>
                                    <td align="right" valign="middle">&nbsp;</td>
                                    <td colspan="3" valign="middle" class="font-blue bold"><a href="./index.php?r=user/editmyprofile" class="font-blue bold">【修&nbsp;改】</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
</div>