<?php

class MenuController extends Controller {
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'update','del'),
                'roles' => array('Admin','Users'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionDel($id){
        //$id = mysql_real_escape_string($_GET['id']);
        if(Menu::model()->deleteByPk($id)){
            Yii::app()->user->setFlash('success', "Success: Menu deleted successfully");
            $this->redirect(array('index'));
        }else{
            Yii::app()->user->setFlash('warning', "Warning: Failed to delete!");
        }
    }

    public function actionIndex() {
        $model = new Menu;
        
        if($_POST['Menu']){
            $model->attributes = $_POST['Menu'];
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date('Y-m-d h:i:s');
            if ($model->save()){
                Yii::app()->user->setFlash('success', "Success: Menu created successfully");
                $this->redirect(array('index'));
            }else{
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }
        
        $model->sort_order = Yii::app()->easycode->getLastSortingNumber('Menu','sort_order');
        
        $this->render('index', array('model'=>$model));
    }
    
    public function actionUpdate($id) {
        $model = Menu::model()->findByPk($id);
        
        if($_POST['Menu']){
            $model->attributes = $_POST['Menu'];
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date('Y-m-d h:i:s');
            if ($model->save()){
                Yii::app()->user->setFlash('success', "Success: Menu updated successfully");
                $this->redirect(array('index'));
            }else{
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }
        
        $this->render('index', array('model'=>$model));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
