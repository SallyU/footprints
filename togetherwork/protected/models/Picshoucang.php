<?php

/**
 * This is the model class for table "{{picshoucang}}".
 *
 * The followings are the available columns in table '{{picshoucang}}':
 * @property string $id
 * @property integer $pic_uid
 * @property integer $pic_id
 * @property integer $store_time
 */
class Picshoucang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Picshoucang the static model class
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
		return '{{picshoucang}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pic_uid, pic_id, store_time', 'required'),
			array('pic_uid, pic_id, store_time', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pic_uid, pic_id, store_time', 'safe', 'on'=>'search'),
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
			'user_store'=>array(self::BELONGS_TO, 'User', 'pic_uid'),
			'pic'=>array(self::BELONGS_TO,'Album','pic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pic_uid' => 'Pic Uid',
			'pic_id' => 'Pic',
			'store_time' => 'Store Time',
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
		$criteria->compare('pic_uid',$this->pic_uid);
		$criteria->compare('pic_id',$this->pic_id);
		$criteria->compare('store_time',$this->store_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}