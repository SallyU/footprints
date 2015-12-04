<?php

class MsgController extends Controller
{
	public $layout='msg';

	//信息中心首页
	public function actionInbox()
	{
		// $condition = 'touid = '.Yii::app()->user->id;
		// $msgs = Msg::model()->findAll(array('condition'=>$condition,'order'=>'time desc'));//发给我的消息

		$fa = count(Msg::model()->findAll('uid = '.Yii::app()->user->id));//统计当前用户和几个人联系过

		$shou = count(Msg::model()->findAll('touid = '.Yii::app()->user->id));//统计有几个人给我发过信息

		$userid = Yii::app()->user->id;
		$cs ="select *,count(distinct uid) from {{msg}} where touid=$userid group by uid order by time desc";
		//实现了不重复发信人的查询
		$duihua=Msg::model()->findAllBySql($cs);
		//var_dump($duihua);


		$data = array('fa'=>$fa,'shou'=>$shou,'duihua'=>$duihua);

		$this->render('inbox',$data);
	}

	//对话列表页面
	public function actionList($uid)
	{
		$userid = Yii::app()->user->id;
		$model = new Msg();
		if(isset($_POST['Msg']))
		{
			$model->uid = $userid;
			$model->time = time();
			$model->state = 1;
			$model->content = $_POST['Msg']['content'];
			$model->touid = $uid;
			if($model->save(false))
				Yii::app()->user->setFlash('fasong','私信回复成功 ^_^ ');
				$this -> refresh();
		}

		$sql = "select * from {{msg}} where (uid=$uid and touid=$userid) or (uid=$userid and touid=$uid) order by time asc";//输出不同条件按时间排序

		$msglist = Msg::model()->findAllBySql($sql);

		//var_dump($msglist);

		$data= array('model'=>$model,'msglist'=>$msglist);


		$this->render('list',$data);
	}

	//发信息
	public function actionNewmsg()
	{
		$model = new Msg();
		if(isset($_POST['Msg']))
		{
			$model->uid = Yii::app()->user->id;
			$model->time = time();
			$model->state = 1;
			$model-> attributes = $_POST['Msg'];
			if($model->save())
				$this -> redirect_message('私信发送成功！','success','3',$this -> createUrl('msg/inbox'));
		}

		$fans = Follow::model()->findAll('touid = '.Yii::app()->user->id);

		$data = array('model'=>$model,'fans'=>$fans);




		$this->render('newmsg',$data);
	}

}