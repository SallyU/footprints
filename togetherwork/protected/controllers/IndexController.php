<?php
/**
 *首页控制器
 */
class IndexController extends Controller{
	//public $layout='common';
	public $layout = 'togetherwork';
	/**
	 *展示首页
	 */

	// 每日一句  首页展示
    private $quotes = array(
        array('你要相信世界上每一个人都精明，要令人信服并喜欢和你交往,那才最重要。', '李嘉诚'),
        array('该放下时且放下，你宽容别人，其实是给自己留下来一片海阔天空。', '于丹'),
        array('免费，是世界上最贵的东西。', '马云'),
        array('没有捕捉不到的猎物，就看你有没有野心去捕;没有完成不了的事情，就看你有没有野心去做。', '狼图腾'),
        array('君志所向，一往无前，愈挫愈勇，再接再厉。', '孙中山'),
        array('在这里，我们可以一起走向心的深处，一起笑，一起哭，一起思考，一起分享，一起体会不一样的感觉，一起记录不一样的美好时光。','渠开源'),
    );
    
    private function getRandomQuote()
    {
        return $this->quotes[array_rand($this->quotes, 1)];
    }

    
    function actionIndex()
    {
        //首页幻灯片展示，读取最新4条
        $ppt = Article::model()->findAll(array('order'=>'create_time desc','limit'=>4));

        //首页最新微语展示
        $wei = Weiyu::model()->findAll(array('order'=>'create_time desc'));

        // 首页点击率思想展示
        $sixiang = Article::model()->findAll(array('order'=>'click desc','limit'=>8));

        // 首页得瑟会员、小丫丫展示
        $jiaoya = User::model()->findAll(array('order'=>'regtime desc','limit'=>5));

        //首页展示标签
        $pictag = Albumcate::model()->findAll();

        $articletag = Type::model()->findAll();

        //首页展示新的图
        $likepic = Album::model()->findAll(array('order'=>'create_time desc','limit'=>9));

        $data=array(
            'quote' => $this->getRandomQuote(),
            'ppt'=>$ppt,
            'wei'=>$wei,
            'sixiang'=>$sixiang,
            'jiaoya'=>$jiaoya,
            'pictag'=>$pictag,
            'likepic'=>$likepic,
            'articletag'=>$articletag,
            );

        $this->render('index',$data);
    }
    
    function actionGetQuote()
    {
        $this->renderPartial('_quote', array(
            'quote' => $this->getRandomQuote(),
        ));
    }
}