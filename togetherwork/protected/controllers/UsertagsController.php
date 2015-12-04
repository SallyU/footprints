<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");//不是严重错误忽略
/**
 *心语控制器
 *
 */
class UsertagsController extends Controller
{
	public $layout = 'togetherwork';

	public function actionUsertags()
	{
		$model = new Usertags();

		if(isset($_POST['Usertags']))
		{
			$model->uid = Yii::app()->user->id;
			$model->create_time = time();
			$model-> attributes = $_POST['Usertags'];
			if($model->save())
				Yii::app()->user->setFlash('success','标签添加成功！');
				$this->redirect('./index.php?r=usertags/usertags');
		}

		$u_id = Yii::app()->user->id;
		$sql = "select * from {{usertags}} where uid=$u_id order by create_time desc";
		$my = Usertags::model()->findAllBySql($sql);


		$data=array('model'=>$model,'my'=>$my);

		$this->render('usertags',$data);
	}

	//删除标签
	public function actionDelete($id)
	{
		$model = Usertags::model()->findByPk($id);
		if($model->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
			Yii::app()->user->setFlash('shanchu','您的标签删除成功');
			$this->redirect('./index.php?r=usertags/usertags');
	}



}