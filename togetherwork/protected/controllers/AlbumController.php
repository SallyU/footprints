<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");//不是严重错误忽略
/**
 *相册控制器
 */
class AlbumController extends Controller
{

	//public $layout='common';
	public $layout = 'album';

	//图片首页
	public function actionIndex()
	{
		$sql = "select * from {{album}} order by create_time desc";
		$model = Album::model()->findAllBySql($sql);
		$data = array('model'=>$model);

		$this->render('index',$data);
	}

	//发照片
	public function actionUpload()
	{
		$model=new Album();
		if(isset($_POST['Album']))
		{

			$model->user_id = Yii::app()->user->id;
			$model->create_time = time();
			$model-> attributes = $_POST['Album'];

			$upimg = CUploadedFile::getInstance($model,'album_img');//获得一个CUploadedFile的实例
			if(is_object($upimg)&&get_class($upimg) === 'CUploadedFile')// 判断实例化是否成功  
			{
				$model->album_img = './up/album/pic_'.time().'_'.rand(0,9999).'.'.$upimg->extensionName;//定义文件保存的名称
				}else{  
                $model->album_img = './up/album/noPic.jpg';// 若果失败则应该是什么图片  
            }    

			if($model->save())
			{
				if(is_object($upimg)&&get_class($upimg) === 'CUploadedFile'){  
                    $upimg->saveAs($model->album_img);// 上传图片  
                }  


				//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				//Yii::app()->user->setFlash('success','添加成功!');
				//重定向
				//$this->redirect(array('album/index'));
				$this -> redirect_message('美图发布成功！','success','3',$this -> createUrl('album/index'));
			}
		}
		//设置下拉默认属性
		$data=array('model'=>$model);
		$this->render('upload',$data);
	}

	//查看大图照片
	public function actionView($id)
	{
		$model = Album::model()->findByPk($id);


		//上一张图片
		$prev=Album::model()->findAll(array("condition" => "id<".$model->id."","limit"=>1,'order'=>'create_time desc'));
		$prev=$prev[0];
		//下一张图片
		$next=Album::model()->findAll(array("condition" => "id>".$model->id."","limit"=>1,'order'=>'create_time asc'));
		$next=$next[0];
		
		$data = array('model'=>$model,'prev'=>$prev,'next'=>$next);



		$this->render('view',$data);
	}

	//喜欢照片
	public function actionLike($id)
	{
		$model = Album::model()->findByPk($id);
		$model->like+=1;
		$model->save(false);

		$this->redirect('./index.php?r=album');
	}
	//喜欢照片
	public function actionZan($id)
	{
		$model = Album::model()->findByPk($id);
		$model->like+=1;
		$model->save(false);

		$this->redirect(array('album/view','id'=>$id));
	}

	// 收藏图片
	public function actionStorepic($id)
	{
		$model = new Picshoucang();
		$model->pic_uid = Yii::app()->user->id;
		$model->pic_id = $id;
		$model->store_time = time();
		$model->save(false);

		//Yii::app()->user->setFlash('picshoucang','美图收藏成功 ^_^ ');
		//完善一个我的收藏页面

		//$this->redirect('./index.php?r=album');
		$this -> redirect_message('美图收藏成功！','success','3',$this -> createUrl('album/index'));
	}

	//我的相册
	public function actionMyalbum()
	{
		$uid = Yii::app()->user->id;
		$sql = "select * from {{album}} where user_id=$uid order by create_time desc";
		$model = Album::model()->findAllBySql($sql);
		$mypicnum = count($model);

		$data = array('model'=>$model,'shuliang'=>$mypicnum);
		$this->render('myalbum',$data);
	}

	//删除图片
	public function actionDelete($id)
	{
		$model = Album::model()->findByPk($id);
		if($model->delete())
			$this -> redirect_message('照片删除成功！- -!','success','3',$this -> createUrl('album/myalbum'));
			//$this->redirect('./index.php?r=album/myalbum');
	}


	//根据图库名称展示搜寻到的图片
	public function actionSearch($id)
	{
		$sql = "select * from {{album}} where photo_cate_id=$id order by create_time desc";
		$model = Album::model()->findAllBySql($sql);

		$tj=count($model);

		$cate=Albumcate::model()->findByPk($id);


		$data = array('model'=>$model,'tj'=>$tj,'cate'=>$cate,);

		$this->render('search',$data);
	}


}