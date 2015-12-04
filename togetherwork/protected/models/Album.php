<?php

/**
 * This is the model class for table "{{album}}".
 *
 * The followings are the available columns in table '{{album}}':
 * @property integer $id
 * @property string $name
 * @property integer $photo_cate_id
 * @property string $album_img
 * @property string $user_name
 * @property string $user_id
 * @property integer $create_time
 */
class Album extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Album the static model class
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
		return '{{album}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photo_cate_id, create_time', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('name', 'required', 'message'=>'对于不填标题的人无语中。。'),
			array('photo_cate_id', 'required', 'message'=>'必须选一个类别哦！'),
			array('user_id', 'length', 'max'=>10),
			array('album_img', 'file', 'types'=>'jpeg,jpg, gif, png','allowEmpty' =>false,'maxSize'=>1024*1024*10,'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！','message'=>'必须选择一张图片才能提交哦！'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, photo_cate_id, album_img, user_id, create_time', 'safe', 'on'=>'search'),
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
			'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
			'cate'=>array(self::BELONGS_TO, 'Albumcate', 'photo_cate_id'),
			'store'=>array(self::HAS_MANY,'Picshoucang','pic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'photo_cate_id' => 'Photo Cate',
			'album_img' => 'Album Img',
			'user_id' => 'User',
			'create_time' => 'Create Time',
		);
	}

	/**
	 * This is invoked after the record is deleted.删除图片之后删除相应的内容
	 */
	protected function afterDelete()
	{
		parent::afterDelete();
		Picshoucang::model()->deleteAll('pic_id='.$this->id);
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('photo_cate_id',$this->photo_cate_id);
		$criteria->compare('album_img',$this->album_img,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}