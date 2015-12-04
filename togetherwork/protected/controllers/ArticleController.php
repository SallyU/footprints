<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");

class ArticleController extends Controller
{
	public $layout = 'togetherwork';
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	public function actionIndex()
	{
		//通过模型Model实现数据表信息查询
		//产生模型对象
		$article_model = Article::model();

		//1.获得总的记录数目
        $cnt = $article_model -> count();
        $per = 16;
        
        //2. 实例化分页类对象
        $page = new Pagination($cnt, $per);
        
        //3. 重新按照分页的样式拼装sql语句进行查询,按时间排序order by 时间 desc
        $sql = "select * from {{article}} order by create_time desc $page->limit";
        $article_infos = $article_model -> findAllBySql($sql);
        
        //4. 获得分页页面列表(需要传递到视图模板里边显示)
        //$page_list = $page->fpage(array(0,1,2,3,4,5,6,7,8));
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));//部分显示

        $numcon = $page->fpage(array(0));

        //全部显示
        //$page_list = $page->fpage();


        //最新的感觉
		//$xin = Article::model()->findAll(array('order'=>'create_time desc','limit'=>10));

		//点击最多排序
		$re = Article::model()->findAll(array('order'=>'click desc','limit'=>16));
		//更多相关阅读
		/*$xiangguan=Article::model()->findAll(array("condition" =>"cateId=".$article->cateId." and status = 1","limit"=>5,'order'=>'create_time desc'));

		//seo设置
		$this->pageKeyword=array(
			'title'=>$article->title.'-'.$article->CateOne->name.'-'.Helper::siteConfig()->site_name,
			'keywords'=>$article->keywords,
			'description'=>Helper::truncate_utf8_string($article->des,100),
		);*/
		//统计感觉的总数
		$cmodel = Article::model()->findAll();
		$count = count($cmodel);

		$data = array(
				'numcon'=>$numcon,
				're' =>$re,
				'article_infos'=>$article_infos,
				'page_list'=>$page_list,
				'count'=>$count,
				);
        
        
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

		if(isset($_POST['Article']))
		{

			$model->author_id = Yii::app()->user->id;
	        $model->author = Yii::app()->user->nickname;
			$model-> attributes = $_POST['Article'];

			$upimg = CUploadedFile::getInstance($model,'img');//获得一个CUploadedFile的实例
			if(is_object($upimg)&&get_class($upimg) === 'CUploadedFile')// 判断实例化是否成功  
			{
				$model->img = './up/cover/cover_'.time().'_'.rand(0,9999).'.'.$upimg->extensionName;//定义文件保存的名称
				}else{  
                $model->img = './up/cover/noPic.jpg';// 若果失败则应该是什么图片  
            }    

			if($model->save())
			{
				if(is_object($upimg)&&get_class($upimg) === 'CUploadedFile'){  
                    $upimg->saveAs($model->img);// 上传图片  
                }  


				//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				//Yii::app()->user->setFlash('success','添加成功!');
				//重定向
				//$this->redirect('./index.php?r=article/index');
				$this -> redirect_message('新感觉发布成功！','success','3',$this -> createUrl('article/index'));
			}
		}
		//设置下拉默认属性
		$model -> type_id = 2;
		$this->render('create',array('model'=>$model));
	}

	/**
	 * 修改文章
	 */
	public function actionUpdate($id)
	{
		//具体修改那个，需要将其查询出来
		//接收id，并根据$id来修改信息
		$model = Article::model()->findByPk($id);

		if(isset($_POST['Article'])){ 
    		$model->title = $_POST['Article']['title']; //标题
    		$model->type_id = $_POST['Article']['type_id']; //分类
    		$model->des = $_POST['Article']['des'];//描述、简介
    		$model->content = $_POST['Article']['content']; //内容
    		$model->keywords = $_POST['Article']['keywords']; //关键字
    		$model->update_time = time(); //最后修改时间
    		if($model->save()) {
				//$this->redirect('./index.php?r=user');
				$this -> redirect_message('感觉修改成功！','success','3',$this -> createUrl('article/myarticle',array('uid'=>Yii::app()->user->id)));
			}
		}

		$data = array (
    		'model' => $model,			
    	);
		$this->render('update',$data);
	}

	
	//删除文章
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
		$article_model = Article::model();
		$article_info = $article_model->findByPk($id);
		if($article_info->delete())
			//$this->redirect('./index.php?r=user');
			$this -> redirect_message('感觉删除成功 - -!','success','3',$this -> createUrl('article/myarticle',array('uid'=>Yii::app()->user->id)));
	}

	// 收藏文章
	public function actionShoucang($id)
	{
		$model = new Shoucang();
		$model->uid = Yii::app()->user->id;
		$model->sixiangid = $id;
		$model->shoucang_time = time();
		$model->save(false);

		Yii::app()->user->setFlash('shoucang','感觉收藏成功 ^_^ ');
		//完善一个我的收藏页面

		$this->redirect(array('article/detail', 'id' => $id));
	}


	//文章详细信息
	public function actionDetail()
	{
		//根据id获得详细信息
		$id=Yii::app()->request->getParam('id');
		$model = Article::model()->findByPk($id);
		$comment = $this->newComment($model);//评论new方法

		if(empty($model)){
			throw new CHttpException(404,'没有此页面');
		}

		$model->click+=1;
		$model->save(false);

		

		//上一篇
		$prev=Article::model()->findAll(array("condition" => "id<".$model->id." and type_id=".$model->type_id."","limit"=>1,'order'=>'create_time desc'));
		$prev=$prev[0];
		//下一篇
		$next=Article::model()->findAll(array("condition" => "id>".$model->id." and type_id=".$model->type_id."","limit"=>1,'order'=>'create_time asc'));
		$next=$next[0];

		//显示评论内容
		$pinglun = "select * from {{comment}} where article_id=$id order by create_time desc";
		$xianshicomment = Comment::model()->findAllBySql($pinglun);
		$data = array(
				'prev' => $prev,
				'next' => $next,
				'model' => $model,
				'comment'=>$comment,
				'xianshicomment'=>$xianshicomment,
		);

		/*$this->renderPartial('detail');*/
		$this->render('detail',$data);
	}
	//评论的添加方法
	protected function newComment($model)
		{
			$comment=new Comment;
			if(isset($_POST['ajax']) && $_POST['ajax'==='comment-form'])
			{
				echo CActiveForm::validate($comment);
				Yii::app()->end();
			}
			if(isset($_POST['Comment']))
			{
				$comment->comment_userid = Yii::app()->user->id;

				$comment->attributes=$_POST['Comment'];
				if($model->addComment($comment))
				{
					Yii::app()->user->setFlash('commentSubmitted','评论成功，谢谢小脚丫的共鸣！');
					$this->refresh();
				}
			}

			return $comment;
		}


	// 我的感觉列表
	public function actionMyarticle($uid)
	{
		$sql = "select * from {{article}} where author_id=$uid order by create_time desc";
		$model = Article::model()->findAllBySql($sql);
		$data = array('model'=>$model);

		$this->render('myarticle',$data);
	}

	//删除评论
	public function actionDeletecomment($id)
	{
		$model = Comment::model()->findByPk($id);
		if($model->delete())
			Yii::app()->user->setFlash('delcomment','您的评论删除成功');
			
			$this->redirect(array('article/detail', 'id' => $model->article_id));
	}
	

	//根据标签云查询感觉
	public function actionType()
	{
		$id = Yii::app()->request->getParam('id');

		$atype = Article::model()->findAll('type_id = '.$id);

		$data = array('atype'=>$atype);

		$this->render('type',$data);
	}



}
