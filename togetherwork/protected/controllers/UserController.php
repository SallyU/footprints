<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");//不是严重错误忽略
/**
 *用户控制器
 *
 */
class UserController extends Controller{

	//public $layout='common';
	public $layout = 'togetherwork';
	/**
	 *用户登录方法
	 */

	//在controller里声明$this->widget('CCaptcha')验证码,调用CCaptchaAction，只能在控制器里面使用
	public function actions()
	{
		return array(
				'captcha'=>array(
							'class'=>'system.web.widgets.captcha.CCaptchaAction',
							'backColor'=>0xCCCCCC,
							// 'testLimit'=>1,
							'width'=>75,    //默认120
							'height'=>30,    //默认50
							// 'padding'=>2,    //文字周边填充大小
							// 'backColor'=>0xFFFFFF,      //背景颜色
							// 'foreColor'=>0x2040A0,     //字体颜色
							// 'minLength'=>6,      //设置最短为6位
							// 'maxLength'=>7,       //设置最长为7位,生成的code在6-7直接rand了
							// 'transparent'=>false,      //显示为透明,默认中可以看到为false
							// 'offset'=>-2,        //设置字符偏移量
							// 'controller'=>'admin',        //拥有这个动作的controller
				),
			);
	}

	public function actionLogin(){
		//echo 'Yuan want to login system!';
		//通过控制器来调用视图
		//renderPartial()调用视图，不渲染布局，render可以
		//$this->renderPartial('login');
		if(!Yii::app()->user->isGuest){

            $this->redirect(array('user/home','uid'=>Yii::app()->user->id));

        }

		//创建登录模型对象
		$user_login = new LoginForm();

		if(isset($_POST['LoginForm']))
		{
			//收集登录表单信息
			$user_login-> attributes = $_POST['LoginForm']; 

			//持久化用户信息 session,login()方法
			//校验通过 validate()方法
			if($user_login->validate() && $user_login->login())
				//$this->redirect(Yii::app()->user->returnUrl);//session 储存，开始
				//$this->redirect("./index.php?r=user/home&id=$id");
				//$this->redirect(Yii::app()->request->urlReferrer);
				$this->redirect(array('user/home','uid'=>Yii::app()->user->id));

		}


		$this->render('login',array('user_login'=>$user_login));
	}

	/**
	*退出登录
	*/
	public function actionLogout()
	{
		//删除session信息
		/**
		*Yii::app()->session->clear();//删除session变量
		*Yii::app()->session->destroy();//删除服务器的session
		*/
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
		$this -> redirect_message('退出成功！','success','3',$this -> redirect(Yii::app()->homeUrl));

	}
	/**
	 *用户注册
	 */
	public function actionRegister(){
		if(!Yii::app()->user->isGuest){

            $this->redirect(Yii::app()->homeUrl);

        }
		$user_model = new User();

		//用户注册信息处理
		if(isset($_POST['User'])){

			//收集复选框数组传递来的信息，用implode转化
			// if(is_array($_POST['User']['hobby']))
			// 	$_POST['User']['hobby'] = implode(',', $_POST['User']['hobby']);
			$user_model -> attributes = $_POST['User'];

			$upphoto = CUploadedFile::getInstance($user_model,'photo');//获得一个CUploadedFile的实例
			if(is_object($upphoto)&&get_class($upphoto) === 'CUploadedFile')// 判断实例化是否成功  
			{
				$user_model->photo = './up/userphotos/avatar_'.time().'_'.rand(0,9999).'.'.$upphoto->extensionName;//定义文件保存的名称
				}else{  
                $user_model->photo = './up/userphotos/nophoto.jpg';// 若果失败则应该是什么图片  
            }    

			if($user_model->save())
			{
				if(is_object($upphoto)&&get_class($upphoto) === 'CUploadedFile'){  
                    $upphoto->saveAs($user_model->photo);// 上传图片  
                }  


				//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				//Yii::app()->user->setFlash('success','添加成功!');
				//重定向
				$this -> redirect_message('注册成功！','success','3',$this -> createUrl('user/login'));
			}
		}

		$this->render('register',array('user_model'=>$user_model));
	}


	// 用户空间，当别人访问时显示
	public function actionHome($uid)
	{
		if(Yii::app()->user->isGuest){

            $this->redirect('./index.php?r=user/login');

        }
        $vhid=$uid;
		$user = User::model()->findByPk($uid);

		$user->visitor+=1;
		$user->save(false);

		if($uid !=Yii::app()->user->id){
		$visit = new Visitor();
		$visit->uid = Yii::app()->user->id;
		$visit->toid=$uid;
		$visit->time=time();
		$visit->save(false);}
		//活跃用户展示
        $yaya = User::model()->findAll(array('order'=>'update_time desc','limit'=>16));

        //思想展示
        $sql = "select * from {{article}} where author_id = $uid order by create_time desc limit 0, 20 ";
        $sixiang = Article::model()->findAllBySql($sql);

        //标签展示
        $sq = "select * from {{usertags}} where uid = $uid order by create_time desc";
        $bq = Usertags::model()->findAllBySql($sq);

        //home页面用户关注的丫丫数量
        $uf= "select * from {{follow}} where uid=$uid";
        $userfollow = count(Follow::model()->findAllBySql($uf));

        //home页面粉丝数量
        $fan = "select * from {{follow}} where touid=$uid";
        $fans = count(Follow::model()->findAllBySql($fan));


        //访问我的主页的用户展示
        $userid = Yii::app()->user->id;
		$cs1 ="select *,count(distinct uid) from {{visitor}} where toid=$userid group by uid order by time desc limit 16";
		$fangwenwo = Visitor::model()->findAllBySql($cs1);

		$cs2 ="select *,count(distinct toid) from {{visitor}} where uid=$vhid group by toid order by time desc limit 16";
		$visitwho = Visitor::model()->findAllBySql($cs2);

		$data = array(
			'user'=>$user,
			'yaya'=>$yaya,
			'sixiang'=>$sixiang,
			'bq'=>$bq,
			'userfollow'=>$userfollow,
			'fans'=>$fans,
			'fangwenwo'=>$fangwenwo,
			'visitwho'=>$visitwho,
			);
		$this->render('home',$data);

	}

