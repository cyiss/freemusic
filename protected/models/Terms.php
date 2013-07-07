<?php

/**
 * This is the model class for table "terms".
 *
 * The followings are the available columns in table 'terms':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $is_valid
 * @property integer $sort_index
 * @property string $last_update
 * @property string $create_time
 */
class Terms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Terms the static model class
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
		return 'terms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_valid, sort_index', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('content, last_update, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, is_valid, sort_index, last_update, create_time', 'safe', 'on'=>'search'),
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
			'title' => 'タイトル',
			'content' => '内容',
			'is_valid' => '表示/非表示',
			'sort_index' => '順番',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('is_valid',$this->is_valid);
		$criteria->compare('sort_index',$this->sort_index);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getIsValid()
	{
		return $this->is_valid ? "表示" : "非表示";
	}
}