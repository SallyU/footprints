<?php
/**
 *后台整体架构控制器
 */
class IndexController extends Controller{
	
	/**
	*在当前控制器实现用户访问控制
	*/
	// function filters(){
	// 	return array(
	// 		'accessControl'
	// 	);
	// }

	// //为具体方法被访问设置条件
	// function accessRules(){
	// 	return array(
	// 		array(
	// 			'allow',
	// 			'actions'=>array('head','left','right','list','index'),
	// 			'users'=>array('@'),//只允许登录的用户
	// 		),
	// 		array(
	// 			'deny',
	// 			'users'=>array('*'),//deny没有被提到的方法，不论是否登录
	// 		),
	// 	);
	// }



	/**
	 *生成头部
	 */
	/*function actionHead(){
		$this->renderPartial('head');
	}

	function actionLeft(){
		$this->renderPartial('left');
	}

	function actionRight(){
		$this->renderPartial('right');
	}

	function actionList(){
		$this->renderPartial('list');
	}

	//将头部、左侧、右侧合在一起
	function actionIndex(){
		$this->renderPartial('index');
	}*/

	public $layout='admin';

	public function actionIndex()
	{
		if(Yii::app()->user->isGuest){

            $this->redirect('./index.php?r=backend/admin/login');

        }
		$this->render('index');
	}
}