<?php

/**
 * This is the model class for table "app_setting".
 *
 * The followings are the available columns in table 'app_setting':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $fmvalue
 * @property string $last_update
 * @property string $create_time
 */
class AppSetting extends CActiveRecord
{
	const TYPE_APP_SETTING_BOOL_VALUE	= 1;
	const TYPE_APP_SETTING_STRING_VALUE	= 2;
	const TYPE_APP_SETTING_INT_VALUE	= 3;

	const APP_SETTING_ID_SHOW_TOP_MODULE	= 1;
	const APP_SETTING_ID_SHOW_FRIEND_MODULE = 2;

	const APP_SETTING_ID_COLLECTION1		= 3;
	const APP_SETTING_ID_COLLECTION2		= 4;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AppSetting the static model class
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
		return 'app_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly'=>true),
			array('name, fmvalue', 'length', 'max'=>45),
			array('last_update, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, fmvalue, last_update, create_time', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'type' => 'タイプ',
			'fmvalue' => '値',
			'last_update' => '更新日時',
			'create_time' => '登録日時',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('fmvalue',$this->fmvalue,true);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTypeList()
	{
		return array (
				self::TYPE_APP_SETTING_BOOL_VALUE => '表示/非表示',
				self::TYPE_APP_SETTING_STRING_VALUE => '画像',
				self::TYPE_APP_SETTING_INT_VALUE => 'INT',
				);
	}
	
	public function getType()
	{
		$type = "";
		switch ($this->type)
		{
			case self::TYPE_APP_SETTING_BOOL_VALUE:
				$type = "表示/非表示";
				break;
			case self::TYPE_APP_SETTING_STRING_VALUE:
				$type = "画像";
				break;
			case self::TYPE_APP_SETTING_INT_VALUE:
				$type = "INT"; 
				break;
			default:
				$type = "未定義";
				break;
		}
		
		return $type;
	}
	
	public function getFMValue()
	{
		$value = "";
		
		switch ($this->type)
		{
			case self::TYPE_APP_SETTING_BOOL_VALUE:
				$value = $this->fmvalue ? "表示" : "非表示";
				break;
			case self::TYPE_APP_SETTING_STRING_VALUE:
				$value = CHtml::image($this->fmvalue, "特集", array("width"=>302, "height"=>65));
				break;
			case self::TYPE_APP_SETTING_INT_VALUE:
				$value = $this->fmvalue;
				break;
			default:
				$value = $this->fmvalue;
				break;
		}
		return html_entity_decode($value);
	}
}