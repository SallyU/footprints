<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");//不是严重错误忽略
/**
 *心语控制器
 *
 */
class WeiyuController extends Controller
{

	//public $layout='common';
	public $layout = 'togetherwork';

	public function actionIndex()
	{
		$model = new Weiyu();
		if(isset($_POST['Weiyu']))
		{
			$model->create_user_id = Yii::app()->user->id;
	        $model->author_name = Yii::app()->user->nickname;
			$model-> attributes = $_POST['Weiyu'];
			if($model->save())
				Yii::app()->user->setFlash('success','恭喜新微语发布成功！');
				$this->redirect('./index.php?r=weiyu');
		}

		$sql = "select * from {{weiyu}} order by create_time desc";
		$allthinking = Weiyu::model()->findAllBySql($sql);

		$data = array('model'=>$model,'allthinking'=>$allthinking);


		$this->render('index',$data);
	}

	//删除微语
	public function actionDelete($id)
	{
		$model = Weiyu::model()->findByPk($id);
		if($model->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
			Yii::app()->user->setFlash('shanchu','您的微语删除成功');
			$this->redirect('./index.php?r=weiyu');
	}

	//微语赞
	public function actionZan($id)
	{
		$model = Weiyu::model()->findByPk($id);
		$model->weiyu_zan+=1;
		$model->save(false);

		$this->redirect('./index.php?r=weiyu');
	}

	//制定用户的微语搜索
	public function actionSearch($uid)
	{
		$sql = "select * from {{weiyu}} where create_user_id=$uid order by create_time desc";
		$showweiyu = Weiyu::model()->findAllBySql($sql);

		$data = array('showweiyu'=>$showweiyu);


		$this->render('search',$data);
	}

}