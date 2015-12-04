<div class="main clearfix">
<?php $this->widget('UserMenu'); ?>
<!--左边left 结束-->    


<!-- 右边开始 -->
<div class="article">
                <div class="menu"><a href="<?php echo Yii::app()->createUrl('msg/inbox'); ?>">信息中心</a><a href="#" class="on">发送新短信</a></div>



                <div class="inboxlist">
                <?php $form=$this->beginWidget('CActiveForm'); ?>
                        <h3 class="margin-10" style="font-size: 1em;font-weight: bold;padding: 5px 0;">收 信 人：</h3>
                        <?php echo $form->textField($model,'touid',array('id'=>'Msg_touser')); ?>
                        <h3 class="margin-10" style="font-size: 1em;font-weight: bold;padding: 5px 0;">内容：(最少5个字)</h3>
                        
                        <div class="text-fa">
                        <?php echo $form->textArea($model,'content'); ?>
                        </div>
                        <input type="submit" value="发 送" class="button-blue margin-10">
                <?php $this->endWidget(); ?>
</div>


<br/><br/><br/>

<div id="selectItem" class="selectItemhidden"> 
    <div id="selectItemAd" class="selectItemtit bgc_ccc"> 
        <h2 id="selectItemTitle" class="selectItemleft">请选择好友</h2> 
        <div id="selectItemClose" class="selectItemright">关闭</div>
    </div> 
    <div id="selectItemCount" class="selectItemcont"> 
        <div id="selectSub"> 
            <?php foreach ($fans as $_f) {?>
            <input type="checkbox" name="<?php echo $_f->user->nickname;?>"  id="<?php echo $_f->uid;?>" value="<?php echo $_f->uid;?>"/>
            <label for="<?php echo $_f->uid;?>"><?php echo $_f->user->nickname;?></label>
            <?php }?>
        </div> 
    </div> 
</div>  
                
</div>

</div>
