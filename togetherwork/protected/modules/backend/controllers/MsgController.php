<?php

class MsgController extends Controller{

	public $layout='admin';

	public function actionIndex()
	{
		$model = Msg::model();

		//1.获得总的记录数目
        $cnt = $model -> count();
        $per = 10;
        
        //2. 实例化分页类对象
        $page = new Pagination($cnt, $per);
        
        //3. 重新按照分页的样式拼装sql语句进行查询
        $sql = "select * from {{msg}} order by time desc $page->limit";
        $msgshow = $model -> findAllBySql($sql);
        
        //4. 获得分页页面列表(需要传递到视图模板里边显示)
        //$page_list = $page->fpage(array(3,4,5,6,7));//部分显示

        //全部显示
        $page_list = $page->fpage();
        


        $data=array('msg'=>$msgshow,'page_list'=>$page_list);

		$this->render('index',$data);
	}


	//删除
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
		$model = Msg::model()->findByPk($id);
		if($model->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				Yii::app()->user->setFlash('shanchu','删除成功!');
			$this->redirect('./index.php?r=backend/msg/index');
	}



}