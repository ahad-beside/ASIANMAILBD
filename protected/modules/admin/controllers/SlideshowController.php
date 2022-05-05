<?php

class SlideshowController extends Controller {

    public $layout = '//layouts/main';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('createImageSlide', 'updateImageSlide', 'adminImageSlide', 'delSlideshowItem', 'index', 'view', 'admin', 'delImage', 'createCategorySlide', 'updateCategorySlide', 'adminCategorySlide','enableDisable','delete'),
                'roles' => array('Admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(''),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionDelete($id){
        if(Slideshow::model()->exists('id=:id',array(':id'=>$id))){
            $items = SlideshowItems::model()->findAll('slideshow_id=:pid',array(':pid'=>$id));
            foreach($items as $v):
                if($v->image!='')
                    Yii::app()->easycode->deleteFile($v->image);
            endforeach;
            Slideshow::model()->deleteByPk($id);
        }
    }
    
    public function actionEnableDisable(){
        if (Yii::app()->request->isAjaxRequest):
            $data = array('msg' => 'error');
            if ($_POST['value']) {
                $totalItems = array();
                for ($i = 0; $i < sizeof($_POST['value']); $i++):
                    if(Slideshow::model()->exists('id=:id',array(':id'=>$_POST['value'][$i]))){
                        $in = Slideshow::model()->find('id=:id',array(':id'=>$_POST['value'][$i]));
                        $status = ($in->status=='1')?'0':'1';
                        Slideshow::model()->updateByPk($_POST['value'][$i],array('status'=>$status));
                    }
                endfor;
            }
        endif;
    }

    public function actionIndex() {
        //$this->render('index');
        $this->actionAdminImageSlide();
    }
    
    public function actionDelSlideshowItem() {
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $id = $_POST['id'];
            $model = new SlideshowItems;
            $info = $model->findByPk($id);
            if (count($info) > 0) {
                $model->deleteByPk($id);
                Yii::app()->easycode->deleteFile($info->image);
                echo 1;
            }
        }
    }
    
    public function actionAdminImageSlide(){
        $model = new Slideshow('searchimage');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Slideshow']))
            $model->attributes = $_GET['Slideshow'];

        $this->render('adminImageSlide', array(
            'model' => $model,
        ));
    }
    
    public function actionAdminCategorySlide(){
        $model = new Slideshow('searchcategory');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Slideshow']))
            $model->attributes = $_GET['Slideshow'];

        $this->render('adminCategorySlide', array(
            'model' => $model,
        ));
    }

    public function actionCreateImageSlide() {
        $model = new Slideshow;
        $modelItems = new SlideshowItems;

        if (isset($_POST['Slideshow'])) {
            $model->attributes = $_POST['Slideshow'];
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date("Y-m-d H:i:s");
            if ($model->save()) {
                $this->saveItems($model->id, $_POST['SlideshowItems']);
                Yii::app()->user->setFlash('success', "Slideshow created successfully");
                $this->redirect(array('adminImageSlide'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }

        $this->render('createImageSlide', array(
            'model' => $model,
            'modelItems' => $modelItems,
        ));
    }
    
    public function actionCreateCategorySlide(){
        $model = new Slideshow;
        $modelItems = new SlideshowItems;

        if (isset($_POST['Slideshow'])) {
            $model->attributes = $_POST['Slideshow'];
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date("Y-m-d H:i:s");
            if ($model->save()) {
                $this->saveItems($model->id, $_POST['SlideshowItems']);
                Yii::app()->user->setFlash('success', "Slideshow created successfully");
                $this->redirect(array('adminCategorySlide'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }

        $this->render('createCategorySlide', array(
            'model' => $model,
            'modelItems' => $modelItems,
        ));
    }
    
    public function actionUpdateImageSlide($id) {
        $model = Slideshow::model()->findByPk($id);
        $modelItems = new SlideshowItems;

        if (isset($_POST['Slideshow'])) {
            $model->attributes = $_POST['Slideshow'];
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date("Y-m-d H:i:s");
            if ($model->save()) {
                $this->saveItems($model->id, $_POST['SlideshowItems']);
                Yii::app()->user->setFlash('success', "Slideshow updated successfully");
                $this->redirect(array('adminImageSlide'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }

        $this->render('updateImageSlide', array(
            'model' => $model,
            'modelItems' => $modelItems,
        ));
    }
    
    public function actionUpdateCategorySlide($id) {
        $model = Slideshow::model()->findByPk($id);
        $modelItems = new SlideshowItems;

        if (isset($_POST['Slideshow'])) {
            $model->attributes = $_POST['Slideshow'];
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date("Y-m-d H:i:s");
            if ($model->save()) {
                $this->saveItems($model->id, $_POST['SlideshowItems']);
                Yii::app()->user->setFlash('success', "Slideshow updated successfully");
                $this->redirect(array('adminCategorySlide'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }

        $this->render('updateCategorySlide', array(
            'model' => $model,
            'modelItems' => $modelItems,
        ));
    }

    public static function saveItems($id, $values) {
        if (count($values) > 0) {
            for ($i = 0; $i < count($values['title']); $i++):
                if ($values['title'][$i] != '') {
                    if (isset($values['id'][$i]) && $values['id'][$i] != '') {
                        $model = SlideshowItems::model()->findByPk($values['id'][$i]);
                        $preImage = $model->image;
                    } else {
                        $model = new SlideshowItems;
                        $preImage = '';
                    }

                    $uploadedFile = CUploadedFile::getInstance($model, "image[{$i}]");
                    if ($uploadedFile) {
                        $fileName = Yii::app()->easycode->genFileName($uploadedFile->extensionName);
                        $model->image = $fileName;
                        $uploadedFile->saveAs(UPLOAD . '/' . $fileName);
                        Yii::app()->easycode->deleteFile($preImage);
                    } else {
                        $model->image = $preImage;
                    }

                    $model->slideshow_id = $id;
                    $model->title = $values['title'][$i];
                    $model->tag_line = $values['tag_line'][$i];
                    $model->link = $values['link'][$i];
                    $model->save();
                }
            endfor;
        }
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
