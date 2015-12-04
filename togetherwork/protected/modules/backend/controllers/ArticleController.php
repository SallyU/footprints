<?php

class ArticleController extends Controller
{
	public $layout='admin';
	//文章粗略信息页面()
	public function actionIndex()
	{
		$article_model = Article::model();

		//1.获得总的记录数目
        $cnt = $article_model -> count();
        $per = 10;
        
        //2. 实例化分页类对象
        $page = new Pagination($cnt, $per);
        
        //3. 重新按照分页的样式拼装sql语句进行查询
        $sql = "select * from {{article}} order by create_time desc $page->limit";
        $article_infos = $article_model -> findAllBySql($sql);
        
        //4. 获得分页页面列表(需要传递到视图模板里边显示)
        //$page_list = $page->fpage(array(3,4,5,6,7));//部分显示

        //全部显示
        $page_list = $page->fpage();
        


        $data=array('article_infos'=>$article_infos,'page_list'=>$page_list);
        
        //调用视图模板，给模板传递数据
        $this ->render('index',$data);
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
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
				$this->redirect('./index.php?r=backend/article/view');
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->renderPartial('create',array('model'=>$model));
		//$this->renderPartial('create');
	}

	/**
	 * 修改文章
	 */
	//public function actionUpdate()
	public function actionUpdate($id)
	{
		//具体修改那个，需要将其查询出来
		//接收id，并根据$id来修改信息
		$article_model = Article::model();//除了添加数据，都使用Article::model()来实例化模型对象
		$article_info = $article_model->findByPk($id);

		if(isset($_POST['Article'])){
			//将数据赋予model
			foreach ($_POST['Article'] as $_k => $_v) {
				$article_info->$_k =$_v;
			}
			$article_model->create_time=time();
		 	$article_model->update_time=time();
			//调用save()方法实现数据添加
			if($article_info->save())
				//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				Yii::app()->user->setFlash('xiugai','修改成功!');
				$this->redirect('./index.php?r=backend/article/view');
		}

		//把$Article_info传递到视图
		$this->render('update',array('article_model'=>$article_info));
	}

	
	//删除文章
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
		$article_model = Article::model();
		$article_info = $article_model->findByPk($id);
		if($article_info->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				Yii::app()->user->setFlash('shanchu','删除成功!');
			$this->redirect('./index.php?r=backend/article/index');
	}


	//文章详细信息
	public function actionDetail($id){
		//根据id获得详细信息
		$article_info = Article::model()->findByPk($id);

		/*$this->renderPartial('detail');*/
		$this->renderPartial('detail',array('article_info'=>$article_info));
	}



	// 批量删除操作
	public function actionDelall(){
		$res = array();
		if(isset($_POST['selectdel'])){
			foreach ($_POST['selectdel'] as $key => $value) {
				$model = $this->loadModel($value);
				$model->delete();

				
			}
			$res['statu'] = 0;
			echo CJSON::encode($res);
		}else{
			$res['statu'] = 1;
			echo CJSON::encode($res);
		}
	}
	
	
}