	public function actionIndex()
	{

		$this->render('index');
	}

	// 展示我的收藏首页及感觉
	public function actionFav()
	{
		$id = Yii::app()->user->id;
		$sql = "select * from {{shoucang}} where uid = $id order by shoucang_time desc";
		$model = Shoucang::model()->findAllBySql($sql);
		// 统计收藏的数目
		$count = count($model);

		$data =array('model'=>$model,'count'=>$count);
		$this->render('fav',$data);
	}

	// 取消我收藏的感觉
	public function actionQuxiao($id)
	{
		$model = Shoucang::model()->findByPk($id);
		if($model->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
			Yii::app()->user->setFlash('quxiao','取消收藏成功 -_-!');
			$this->redirect('./index.php?r=user/fav');
	}


	// 我的图片收藏
	public function actionMystore()
	{
		$id = Yii::app()->user->id;
		$sql = "select * from {{Picshoucang}} where pic_uid = $id order by store_time desc";
		$model = Picshoucang::model()->findAllBySql($sql);
		// 统计收藏的数目
		$count2 = count($model);

		$data =array('model'=>$model,'count2'=>$count2);
		$this->render('mystore',$data);
	}

	// 取消我收藏的图片
	public function actionUnstore($id)
	{
		$model = Picshoucang::model()->findByPk($id);
		if($model->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
			Yii::app()->user->setFlash('unstore','取消收藏成功 -_-!');
			$this->redirect('./index.php?r=user/mystore');
	}


	//个人资料
	public function actionMyprofile()
	{
		$id = Yii::app()->user->id;
		$model = User::model()->findByPk($id);
	
		if(isset($_POST['User'])) {
			$model->username = $_POST['User']['username'];
			$model->email = $_POST['User']['email'];
			$model->nickname = $_POST['User']['nickname'];
			$model->sex = $_POST['User']['sex'];
			$model->qq = $_POST['User']['qq'];
			$model->introduce = $_POST['User']['introduce'];
			$model->tel = $_POST['User']['tel'];
			$model->save();
			$this->refresh();
		}
		//var_dump('nono');exit;
		$this->render('myprofile',array('model'=>$model));
	}

	//修改个人信息
	public function actionEditmyprofile()
	{
		//性别信息定义
		$sex[1]='保密';
		$sex[2]='男';
		$sex[3]='女';

		$id = Yii::app()->user->id;
		$model = User::model()->findByPk($id);
		if(isset($_POST['User'])) {
			$model->nickname = $_POST['User']['nickname'];
			$model->sex = $_POST['User']['sex'];
			$model->qq = $_POST['User']['qq'];
			$model->introduce = $_POST['User']['introduce'];
			$model->tel = $_POST['User']['tel'];
				if($model->save(false)){
				    $this -> redirect_message('资料更新成功！','success','3',$this -> createUrl('user/myprofile'));
					//$this->redirect('./index.php?r=user/myprofile');//跳转到详细信息
				}else{
					echo '失败';
					exit;
				}
			}
		$this->render('editmyprofile',array('model'=>$model,'sex'=>$sex));

	}

	// 修改密码
	public function actionEdit_password()
	{

		if(Yii::app()->user->isGuest) {
			$this->redirect(Yii::app()->homeUrl);
		}
		//$this->layout = 'user';//局部布局引用

		$id = Yii::app()->user->id;
		if(empty($id)){
			throw new CHttpException(404,'非法操作！');
		}
		$model = User::model()->findByPk($id);
		if(empty($model)){
			throw new CHttpException(404,'您请求的页不存在！');
		}

		if(!empty($_POST['User']))
		{
			$old = $_POST['User']['oldpass'];
			$new = $_POST['User']['newpass'];
			$new2 = $_POST['User']['newpass2'];
			if(md5($old) != $model->password)
			{
				$model->addError('oldpass', '原密码输入错误');
			}else{
				if($new != $new2)
				{
					$model->addError('newpass2','两次输入的新密码不一致');
				}else{
					$model->password = md5($new);
					//$model->save();
					if($model->save(false)){
						Yii::app()->user->logout();
						$this -> redirect_message('密码修改成功,请重新登录！','success','3',$this -> createUrl('user/login'));
				}

				}
			}			
		}
		$data = array(
				'model' => $model,
		);




		$this->render('edit_password',$data);
	}

}