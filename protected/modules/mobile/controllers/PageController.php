<?php

class PageController extends Controller {

  //  public $layout = '//layouts/1column';
   // public $defaultAction = 'view';
    
    public function actionView($id){
        Yii::app()->theme = 'mobile';
        $model = Page::model()->findByPk($id);
        $this->render('view',array('model'=>$model));
    }

}
