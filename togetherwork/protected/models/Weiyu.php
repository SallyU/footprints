<?php

/**
 * This is the model class for table "{{weiyu}}".
 *
 * The followings are the available columns in table '{{weiyu}}':
 * @property string $id
 * @property string $weiyu_content
 * @property string $author_name
 * @property string $create_time
 * @property string $update_time
 * @property string $create_user_id
 */
class Weiyu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Weiyu the static model class
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
		return '{{weiyu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('weiyu_content', 'required','message'=>'对不填任何内容就点我的人,表示彻底无语-_-!'),
			array('weiyu_content','length', 'min'=>5,'max'=>300,'tooShort'=>'对少于5个字的内容就点我的人,表示无语-_-!','tooLong'=>'亲的微语太长啦，去发个思想吧^_^~'),
			array('create_time,update_time ,author_name, create_user_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('author_name', 'safe', 'on'=>'search'),
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
			'userid' => array(self::BELONGS_TO, 'User', 'create_user_id'),
		);
	}

	/**
	*beforeSave预处理内容
	*/
	public function beforeSave()
	{
	    if (parent::beforeSave()){
	    
	        if ($this->isNewRecord){
	            $this->create_time = $this->update_time = time();
	            


	        }else {
	            $this->update_time = time();
	        }
	        return true;
	    }else{
	        return false;
	    }
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'weiyu_content' => 'Weiyu Content',
			'author_name' => 'Author Name',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'create_user_id' => 'Create User',
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
		$criteria->compare('weiyu_content',$this->weiyu_content,true);
		$criteria->compare('author_name',$this->author_name,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}