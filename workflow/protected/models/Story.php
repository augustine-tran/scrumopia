<?php

/**
 * This is the model class for table "story".
 *
 * The followings are the available columns in table 'story':
 * @property integer $story_id
 * @property string $story_code
 * @property string $story_description
 * @property integer $story_project
 * @property integer $story_priority
 * @property integer $story_point
 * @property string $story_status
 * @property integer $story_sprint
 */
class Story extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Story the static model class
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
		return 'story';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('story_code, story_project, story_priority, story_point, story_status, story_sprint', 'required'),
			array('story_project, story_priority, story_point, story_sprint', 'numerical', 'integerOnly'=>true),
			array('story_code, story_status', 'length', 'max'=>45),
			array('story_description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('story_id, story_code, story_description, story_project, story_priority, story_point, story_status, story_sprint', 'safe', 'on'=>'search'),
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
			'project'=>array(self::BELONGS_TO, 'Project', 'story_project'),
			'sprint'=>array(self::BELONGS_TO, 'Sprint','story_sprint'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'story_id' => 'Story',
			'story_code' => 'Story Code',
			'story_description' => 'Story Description',
			'story_project' => 'Project',
			'story_sprint' => 'Sprint',
			'story_priority' => 'Priority',
			'story_point' => 'Point',
			'story_status' => 'Status',
			
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

		$criteria->compare('story_id',$this->story_id);
		$criteria->compare('story_code',$this->story_code,true);
		$criteria->compare('story_description',$this->story_description,true);
		$criteria->compare('story_project',$this->story_project);
		$criteria->compare('story_priority',$this->story_priority);
		$criteria->compare('story_point',$this->story_point);
		$criteria->compare('story_status',$this->story_status,true);
		$criteria->compare('story_sprint',$this->story_sprint);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function setStorypriority(){
		return array('0'=>'Must Have','1'=>'Should Have','2'=>'Could Have','3'=>'Would Have');
	}
	
	public function setStorystatus(){
		return array('0'=>'Pending','1'=>'Inprogress','2'=>'Done');
	}
	
	public function getStorypriority(){
		switch ($this->story_priority) {
			case 0:
				return 'Must Have';
			case 1:
				return 'Should Have';
			case 2:
				return 'Could Have';
			case 3:
				return 'Would Have';
			default:
				return '';
		}
	}
	
	public function getStorystatus(){
		switch ($this->story_status) {
			case 0:
				return 'Pending';
			case 1:
				return 'Inprogress';
			case 2:
				return 'Done';
			default:
				return '';
		}
	}
	
	
}