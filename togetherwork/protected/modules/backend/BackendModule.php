<?php

class BackendModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'backend.models.*',
			'backend.components.*',
		));

		//为后台组件设置
		Yii::app()->setComponents(array(
                    'user'=>array(
                        'stateKeyPrefix' =>'backend',//为后台用户设置session信息
                        'loginUrl'=>'./index.php?r=backend/admin/login',//设置后台默认登录页面
                    )
                ));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
