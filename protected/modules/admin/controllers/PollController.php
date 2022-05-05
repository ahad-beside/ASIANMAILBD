<?php

class PollController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main';
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                'roles' => array('Admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Poll;
        $modelOptions = new PollOptions;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Poll'])) {
            $model->attributes = $_POST['Poll'];
            $valid=0;
            if(isset($_POST['PollOptions']) && count($_POST['PollOptions']['option'])>0){
                $valid=1;
            }else{
                Yii::app()->user->setFlash('warning', "Warning: Minimum one option need create poll");
            }
            
            if ($valid==1 && $model->validate()) {
                if($model->save()){
                    for($i=0; $i<=count($_POST['PollOptions']['option']); $i++):
                        $modelOptions = new PollOptions;
                        $modelOptions->option = $_POST['PollOptions']['option'][$i];
                        $modelOptions->poll_id = $model->id;
                        $modelOptions->sort_order = $_POST['PollOptions']['sort_order'][$i];
                        $modelOptions->save();
                    endfor;
                }
                Yii::app()->user->setFlash('success', "Success: Poll created successfully");
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelOptions' => $modelOptions,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelOptions = new PollOptions;
        
        $data['options'] = PollOptions::model()->findAll(array(
                        'condition'=>'poll_id=:pid',
                        'params'=>array(':pid'=>$id),
                    ));
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Poll'])) {
            $model->attributes = $_POST['Poll'];
            $model->update_time = date("Y-m-d H:i:s");
            $valid=0;
            if(isset($_POST['PollOptions']) && count($_POST['PollOptions']['option'])>0){
                $valid=1;
            }else{
                Yii::app()->user->setFlash('warning', "Warning: Minimum one option need create poll");
            }
            
            if ($valid==1 && $model->validate()) {
                if($model->save()){
                    PollOptions::model()->deleteAll(array(
                        'condition'=>'poll_id=:pid',
                        'params'=>array(':pid'=>$model->id),
                    ));
                    for($i=0; $i<=count($_POST['PollOptions']['option']); $i++):
                        $modelOptions = new PollOptions;
                        $modelOptions->option = $_POST['PollOptions']['option'][$i];
                        $modelOptions->poll_id = $model->id;
                        $modelOptions->sort_order = $_POST['PollOptions']['sort_order'][$i];
                        $modelOptions->save();
                    endfor;
                }
                Yii::app()->user->setFlash('success', "Success: Poll created successfully");
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }

        $this->render('update', array(
            'model' => $model,
            'modelOptions' => $modelOptions,
            'data'=>$data,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        /* $dataProvider=new CActiveDataProvider('Industry');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */
        $this->actionAdmin();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Poll('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Poll']))
            $model->attributes = $_GET['Poll'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Industry the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Poll::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Industry $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'industry-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
