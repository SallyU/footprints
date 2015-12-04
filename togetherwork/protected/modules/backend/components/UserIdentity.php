<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/

		//校验username和password的真实性,根据用户名查询是否有相关信息
		$user_model = Admin::model()->find('username=:name',array(':name'=>$this->username));

		//如果用户名不存在
		if($user_model === null){
                $this -> errorCode = self::ERROR_USERNAME_INVALID;
                return false;
            } else if ($user_model->password !== $this -> password){
                //密码判断
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
                return false;
            } else {
            	$user_model->createtime=time();
				//$user_model->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
				$user_model->save(false);
				$this->setState('createtime',$user_model->createtime);
				$this->setState('username',$user_model->username);
                $this->errorCode=self::ERROR_NONE;
                return true;
            }

		

		/*if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/
	}
}