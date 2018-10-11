<?php

/**
 * This is the model class for table "bilet".
 *
 * The followings are the available columns in table 'bilet':
 * @property integer $ID
 * @property integer $user
 * @property integer $etkinlik
 * @property string $rezervdurumu
 */
class Bi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bi the static model class
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
		return 'bilet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user, etkinlik, rezervdurumu', 'required'),
			array('user, etkinlik', 'numerical', 'integerOnly'=>true),
			array('rezervdurumu', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, user, etkinlik, rezervdurumu', 'safe', 'on'=>'search'),
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
			'user' => 'User',
			'etkinlik' => 'Etkinlik',
			'rezervdurumu' => 'Rezervdurumu',
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
		$criteria->compare('user',$this->user);
		$criteria->compare('etkinlik',$this->etkinlik);
		$criteria->compare('rezervdurumu',$this->rezervdurumu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}