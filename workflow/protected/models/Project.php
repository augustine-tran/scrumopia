<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $project_id
 * @property integer $project_owner
 * @property string $project_name
 * @property string $project_description
 * @property integer $project_status
 * @property integer $date_start
 * @property integer $end
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('project_name, project_status', 'required'),
		array('project_owner, project_status, ', 'numerical', 'integerOnly'=>true),
		array('project_name', 'length', 'max'=>128),
		array('project_description', 'length', 'max'=>1000),
		array('date_start,end','safe'),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('project_id, project_owner, project_name, project_description, project_status, date_start, end', 'safe', 'on'=>'search'),
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
			'projectuser'=>array(self::HAS_MANY,'ProjectUser','project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Project',
			'project_owner' => 'Project Owner',
			'project_name' => 'Project Name',
			'project_description' => 'Project Description',
			'project_status' => 'Project Status',
			'date_start' => 'Date Start',
			'end' => 'End',
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

		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('project_owner',$this->project_owner);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('project_description',$this->project_description,true);
		$criteria->compare('project_status',$this->project_status);
		$criteria->compare('date_start',$this->date_start);
		$criteria->compare('end',$this->end);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * @return All users
	 */
	public function getProjectOwnerOptions()
	{
		$userObjects = Yii::app()->getModule('user')->user()->findAll();// Public Properties: id, username, email, createtime, lastvisit and profile relation
		//print_r(Yii::app()->getModule('user')->user()->findAll());exit;
		$_user=array();
		foreach($userObjects as $userObject)
		{
			$profileObject = $userObject->profile;
			$_user[$userObject->id]=$profileObject->firstname . " ".$profileObject->lastname;
		}
		return $_user;
	}

	/**
	 * @return The name of projectowner
	 */
	public function getProjectOwnerName()
	{
		$userObject = Yii::app()->getModule('user')->user();// Public Properties: id, username, email, createtime, lastvisit and profile relation
		$userprofile=$userObject->profile;
		$projecowner=$userprofile->findByPk($this->project_owner);
		return $projecowner->firstname ." ".$projecowner->lastname;
	}

	/**
	 * @return Project status caption
	 */
	public function getProjectStatus()
	{
		switch ($this->project_status) {
			case 0:
				return "Started";
			case 1:
				return "Pending";
			case 2:
				return "Released";
		}
	}

	/**
	 * @return Project status options
	 */
	public function setProjectStatus(){
		return array(0=>'Started', 1=>'Pending', 2=>'Released');
	}


	public function getProjects(){
		$projects=Project::model()->findAll();
		$_projects=array();
		foreach($projects as $project)
		{
			$_projects[$project->project_id]=$project->project_name;
		}
		return $_projects;
	}


	public function getUserofproject(){
		$projectusers=$this->projectuser;
		$users=array();		
		foreach ($projectusers as $projectuser) {
			$users[]=$projectuser->user_id;
		}
	}

	/**
	 * Returns an array of available roles in which a user can be
	 placed when being added to a project
	 */
	public static function getUserRoleOptions()
	{
		return CHtml::listData(Yii::app()->authManager->getRoles(),'name', 'name');
	}

	/**
	 * Makes an association between a user and a the project
	 */
	public function associateUserToProject($user)
	{
		$sql = "INSERT INTO project_user (project_id,
					user_id) VALUES (:projectId, :userId)";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->project_id, PDO::PARAM_INT);
		$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
		return $command->execute();
	}
	/*
	 * Determines whether or not a user is already part of a project
	 */
	public function isUserInProject($user)
	{
		$sql = "SELECT user_id FROM project_user WHERE
					project_id=:projectId AND user_id=:userId";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->project_id, PDO::PARAM_INT);
		$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
		return $command->execute()==1 ? true : false;
	}

	public function associateUserToRole($role, $userId)
	{
		$sql = "INSERT INTO projectuserrole (project_id, user_id, role) VALUES (:projectId, :userId, :role)";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->project_id, PDO::PARAM_INT);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		$command->bindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute();
	}




}