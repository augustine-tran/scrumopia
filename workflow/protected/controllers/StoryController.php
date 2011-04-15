<?php

class StoryController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
			'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','selectsprints','upload'),
				'users'=>array('@'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
        ),
        array('deny',  // deny all users
				'users'=>array('*'),
        ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $story=$this->loadModel($id);
        $comment=$this->createComment($story);
        $file=$this->createFile($story);
        $this->render('view',array(
			'model'=>$story,
			'comment'=>$comment,
		    'file'=>$file,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new Story;
        $model->story_project=$_GET['story_project'];
        $model->story_sprint=$_GET['story_sprint'];
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['Story']))
        {
            $model->attributes=$_POST['Story'];
            if($model->save())
            $this->redirect(array('view','id'=>$model->story_id));
        }

        $this->render('create',array(
			'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Story']))
        {
            $model->attributes=$_POST['Story'];
            if($model->save())
            $this->redirect(array('view','id'=>$model->story_id));
        }

        $this->render('update',array(
			'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
        throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Story');
        $this->render('index',array(
			'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Story('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Story']))
        $model->attributes=$_GET['Story'];

        $this->render('admin',array(
			'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=Story::model()->findByPk((int)$id);
        if($model===null)
        throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='story-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSelectsprints()
    {
        $data = Sprint::model()->findAll('sprint_id=:ID',
        array(':ID'=>(int) $_POST['Story']['story_project']));


        $data = CHtml::listData($data,'sprint_id','sprint_name');
        print_r($data);exit;
        foreach($data as $id => $value)
        {
            echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
        }

    }

    protected function createComment($story)
    {
        $comment=new Comment;
        if(isset($_POST['Comment']))
        {
            $comment->attributes=$_POST['Comment'];
            if($story->addComment($comment))
            {
                Yii::app()->user->setFlash('commentSubmitted',"Your comment has been added." );
                $this->refresh();
            }
        }
        return $comment;
    }

    protected function createFile($story)
    {
        $file=new UploadForm;
        return $file;
    }



    public function actionUpload($storyId) {
        //$parent_id = Yii::app()->request->getQuery("parent_id", 1);
        $model = new UploadForm;
        $model->file = CUploadedFile::getInstance($model, 'file');
        $model->mime_type = $model->file->getType();
        $model->size = $model->file->getSize();
        $model->name = $model->file->getName();
        $model->story_id=$storyId;
        $model->save();
        if ($model->validate()) {
            $path = realpath(Yii::app()->getBasePath()."/../images/uploads")."/{$storyId}/";
            if(!is_dir($path)){
                mkdir($path);
            }
            $model->file->saveAs($path.$model->name);
            echo CJSON::encode($model->attributes);
        } else {
            echo CVarDumper::dumpAsString($model->getErrors());
            Yii::log("FileUpload: ".CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "application.controllers.SiteController");
            throw new CHttpException(500, "Could not upload file");
        }

    }
}
