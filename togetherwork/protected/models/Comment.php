<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property string $content
 * @property integer $create_time
 * @property integer $article_id
 * @property integer $comment_userid
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
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
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content', 'required','message'=>'对不填任何内容就点我的人,表示彻底无语-_-!'),
			array('content','length', 'min'=>5,'max'=>140,'tooShort'=>'对少于5个字的内容就点我的人,表示无语-_-!','tooLong'=>'亲的评论太长啦，保持在微博的字数之内哦^_^~'),
			array('create_time, article_id, comment_userid', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, create_time, article_id, comment_userid', 'safe', 'on'=>'search'),
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
			'commentusers'=>array(self::BELONGS_TO, 'User', 'comment_userid'),
			'commentarticles'=>array(self::BELONGS_TO,'Article','article_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'create_time' => 'Create Time',
			'article_id' => 'Article',
			'comment_userid' => 'Comment Userid',
		);
	}

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
				$this->create_time = time();
			return true;
		}
		else
			return false;
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('comment_userid',$this->comment_userid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}