<?php
class DefaultController extends Controller {
     //public $layout = '//layouts/main';
    public function actionIndex() {
        Yii::app()->theme = 'mobile';
        
        $this->render('index');
    }

	
	/* public function actionSubscribeForm(){
	  $this->render('subscribeForm');
	}
	 */
	
	  public function actionAddSubscribtion() {
        $model = new SubscriberList;
        $process = array();
        if ($_POST['SubscriberList']) {
            $model->attributes = $_POST['SubscriberList'];
            if ($model->save()) {
                $process['res'] = '1';
            } else {
                $process['res'] = '0';
                $process['error'] = $model->getErrors();
            }
        }
        echo json_encode($process);
    }
	
}