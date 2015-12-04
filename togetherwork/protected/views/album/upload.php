<div id="container" style="width:800px;">
  <!-- 个人信息卡片 -->
    <div class="pin wfc" style="position: absolute; left: 0px; top: 0px;">
      <div id="Profile">
        <div class="profile-basic">
        <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>" title="<?php echo Yii::app()->user->nickname; ?>" class="img x"><img width="54" height="54" src="<?php echo Yii::app()->user->photo; ?>"></a>
        <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>" class="userlink"><?php echo Yii::app()->user->nickname; ?></a>
        <a href="<?php echo Yii::app()->createUrl('user/myprofile') ?>" title="帐号设置" class="settings"></a>
        </div>

        <div class="profile-stats">
          <a href="<?php echo Yii::app()->createUrl('album/myalbum'); ?>"><strong><?php
                                echo $sl = Album::model()->countByAttributes(array('user_id'=>Yii::app()->user->id));?></strong>我的照片</a>
          <a href="<?php echo Yii::app()->createUrl('user/mystore'); ?>" class="middle"><strong><?php
                                echo $count = Picshoucang::model()->countByAttributes(array('pic_uid'=>Yii::app()->user->id));?></strong>收藏</a>
          <a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>"><strong><?php 
                                $byshui = Yii::app()->user->id;
                                $fansnu = "select * from {{follow}} where touid=$byshui";
                                $numFAN = count(Follow::model()->findAllBySql($fansnu));
                                echo $numFAN; ?></strong>粉丝</a>

        </div>

        <div class="fazhaopian">
          <ul>
            <li>
              <a href="<?php echo Yii::app()->createUrl('album'); ?>" style="padding-left:15px;">返回相册首页</a>
            </li>
          </ul>

        </div>

        <div class="unit">
          <div id="task_start_tip">用照片记录生活<br />将定格的美好分享
            <div class="cls"></div>
          </div>
        </div>
        

      </div>
    </div>
    <!-- 个人资料结束，图片瀑布流开始 -->

<div style="border:solid 1px #e6e6e6; width:550px !important; min-height:450px; float:right !important; background-color:#daedff;padding:10px 0 10px 10px;margin-right:10px;">


