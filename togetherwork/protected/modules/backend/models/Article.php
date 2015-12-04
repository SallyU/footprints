<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property integer $cateId
 * @property integer $pid
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
			// array('cateId, pid, title, content, img, click, create_time, status, author, update_time, source, top, sort, des, keywords', 'required'),
			array('create_time, update_time', 'required'),
			
			// array('cateId, pid, click, create_time, status, update_time, top, sort', 'numerical', 'integerOnly'=>true),
			array('create_time, update_time', 'numerical', 'integerOnly'=>true),
			//array('title, des, keywords', 'length', 'max'=>255),
			array('title, des', 'length', 'max'=>255),
			array('title', 'required','message'=>'标题不能为空'),
			array('author', 'required','message'=>'作者不能为空'),
			array('des', 'required','message'=>'描述不能为空'),
			array('content','required','message'=>'内容不能为空'),
			//array('img', 'length', 'max'=>128),
			array('author', 'length', 'max'=>30),
			//array('source', 'length', 'max'=>100),
			array('des, content','safe'),
			array('img', 'file', 'types'=>'jpeg,jpg, gif, png','allowEmpty' =>true,'maxSize'=>1024*1024*10,'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cateId, pid, title, content, img, click, create_time, status, author, update_time, source, top, sort, des, keywords', 'safe', 'on'=>'search'),
		);
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
			'type'=>array(self::BELONGS_TO, 'Type', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cateId' => '分类',
			'title' => '标题',
			'content' => '内容',
			'img' => '图片',
			'click' => '点击次数',
			'create_time' => '创建时间',
			'status' => '状态',
			'author' => '作者',
			'update_time' => '修改时间',
			'source' => '来源',
			'top' => '置顶',
			'sort' => '排序',
			'des' => '描述',
			'keywords' => '关键词(以,号分割)',
		);
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
		$criteria->compare('cateId',$this->cateId);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('click',$this->click);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('top',$this->top);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('keywords',$this->keywords,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}