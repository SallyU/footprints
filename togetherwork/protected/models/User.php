<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $username
 * @property string $nickname
 * @property string $password
 * @property string $email
 * @property integer $sex
 * @property string $qq
 * @property string $hobby
 * @property string $photo
 * @property string $introduce
 * @property string $regtime
 * @property string $update_time
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */

	public $passwordConfirm;
	public $verifyCode;

	public $oldpass;
	public $newpass;
	public $newpass2;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() 
	{
        return array(
        	array('username', 'length', 'min'=>4,'max'=>64,'tooShort'=>'用户名太短,请控制在4-14个字符.','tooLong'=>'用户名过长,请控制在4-14个字符.'),
            array('username','required','message'=>'用户名不能为空'),
            array('username','unique','message'=>'此用户名已经注册，换一个吧'),
            array('nickname','length', 'min'=>2,'max'=>50,'tooShort'=>'昵称太短,请控制在2-12个字符.','tooLong'=>'昵称过长,请控制在2-12个字符.'),
            array('nickname','required','message'=>'昵称不能为空'),
            array('nickname','unique','message'=>'此昵称太受欢迎，换一个吧'),
            array('password, passwordConfirm', 'length', 'min'=>6, 'max'=>32, 'tooShort'=>'密码太短,请控制在6-16个字符.','tooLong'=>'密码过长,请控制在6-16个字符.'),
            array('password,passwordConfirm','required','message'=>'密码不能为空'),
            array('passwordConfirm','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一样'),//passwordComfirm的值必须和password相同
            array('email','required','message'=>'邮箱不能为空'),
            array('email','unique','message'=>'此邮箱已经注册'),
			array('email', 'length', 'max'=>50),
			array('email','email','allowEmpty'=>false,'message'=>'邮箱格式不正确'),
			array('qq','match','pattern'=>'/[1-9]\d{4,11}$/','message'=>'请输入正确的QQ号码'),
			array('tel', 'match','pattern' => '/^13[0-9]{1}[0-9]{8}$|15[01256789]{1}[0-9]{8}$|18[0256789]{1}[0-9]{8}$|147[0-9]{8}$/','message' => '请输入正确的手机号码'),
			//复选框爱好验证，在此需要自定义方法,在当前模型定义方法
			//array('hobby','check_hobby'),

			array('photo', 'file', 'types'=>'jpg, gif, png','allowEmpty' =>true,'maxSize'=>1024*1024*10,'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！'),
			
			//array('xueli','in','range'=>array(2,3,4,5,6),'message'=>'请选择学历'),

			//为没有具体验证规则的属性给予safe()规则，否则attribute不接受信息
			array('introduce', 'safe'),

			array('verifyCode','required','message'=>'验证码不能为空'),
			array('verifyCode','captcha','message'=>'验证码输入错误,请重新输入！'),
			array('regtime, update_time', 'length', 'max'=>11),

			array('sex', 'numerical', 'integerOnly'=>true),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, nickname', 'safe', 'on'=>'search'),
        );
    }

    /**
    *@check_hobby 爱好复选框自定义方法
    */
    // public function check_hobby()
    // {
    // 	//$this->属性名字；就是在调用模型对象的相关属性信息
    // 	//$this就是在controller里面实例化好的模型对象
    // 	$len = strlen($this->hobby);
    // 	if($len<3)
    // 		$this->addError('hobby','(温馨提示:爱好请至少选择两项)');
    // 		//addError和数组中message效果是一样的
    // }


    /**
    *保存注册时间和密码进行MD5加密
    */
	public function beforeSave()
	{
		if (parent::beforeSave()){
			if($this->isNewRecord){
				//md5加密与检查confirmPassword
				$this->password = md5($this->password);
				$this->passwordConfirm = md5($this->passwordConfirm);

				$this->regtime=time();
				$this->update_time=time();
	        }
	        return true;//必须以return为true，才能将数据写入数据库
		}else{
	        return false;
	    }
	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'articles' => array(self::HAS_MANY, 'Article', 'author_id'),
			'weiyus' => array(self::HAS_MANY, 'Weiyu', 'create_user_id'),
			'tags' => array(self::HAS_MANY, 'Usertags', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => '用户名',
			'nickname' => '昵称',
			'password' => '密码',
			'passwordConfirm'=>'密码确认',
			'email' => '邮箱',
			'qq' => 'QQ',
			'sex' => '性别',
			'tel' => '手机号码',
			'photo' => '头像',
			'introduce' => '社区签名',
			'verifyCode'=>'验证码',
			'regtime' => '注册时间',
			'update_time' => '更新时间',
			'oldpass'=>'原密码',
			'newpass'=>'新密码',
			'newpass2'=>'重复新密码',
		);
	}

	//验证码sA部分
	public function safeAttributes()
	{
		return array(
			'verifyCode','xx','yy','aa','zz','00','11','33',);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		//$criteria->compare('hobby',$this->hobby,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('introduce',$this->introduce,true);
		$criteria->compare('regtime',$this->regtime,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}