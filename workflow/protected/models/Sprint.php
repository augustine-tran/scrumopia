<?php

/**
 * This is the model class for table "sprint".
 *
 * The followings are the available columns in table 'sprint':
 * @property integer $sprint_id
 * @property string $sprint_name
 * @property string $sprint_description
 * @property integer $sprint_project
 * @property integer $sprint_status
 */
class Sprint extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Sprint the static model class
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
        return 'sprint';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('sprint_name, sprint_project, sprint_status', 'required'),
        array('sprint_project, sprint_status', 'numerical', 'integerOnly'=>true),
        array('sprint_name', 'length', 'max'=>45),
        array('sprint_description', 'length', 'max'=>1000),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('sprint_name, sprint_description, sprint_project, sprint_status', 'safe', 'on'=>'search'),
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
			'project'=>array(self::BELONGS_TO,'Project', 'sprint_project'),
			'story'=>array(self::HAS_MANY,'Story','story_sprint'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
			'sprint_id' => 'Sprint',
			'sprint_name' => 'Sprint Name',
			'sprint_description' => 'Sprint Description',
			'sprint_project' => 'Sprint Project',
			'sprint_status' => 'Sprint Status',
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

        $criteria->compare('sprint_id',$this->sprint_id);
        $criteria->compare('sprint_name',$this->sprint_name,true);
        $criteria->compare('sprint_description',$this->sprint_description,true);
        $criteria->compare('sprint_project',$this->sprint_project);
        $criteria->compare('sprint_status',$this->sprint_status);

        return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
        ));
    }

    public function getSprints($projectID){
        $sprints=$this->findAll(array('condition'=>'sprint_project=:ID','params'=>array(':ID'=>$projectID),));
        $_sprints=array();
        foreach($sprints as $sprint)
        {
            $_sprints[$sprint->sprint_id]=$sprint->sprint_code;
        }
        return $_sprints;
    }

    public function setSprintstatusoptions(){
        return array('0'=>'Pending','1'=>'Inprogress','2'=>'Done');
    }

    public function getSprintstatuscaption(){
        switch ($this->sprint_status) {
            case 0:
                return 'Pending';
            case 1:
                return 'InProgress';
            case 2:
                return 'Done';
            default:
                return '';
        }
    }

    /**
     * @return return story object
     */
    public function getStories(){
        $storysprints=$this->story;
        return $storysprints;
    }

    public function getStoriesJSon(){
        $storysprints=$this->story;
        $stories=array();
        $itemsCount=0;
        foreach ($storysprints as $story) {
            $arr=null;
            $arr['storyId']            =$story->story_id;
            $arr['storyCode']          =$story->story_code;
            $arr['storyDescription']   =$story->story_description;
            $arr['storyProject']       =$story->story_project;
            $arr['storyPriority']      =$story->story_priority;
            $arr['storyPoint']         =$story->story_point;
            $arr['storyStatus']        =$story->story_status;
            $arr['storySprint']        =$story->story_sprint;
            $itemsCount++;
            $stories['totalCount']=$itemsCount;
            $stories['items'][]=$arr;

        }
        $stories=CJSON::encode($stories);
        return $stories;
    }

    public function sprintHours(){
        //$sprintHours=sum($taskHours)
        $stories=$this->story;
        $sprintHours=0;
        foreach ($stories  as $story) {
            $tasks=$story->task;
            foreach ($tasks as $task) {
                $sprintHours += $task->task_hours;
            }
        }
        return $sprintHours;
    }
    
    public function burnDown(){
        $stories=$this->story;
        $tasksDone=0;
        foreach ($stories  as $story) {
            $tasks=$story->task;
            foreach ($tasks as $task) {
                if ($task->task_status==3) {
                	$tasksDone += $task->task_hours;
                }
            }
        }
        return $this->sprintHours()- $tasksDone;
    }
}