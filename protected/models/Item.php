<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $genre_id
 * @property string $content
 * @property integer $price
 * @property string $icon
 * @property integer $rate
 * @property string $start_date
 * @property string $end_date
 * @property integer $status
 * @property integer $daily_quota
 * @property integer $weekly_quota
 * @property integer $amount
 * @property string $inventory
 * @property string $last_update
 * @property string $create_time
 */
class Item extends CActiveRecord
{
	const TYPE_ITEM_APP			= 1;
	const TYPE_ITEM_CD_MUSIC	= 2;
	const TYPE_ITEM_VIDEO_MUSIC = 3;
	const SAVED_PATH_FOR_ICON   = '/images/item/icon/';
	public $image;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, genre_id, price, rate, status, daily_quota, weekly_quota, amount', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('icon, image', 'length', 'max'=>255, 'on'=>'insert, update'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('inventory', 'length', 'max'=>45),
			array('content, start_date, end_date, last_update, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, genre_id, content, price, icon, rate, start_date, end_date, status, daily_quota, weekly_quota, amount, inventory, last_update, create_time', 'safe', 'on'=>'search'),
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
			'name' => 'アイテム名',
			'type' => 'タイプ',
			'genre_id' => 'ジャンル',
			'content' => '内容',
			'price' => '値段',
			'icon' => 'アイコン',
			'rate' => 'レート',
			'start_date' => '開始日',
			'end_date' => '終了日',
			'status' => 'ステータス',
			'daily_quota' => '日上限',
			'weekly_quota' => '週上限',
			'amount' => '総量',
			'inventory' => '残り数',
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
		$criteria->compare('genre_id',$this->genre_id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('daily_quota',$this->daily_quota);
		$criteria->compare('weekly_quota',$this->weekly_quota);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('inventory',$this->inventory,true);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTypeList()
	{
		return array (
				self::TYPE_ITEM_APP => 'アプリ',
				self::TYPE_ITEM_CD_MUSIC => 'CD音楽',
				self::TYPE_ITEM_VIDEO_MUSIC => 'MUSICビデオ',
		);
	}
	
	public function getType()
	{
		$type_list = $this->getTypeList();
		$ptype = isset($type_list[$this->type]) ? $type_list[$this->type] : "未定義"; 
	
		return $ptype;
	}
	
	public function getIcon()
	{
		return self::SAVED_PATH_FOR_ICON . $this->icon;
	}

	public function getSavedPathForIcon()
	{
		return dirname(Yii::app()->request->scriptFile) . self::SAVED_PATH_FOR_ICON;
	}

	public function getStatus()
	{
		return $this->status ? "表示" : "非表示";
	}

	public function getGenre()
	{
		return Genre::model()->find($this->genre_id)->name;
	}
}