<?php

/**
 * This is the model class for table "genre".
 *
 * The followings are the available columns in table 'genre':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $sort_index
 * @property string $last_update
 */
class Genre extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Genre the static model class
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
		return 'genre';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, sort_index', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('last_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, sort_index, last_update', 'safe', 'on'=>'search'),
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
			'name' => 'ジャンル名',
			'type' => 'タイプ',
			'sort_index' => '順番',
			'last_update' => '更新日時',
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
		$criteria->compare('sort_index',$this->sort_index);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getTypeList()
	{
		return array (
				Item::TYPE_ITEM_APP => 'アプリ',
				Item::TYPE_ITEM_CD_MUSIC => 'CD音楽',
				Item::TYPE_ITEM_VIDEO_MUSIC => 'MUSICビデオ',
		);
	}
	
	public function getType()
	{
		$type_list = $this->getTypeList();
		$type = isset($type_list[$this->type]) ? $type_list[$this->type] : "未定義"; 
	
		return $type;
	}
}