<style type="text/css">
        #destination{
            filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(true,sizingMethod=scale);
        }
    div .errorMessage{color:red;}
    label  .required {color:red;}
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
//处理file input加载的图片文件
$(document).ready(function(e) {
	//判断浏览器是否有FileReader接口
	if(typeof FileReader =='undefined')
	{
	   $("#destination").css({'background':'none'}).html('亲,您的浏览器还不支持HTML5的FileReader接口,无法使用图片本地预览,请更新浏览器获得最好体验');
		//如果浏览器是ie
		if($.browser.msie===true)
		{
			//ie6直接用file input的value值本地预览
			if($.browser.version==6)
			{
			    $("#imgUpload").change(function(event){						
					  //ie6下怎么做图片格式判断?
					  var src = event.target.value;
					  //var src = document.selection.createRange().text;		//选中后 selection对象就产生了 这个对象只适合ie
					  var img = '<img src="'+src+'" width="400px" height="400px" />';
					  $("#destination").empty().append(img);
				  });
			}
			//ie7,8使用滤镜本地预览
			else if($.browser.version==7 || $.browser.version==8)
			{
				$("#imgUpload").change(function(event){
					  $(event.target).select();
					  var src = document.selection.createRange().text;
					  var dom = document.getElementById('destination');
					  //使用滤镜 成功率高
					  dom.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src= src;
					  dom.innerHTML = '';
					  //使用和ie6相同的方式 设置src为绝对路径的方式 有些图片无法显示 效果没有使用滤镜好
					  /*var img = '<img src="'+src+'" width="400px" height="400px" />';
					  $("#destination").empty().append(img);*/
				 });
			}
		}
		//如果是不支持FileReader接口的低版本firefox 可以用getAsDataURL接口
		else if($.browser.mozilla===true)
		{
			$("#imgUpload").change(function(event){
				//firefox2.0没有event.target.files这个属性 就像ie6那样使用value值 但是firefox2.0不支持绝对路径嵌入图片 放弃firefox2.0
				//firefox3.0开始具备event.target.files这个属性 并且开始支持getAsDataURL()这个接口 一直到firefox7.0结束 不过以后都可以用HTML5的FileReader接口了
				if(event.target.files)
				{
				  //console.log(event.target.files);
				  for(var i=0;i<event.target.files.length;i++)
				  {	
				  	  var img = '<img src="'+event.target.files.item(i).getAsDataURL()+'" width="400px" height="400px"/>';
					  $("#destination").empty().append(img);
				  }
				}
				else
				{
					//console.log(event.target.value);
					//$("#imgPreview").attr({'src':event.target.value});
				}
				});
		}
	}
	else
	{
		// version 1
		/*$("#imgUpload").change(function(e){
		  var file = e.target.files[0];
		  var fReader = new FileReader();
		  //console.log(fReader);
		  //console.log(file);
		  fReader.onload=(function(var_file)
		  {
			  return function(e)
			  {
				  $("#imgPreview").attr({'src':e.target.result,'alt':var_file.name});
			  }
		  })(file);
		  fReader.readAsDataURL(file);
		  });*/
		  
		  //单图上传 version 2 
		  /*$("#imgUpload").change(function(e){
			    var file = e.target.files[0];
			    var reader = new FileReader();  
				reader.onload = function(e){
					//displayImage($('bd'),e.target.result);
					//alert('load');
					$("#imgPreview").attr({'src':e.target.result});
				}
				reader.readAsDataURL(file);
			  });*/
		  //多图上传 input file控件里指定multiple属性 e.target是dom类型
		   $("#imgUpload").change(function(e){  
			   	for(var i=0;i<e.target.files.length;i++)
			   		{
				   		var file = e.target.files.item(i);
						//允许文件MIME类型 也可以在input标签中指定accept属性
						//console.log(/^image\/.*$/i.test(file.type));
						if(!(/^image\/.*$/i.test(file.type)))
						{
							continue;			//不是图片 就跳出这一次循环
						}
						
						//实例化FileReader API
						var freader = new FileReader();
						freader.readAsDataURL(file);
						freader.onload=function(e)
						{
							var img = '<img src="'+e.target.result+'" width="400px" height="400px"/>';
							$("#destination").empty().append(img);
						}
			   		}
			   });
			   
		  //处理图片拖拽的代码
		  var destDom = document.getElementById('destination');
		  destDom.addEventListener('dragover',function(event){
			  event.stopPropagation();
			  event.preventDefault();
			  },false);
			  
		  destDom.addEventListener('drop',function(event){
			  event.stopPropagation();
			  event.preventDefault();
			  var img_file = event.dataTransfer.files.item(0);				//获取拖拽过来的文件信息 暂时取一个
			  //console.log(event.dataTransfer.files.item(0).type);
			  if(!(/^image\/.*$/.test(img_file.type)))
			  {
				  alert('您还未拖拽任何图片过来,或者您拖拽的不是图片文件');
				  return false;
			  }
			  fReader = new FileReader();
			  fReader.readAsDataURL(img_file);
			  fReader.onload = function(event){
				  destDom.innerHTML='';
				  destDom.innerHTML = '<img src="'+event.target.result+'" width="400px" height="400px"/>';	
				  };
		  },false);
	}
});
</script>
</head>

<body>
<?php $form=$this->beginWidget('CActiveForm',array('enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
<span style="color:red;float:left;">* 禁止上传有关政治、反动、色情、低俗、以及带人身攻击或与主题无关的图片，否则将禁止帐号</span>
<?php echo $form->textField($model,'name',array('placeholder'=>'填写照片名称','maxlength'=>18)); ?>
<div style="margin:-20px 0 0 160px;"><?php echo $form->error($model,'name'); ?></div>
<div><p style="margin-top:30px;font-size:14px;">推荐到足迹图片库:</p><?php echo $form->radioButtonList($model,'photo_cate_id',Albumcate::model()->getAlbumsList(),array('separator'=>'&nbsp;')); ?>
<?php echo $form->error($model,'photo_cate_id'); ?>

</div>
<?php echo CHtml::activeFileField($model,'album_img',array('id'=>'imgUpload')); ?>
<?php echo $form->error($model,'album_img'); ?>
<!-- <input type="file" id="imgUpload" name="imgUpload" draggable="true" single/> -->
<div id="destination" style="width:400px;height:400px;border:0;"></div>
<input type="submit" value="上传"/>

<?php $this->endWidget(); ?>
		







</div>








</div>
