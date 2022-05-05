<?php

class PageController extends Controller {

    public $layout = '//layouts/main';
    public $defaultAction = 'view';
    
    public function actionView($id){
        $model = Page::model()->findByPk($id);
        $this->render('view',array('model'=>$model));
    }

}
