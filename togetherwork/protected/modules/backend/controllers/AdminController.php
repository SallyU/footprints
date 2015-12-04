<?php
/**
 *后台Admin登录管理器
 */
class AdminController extends Controller{

	/**
	 *实现登录
	 */
	function actionLogin(){
		$login_model = new LoginForm();

		if(isset($_POST['LoginForm']))
		{
			//收集登录表单信息
			$login_model-> attributes = $_POST['LoginForm'];

			if($login_model->validate() && $login_model->login())
				//echo "fuck";
				$this->redirect('./index.php?r=backend/index');



		}
		//echo 'Login Backend!';
		$this->renderPartial('login',array('login_model'=>$login_model));
	}

	//管理员退出
	public function actionLogout()
	{
		//删除session信息
		/**
		*Yii::app()->session->clear();//删除session变量
		*Yii::app()->session->destroy();//删除服务器的session
		*/
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
		$this->redirect('./index.php?r=backend/admin/login');
	}
}