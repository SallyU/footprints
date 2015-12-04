<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property integer $type_id
 * @property integer $author_id
 * @property string $title
 * @property string $content
 * @property string $img
 * @property integer $click
 * @property integer $create_time
 * @property integer $status
 * @property string $author
 * @property integer $update_time
 * @property string $source
 * @property integer $top
 * @property integer $sort
 * @property string $des
 * @property string $keywords
 */
class Article extends CActiveRecord
{
	//1、2、3分别代表草稿，已经发布，已经存档
	const STATUS_DRAFT=1;
	const STATUS_PUBLISHED=2;
	const STATUS_ARCHIVED=3;

	/*//使用方法,获取可用的日志状态列表
	Lookup::items('ArticleStatus');
	Lookup::item('ArticleStatus',Article::STATUS_PUBLISHED);//获取发布状态的文本表现形式
	*/

	private $_oldTags;


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, des, keywords', 'length', 'max'=>255),
			array('title', 'required','message'=>'标题不能为空'),
			array('des', 'required','message'=>'描述不能为空'),
			array('content','required','message'=>'内容不能为空'),
			array('img', 'file', 'types'=>'jpeg,jpg, gif, png','allowEmpty' =>true,'maxSize'=>1024*1024*10,'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！'),
			array('type_id, content, author_id, title, content, img, create_time,update_time,des, keywords','safe'),
			//array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Tags can only contain word characters.'),
			//array('tags', 'normalizeTags'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title, author', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * Normalizes the user-entered tags.
	 */
	public function normalizeTags($attribute,$params)
	{
		$this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'users'=>array(self::BELONGS_TO, 'User', 'author_id'),
			/*'comments' => array(self::HAS_MANY, 'Comment', 'article_id', 'condition'=>'comments.status='.Comment::STATUS_APPROVED, 'order'=>'comments.create_time DESC'),
			'commentCount' => array(self::STAT, 'Comment', 'article_id', 'condition'=>'status='.Comment::STATUS_APPROVED),*/
			'type'=>array(self::BELONGS_TO, 'Type', 'type_id'),
			'shoucang'=>array(self::HAS_MANY,'Shoucang','sixiangid'),
			'comments' => array(self::HAS_MANY, 'Comment', 'article_id', 'order'=>'comments.create_time DESC'),
		);
		/*
		//$model->type->type_name,使用，type_name是表字段名字
		$article->author->username;//访问到文章发布人的用户名
		//通过这种方法访问文章所有的评论
		foreach($article->comments as $comment)
		{
			echo $comment->content;
		}*/
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id' => '所属分类',
			'title' => '标题',
			'content' => '内容',
			'click' => '点击次数',
			'create_time' => '创建时间',
			'status' => '状态',
			'tags' => 'Tags',
			'author' => '作者',
			'update_time' => '修改时间',
			'des' => '描述',
			'img'=>'封面',
			'keywords' => '关键词(以,号分割)',
		);
	}


	//添加评论方法
	public function addComment($comment)
	{
		$comment->article_id = $this->id;
		return $comment->save();
	}


	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('article/detail', array(
			'id'=>$this->id,
			'title'=>$this->title,
		));
	}

	public function beforeSave()
	{
		if($this->isNewRecord){
			$this->create_time = $this->update_time = time();
		}
		return true;//必须以return为true，才能将数据写入数据库
	}

	/**
	 * This is invoked after the record is deleted.删除文章之后删除相应的内容
	 */
	protected function afterDelete()
	{
		parent::afterDelete();
		Comment::model()->deleteAll('article_id='.$this->id);
		Shoucang::model()->deleteAll('sixiangid='.$this->id);
		//Tag::model()->updateFrequency($this->tags, '');
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

		$criteria->compare('id',$this->id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('click',$this->click);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('top',$this->top);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('keywords',$this->keywords,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}