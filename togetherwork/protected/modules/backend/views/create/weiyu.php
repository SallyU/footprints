<div class="right">

<ul class="tabui" style="background-color: #fff;">
    <li ><a href="<?php echo Yii::app()->createUrl('backend/create/article'); ?>">增加感觉</a></li>
    <li><a href="">发美图</a></li>
    <li class="on"><a href="<?php echo Yii::app()->createUrl('backend/create/weiyu'); ?>">短句</a></li>
  </ul>
<div class="table-ui">
  <li class="post_wxts" style="padding:10px; width:578px;">
<p class="p1">温馨提示：</p>
<p class="p2">
1.发布的短句文字不允许含有广告、网址、色情等内容；<br>
2.发布各种重复短句文字，将被删除；<br>
3.短句文字中含有辱骂、攻击、诽谤他人的将会被删除。
</p>
</li>
<table width="100%" align="center" cellpadding="3" cellspacing="0" style="clear:both;"><input name="title" type="hidden" id="title" onkeyup="checkLength(this)" onbeforepaste="checkLength(this)" value="" size="60">
<tbody><tr>
<td class="in_put td_a" height="40"><div align="left">短句内容</div></td>
</tr>
<tr><td width="90%" class="in_put td_b"><div class="dj_fb_i"><textarea name="newstext" onkeyup="checkLength(this)" onbeforepaste="checkLength(this)" class="area_bg dj_cont input_area" cols="40" rows="1" id="newstext"></textarea><script type="text/javascript">
                                   var temp;
                                   function checkLength() {

                                       var val = document.getElementById("newstext").value;
                                       var valLength = 0;
                                       var len = 0;
                                           for (var i = 0; i < val.length; i++) {
                                               if (val[i].match(/[^\x00-\xff]/ig) != null) //全角 
                                                   len += 1;
                                           }

                                           if (len <= 140) {
                                                 temp = document.getElementById("newstext").value;
                                       }
                                       document.getElementById("progressbar").innerHTML = len;
                                       if (len > 140) {
                                           document.getElementById("newstext").value = temp;
                                                       document.getElementById("progressbar").innerHTML = "输入超出字数上限";
                                                       return false;
                                                   }
                                               }
</script><div class="dj_fb_num">字数统计:<span id="progressbar">0</span>/140</div></div></td></tr>

</tbody></table></div>
<div class="table-ui">

  <table width="99%" border="0" cellpadding="3" cellspacing="0">
  	    <tbody><tr> 
      <td width="16%" height="50" class="td_a">&nbsp;</td>
      <td class="td_b"><div align="left"><input type="submit" name="addnews" value="提交信息" class="input_a"></div></td>
    </tr>
  </tbody></table>
</div>
  </form>
</div>