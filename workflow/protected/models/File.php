<?php

/**
 * This is the model class for table "file".
 *
 * The followings are the available columns in table 'file':
 * @property integer $fille_id
 * @property string $file_path
 * @property string $file_type
 * @property string $file_description
 * @property integer $story_id
 */
class File extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return File the static model class
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
		return 'file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_path, file_type', 'required'),
			array('story_id', 'numerical', 'integerOnly'=>true),
			array('file_path', 'length', 'max'=>128),
			array('file_type', 'length', 'max'=>45),
			array('file_description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fille_id, file_path, file_type, file_description, story_id', 'safe', 'on'=>'search'),
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
			'fille_id' => 'Fille',
			'file_path' => 'File Path',
			'file_type' => 'File Type',
			'file_description' => 'File Description',
			'story_id' => 'Story',
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

		$criteria->compare('fille_id',$this->fille_id);
		$criteria->compare('file_path',$this->file_path,true);
		$criteria->compare('file_type',$this->file_type,true);
		$criteria->compare('file_description',$this->file_description,true);
		$criteria->compare('story_id',$this->story_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}