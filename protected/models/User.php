<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $intro_user_id
 * @property integer $point
 * @property string $uuid
 * @property string $idfa
 * @property string $android_id
 * @property integer $device_type
 * @property string $last_update
 * @property string $create_time
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intro_user_id, point, device_type', 'numerical', 'integerOnly'=>true),
			array('uuid, idfa', 'length', 'max'=>36),
			array('android_id', 'length', 'max'=>20),
			array('last_update, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, intro_user_id, point, uuid, idfa, android_id, device_type, last_update, create_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'intro_user_id' => 'Intro User',
			'point' => 'Point',
			'uuid' => 'Uuid',
			'idfa' => 'Idfa',
			'android_id' => 'Android',
			'device_type' => 'Device Type',
			'last_update' => 'Last Update',
			'create_time' => 'Create Time',
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
		$criteria->compare('intro_user_id',$this->intro_user_id);
		$criteria->compare('point',$this->point);
		$criteria->compare('uuid',$this->uuid,true);
		$criteria->compare('idfa',$this->idfa,true);
		$criteria->compare('android_id',$this->android_id,true);
		$criteria->compare('device_type',$this->device_type);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}