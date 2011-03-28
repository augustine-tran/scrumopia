<?php

/**
 * This is the model class for table "task".
 *
 * The followings are the available columns in table 'task':
 * @property integer $task_id
 * @property string $task_code
 * @property integer $task_user
 * @property integer $story_id
 * @property integer $task_hours
 * @property string $task_description
 * @property integer $task_status
 */
class Task extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Task the static model class
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
		return 'task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task_code, story_id, task_hours, task_description, task_status', 'required'),
			array('task_user, story_id, task_hours, task_status', 'numerical', 'integerOnly'=>true),
			array('task_code', 'length', 'max'=>45),
			array('task_code', 'unique'),
			array('task_description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('task_id, task_code, task_user, story_id, task_hours, task_description, task_status', 'safe', 'on'=>'search'),
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
			'task_id' => 'Task',
			'task_code' => 'Task Code',
			'task_user' => 'Task User',
			'story_id' => 'Story',
			'task_hours' => 'Task Hours',
			'task_description' => 'Task Description',
			'task_status' => 'Task Status',
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

		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('task_code',$this->task_code,true);
		$criteria->compare('task_user',$this->task_user);
		$criteria->compare('story_id',$this->story_id);
		$criteria->compare('task_hours',$this->task_hours);
		$criteria->compare('task_description',$this->task_description,true);
		$criteria->compare('task_status',$this->task_status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}