<div class="right" style="">
  <ul class="tabui" style="background-color: #fff;">
	  <li class="on"><a href="<?php echo Yii::app()->createUrl('backend/create/article'); ?>">增加感觉</a></li>
	  <li><a href="">发美图</a></li>
	  <li><a href="<?php echo Yii::app()->createUrl('backend/create/weiyu'); ?>">短句</a></li>
	</ul>

<div class="table-ui" style="">
  <li class="post_wxts" style="padding:10px; width:578px;">
    <p class="p1">温馨提示：</p>
    <p class="p2">
    1.发布的美文不允许含有广告、网址、色情等内容。<br>
    2.美文仅限发布内容较长的小清新文章，诗句散文等。<br>
    3.发布短句、文字等内容，请到<a href="/e/DoInfo/AddInfo.php?mid=14&amp;enews=MAddInfo&amp;classid=18">短句</a>栏目。
    </p>
  </li>
<?php $form = $this->beginWidget('CActiveForm'); ?>
  <div>
        &nbsp;您当前的位置-&gt;添加新文章
    </div>
    <div>
        <div>
        <div>
            <!-- 标题： -->
            <?php echo $form->labelEx($model,'title'); ?>
            </div>
            <div>
            <!-- <input name="name" style="width: 350px;" type="text"> -->
            <?php echo $form->textField($model,'title',array('size'=>30)); ?>
            <?php echo $form->error($model,'title'); ?>
            </div>
            <div>
            <span class="must">&nbsp;*&nbsp;</span>请填写少于20个字.
            </div>
        </div>

        <div>
            <div>
            <!-- 作者： -->
            <?php echo $form->labelEx($model,'author'); ?>
            </div>
            <div>
            <!-- <input name="name" style="width: 150px;" type="text"> -->
            <?php echo $form->textField($model,'author',array('size'=>30)); ?>
            </div>
            <div>
            <span class="must">&nbsp;*&nbsp;</span>请填写少于6个字.
            </div>
        </div>

        <div>
            <div>
            <!-- 描述: -->
            <?php echo $form->labelEx($model,'des'); ?> 
            </div>
            <div>
            <!-- <textarea style="width: 550px; height: 40px"></textarea> -->
            <!--textArea($model,$attribute,$htmlOptions=array())-->
            <?php echo $form->textArea($model,'des',array('cols'=>80,'rows'=>2)); ?>

            </div>
        </div>


        <div>
            <div>
            <!-- 内容: --> 
            <?php echo $form->labelEx($model,'content'); ?>
            </div>
            <div>
      <!-- <textarea style="width: 800px; height: 300px"></textarea> -->
            <?php echo $form->textArea($model,'content',array('cols'=>110,'rows'=>19)); ?>
      </div>
            <div>
            </div>
        </div>
        <div>
            <div>
            </div>
            <div>
            <input name="button" value="添加" style="border: 0px none; height: 20px; width: 50px; background: none repeat scroll 0% 0% rgb(132, 204, 201); color: white;" type="submit">
            </div>
            <div>
            注意：<span class="must">&nbsp;*&nbsp;</span>部分为必须填写的内容.
            </div>
        </div>
    </div>

</div>
<!-- </form> -->
<?php $this->endWidget(); ?>







</div>
</div>