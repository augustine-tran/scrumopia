<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $comment_id
 * @property integer $user_id
 * @property string $comment
 * @property string $comment_date
 * @property integer $comment_story
 */
class Comment extends TrackStarActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
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
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('user_id, comment, comment_date, comment_story', 'required'),
		array('user_id, comment_story', 'numerical', 'integerOnly'=>true),
		array('comment', 'length', 'max'=>1000),
		array('comment_date,','safe'),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('comment_id, user_id, comment, comment_date, comment_story', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
      		'story' => array(self::BELONGS_TO, 'Story', 'comment_story'),
			'file'=>array(self::HAS_MANY,'File','story_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment_id' => 'Comment',
			'user_id' => 'User',
			'comment' => 'Comment',
			'comment_date' => 'Comment Date',
			'comment_story' => 'Comment Story',
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

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('comment_date',$this->comment_date,true);
		$criteria->compare('comment_story',$this->comment_story);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}