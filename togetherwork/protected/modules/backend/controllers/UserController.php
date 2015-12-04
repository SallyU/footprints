<?php

class UserController extends Controller{

	public $layout='admin';

	public function actionIndex(){
		//1.获得总的记录数目
        $cnt = count(User::model()->findAll());
        $per = 10;
        
        //2. 实例化分页类对象
        $page = new Pagination($cnt, $per);

        //3. 重新按照分页的样式拼装sql语句进行查询
        $sql = "select * from {{user}} order by regtime desc $page->limit";
        $users = User::model() -> findAllBySql($sql);

        //全部显示
        $page_list = $page->fpage();

        $data=array('users'=>$users,'page_list'=>$page_list,'cnt'=>$cnt);






		$this->render('index',$data);
	}

	public function actionInfo($uid)
	{
		$id = $uid;
		$model = User::model()->findByPk($id);
		$data=array('model'=>$model);


		$this->render('info',$data);
	}




}