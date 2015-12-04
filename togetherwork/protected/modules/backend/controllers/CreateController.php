<?php

class CreateController extends Controller
{
	public $layout='admin';

	//首页
	public function actionIndex()
	{
		$this->render('index');
	}


	// 增加新文章/感觉
	public function actionArticle()
	{

		$model=new Article();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model-> attributes = $_POST['Article'];
			$model->create_time=time();
			$model->update_time=time();
			if($model->save())
				//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				Yii::app()->user->setFlash('success','添加成功!');
				//重定向
				$this->redirect('./index.php?r=backend/article/index');
		}
		$this->render('article',array('model'=>$model));
	}

	public function actionWeiyu()
	{
		$model = new Weiyu();
		if(isset($_POST['Weiyu']))
		{
			$model->create_user_id = Yii::app()->user->id;
	        $model->author_name = Yii::app()->user->name;
			$model-> attributes = $_POST['Weiyu'];
			if($model->save())
				Yii::app()->user->setFlash('success','恭喜新微语发布成功！');
				$this->redirect('./index.php?r=backend/article/index');
		}

		$this->render('weiyu',array('model'=>$model));
	}




}