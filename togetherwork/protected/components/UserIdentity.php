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

		//校验username和password的真实性,根据用户名查询是否有相关信息
		$user_model = User::model()->find('username=:name',array(':name'=>$this->username));

		//如果用户名不存在
		if($user_model === null){
                $this -> errorCode = self::ERROR_USERNAME_INVALID;
                return false;
            } else if ($user_model->password !== md5($this -> password)){
                //密码判断,此处将需要验证的密码进行MD5加密再做比较
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
                return false;
            } else {

            	//$user_model->last_login_time=update_time();
				//$user_model->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
				//$user_model->save(false);
				//设置session信息
				$this->setState('nickname',$user_model->nickname);
				$this->setState('username',$user_model->username);
				$this->setState('photo',$user_model->photo);
				$this->setState('id',$user_model->id);
				$this->setState('qq',$user_model->qq);
				$this->setState('email',$user_model->email);
				$this->setState('regtime',$user_model->regtime);
				//$this->setState('introduce',$user_model->introduce);

                $this->errorCode=self::ERROR_NONE;
                return true;
            }
	}
}