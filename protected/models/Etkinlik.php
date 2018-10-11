<?php

/**
 * This is the model class for table "etkinlik".
 *
 * The followings are the available columns in table 'etkinlik':
 * @property integer $ID
 * @property string $adi
 * @property integer $Tip
 * @property integer $organizator
 * @property string $Tarih
 * @property integer $Yer
 * @property double $fiyat
 * @property integer $kontenjan
 */
class Etkinlik extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Etkinlik the static model class
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
		return 'etkinlik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('adi, Tip, organizator, Tarih, Yer, fiyat, kontenjan', 'required'),
			array('Tip, organizator, Yer, kontenjan', 'numerical', 'integerOnly'=>true),
			array('fiyat', 'numerical'),
			array('adi', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, adi, Tip, organizator, Tarih, Yer, fiyat, kontenjan', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'adi' => 'Adi',
			'Tip' => 'Tip',
			'organizator' => 'Organizator',
			'Tarih' => 'Tarih',
			'Yer' => 'Yer',
			'fiyat' => 'Fiyat',
			'kontenjan' => 'Kontenjan',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('adi',$this->adi,true);
		$criteria->compare('Tip',$this->Tip);
		$criteria->compare('organizator',$this->organizator);
		$criteria->compare('Tarih',$this->Tarih,true);
		$criteria->compare('Yer',$this->Yer);
		$criteria->compare('fiyat',$this->fiyat);
		$criteria->compare('kontenjan',$this->kontenjan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
