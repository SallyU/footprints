<?php

/**
 * This is the model class for table "{{msg}}".
 *
 * The followings are the available columns in table '{{msg}}':
 * @property string $id
 * @property integer $uid
 * @property integer $touid
 * @property string $content
 * @property integer $state
 * @property integer $time
 */
class Msg extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Msg the static model class
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
		return '{{msg}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid,state,touid, time', 'numerical', 'integerOnly'=>true),
			array('content', 'required','message'=>'对不填任何内容就点我的人,表示彻底无语-_-!'),
			array('content','length', 'min'=>5,'max'=>180,'tooShort'=>'对少于5个字的内容就点我的人,表示无语-_-!','tooLong'=>'亲的私信太长啦，保持在180个字数之内哦^_^~'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, touid, content, state, time', 'safe', 'on'=>'search'),
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
			'senduser'=>array(self::BELONGS_TO, 'User', 'uid'),
			'touser'=>array(self::BELONGS_TO, 'User', 'touid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'touid' => 'Touid',
			'content' => 'Content',
			'state' => 'State',
			'time' => 'Time',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('touid',$this->touid);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('time',$this->time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}