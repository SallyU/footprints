<?php

class FollowController extends Controller
{
	public $layout = 'togetherwork';
	//加关注功能
	public function actionAdd()
	{
		$id = Yii::app()->request->getParam('id');//被访问的用户id，此时视图能看见加好友功能
		$model=new Follow();

		$model->uid = Yii::app()->user->id;
		$model->touid = $id;
		$model->time = time();


		if($model->save()){

		//$this->redirect(array('user/home', 'uid' => $id));
		$this -> redirect_message('关注成功！','success','3');
		}


	}

	//关注人详细列表
	public function actionIndex()
	{
		// 我关注的人列表
		$uid = Yii::app()->request->getParam('uid');
		//显示我关注的人
		$sql = "select * from {{follow}} where uid=$uid order by time desc";
		$guanzhuren = Follow::model()->findAllBySql($sql);
		//显示我的粉丝
		$sql2 = "select * from {{follow}} where touid=$uid order by time desc";
		$myfans = Follow::model()->findAllBySql($sql2);

		// 关注页面是谁的判断
		$name = User::model()->findByPk($uid);

		$data = array('guanzhuren'=>$guanzhuren,'myfans'=>$myfans,'self'=>$uid,'name'=>$name);



		$this->render('index',$data);
	}

	//取消关注
	public function actionUnfollow()
	{
		$touser = Yii::app()->request->getParam('uid');
		$fuid = Yii::app()->user->id;
		$sql = "select * from {{follow}} where touid=$touser and uid=$fuid";
		$model = Follow::model()->findBySql($sql);
		if($model->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
			Yii::app()->user->setFlash('unfollow','取消关注成功 -_-!');
			$this->redirect(array('follow/index', 'uid' => $fuid));
	}

}