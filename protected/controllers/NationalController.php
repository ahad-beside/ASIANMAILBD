<?php

class NationalController extends Controller
{
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
                'actions' => array('index', 'view', 'all'),
                'users' => array('*'),
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

    public function actionIndex() {
        $id=1;
        $this->actionView($id);
    }
    
     public function actionView($id) {
        // echo $id."mahmood"; exit();
       $id = CHtml::encode($id);
       $data['categoryName'] = Category::model()->findByPk($id);

        $this->breadcrumbs = array(
            'জাতীয়' => array('//national'),
        );
        $this->render('index', array(
            'id' => $id,
            'data' => $data,
            //'model' => $model,
        ));
    }
}
