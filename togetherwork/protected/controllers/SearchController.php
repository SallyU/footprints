<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
class SearchController extends Controller
{
	public $layout='togetherwork';
	//将关键字传递到首页搜索用户个性标签
	public function actionIndex()
	{
		$keywords = Yii::app()->request->getParam('keywords');
		$sql = "select * from {{usertags}} where tagname like'%$keywords%' order by create_time desc";//采用模糊查询方法查询符合条件的数据
		$tag = Usertags::model()->findAllBySql($sql);
		$data=array('tag'=>$tag,'id'=>$keywords);
		$this->render('index',$data);
	}

	//搜索昵称为上面关键字的用户
	public function  actionNickname()
	{
		$keywords =Yii::app()->request->getParam('keywords');
		$sql = "select * from {{user}} where nickname like'%$keywords%' order by regtime desc";
		$nickname = User::model()->findAllBySql($sql);

		$data=array('name'=>$nickname,'id'=>$keywords);
		$this->render('nickname',$data);
	}

	//搜索用户UID功能的实现
	public function actionUid()
	{
		$keywords =Yii::app()->request->getParam('keywords');
		$sql = "select * from {{user}} where id like'%$keywords%' order by regtime desc";
		$user = User::model()->findAllBySql($sql);

		$data=array('user'=>$user,'id'=>$keywords);
		$this->render('uid',$data);
	}

	//搜索感觉标题
	public function actionFeel()
	{
		$keywords =Yii::app()->request->getParam('keywords');
		$sql = "select * from {{article}} where title like'%$keywords%' order by create_time desc";
		$article = Article::model()->findAllBySql($sql);

		$data=array('article'=>$article,'id'=>$keywords);
		$this->render('feel',$data);
	}



}