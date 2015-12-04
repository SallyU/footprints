<?php

class WeiyuController extends Controller{

	public $layout='admin';

	public function actionIndex()
	{
		$model = Weiyu::model();

		//1.获得总的记录数目
        $cnt = $model -> count();
        $per = 10;
        
        //2. 实例化分页类对象
        $page = new Pagination($cnt, $per);
        
        //3. 重新按照分页的样式拼装sql语句进行查询
        $sql = "select * from {{weiyu}} order by create_time desc $page->limit";
        $weiyushow = $model -> findAllBySql($sql);
        
        //4. 获得分页页面列表(需要传递到视图模板里边显示)
        //$page_list = $page->fpage(array(3,4,5,6,7));//部分显示

        //全部显示
        $page_list = $page->fpage();
        


        $data=array('weiyu'=>$weiyushow,'page_list'=>$page_list);

		$this->render('index',$data);
	}

	public function actionUpdate($id)
	{
		$model = Weiyu::model()->findByPk($id);
		if(isset($_POST['Weiyu']))
		{
		$model->update_time=time();
		$model->weiyu_content=$_POST['Weiyu']['weiyu_content'];
			//调用save()方法实现数据添加
			if($model->save(false))
				//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				Yii::app()->user->setFlash('xiugai','修改成功!');
				$this->redirect('./index.php?r=backend/weiyu/index');
		}

	
		$this->render('update',array('model'=>$model));
	}

	//删除
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
		$model = Weiyu::model()->findByPk($id);
		if($model->delete())
			//添加成功时候的提示信息设置
				/**
				 *setFlash getFlash hasFlash 几个方法
				*/
				Yii::app()->user->setFlash('shanchu','删除成功!');
			$this->redirect('./index.php?r=backend/weiyu/index');
	}

}