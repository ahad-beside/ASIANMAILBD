<?php

class UserController extends Controller {

    public $layout = '//layouts/user';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'changePassword', 'personalInfo','shippingInfo','myorders','myWishList'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','forgotPasswordLink','forgotPassword',),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionMyWishList(){
        $model = new ProductsWishlist;
        $model=$model->findAll('user_id=:uid',array(':uid'=>Yii::app()->user->userId));
        
        $this->render('myWishList', array(
            'model' => $model,
        ));
    }
    
    public function actionMyorders(){
        $model = new Order('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];

        $this->render('myOrder', array(
            'model' => $model,
        ));
    }
    
    public function actionShippingInfo(){
        $model = ShippingInfo::model()->find('user_id_fk=:id',array(':id'=>Yii::app()->user->userId));
        if(count($model)<1){
            $model = new ShippingInfo;
        }
        
        if (isset($_POST['ShippingInfo'])) {
            $model->attributes = $_POST['ShippingInfo'];
            $model->user_id_fk = Yii::app()->user->userId;
            $model->update_by = Yii::app()->user->userId;
            if($model->save()){
                Yii::app()->user->setFlash('success', "Success: Information saved successfully");
                $this->redirect(array('shippingInfo'));
            }else{
                Yii::app()->user->setFlash('warning', "Warning: Information not saved");
            }
        }

        $this->render('shippingInfo',array(
            'model'=>$model,
        ));
    }
    
    public function actionPersonalInfo(){
        $model = User::model()->findByPk(Yii::app()->user->userId);
        
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if($model->save()){
                Yii::app()->user->setState('userFirstname', $model->first_name);
                Yii::app()->user->setState('userLastname', $model->last_name);
                Yii::app()->user->setState('userPhone', $model->phone);
                Yii::app()->user->setFlash('success', "Success: Information saved successfully");
                $this->redirect(array('personalInfo'));
            }else{
                Yii::app()->user->setFlash('warning', "Warning: Information not saved");
            }
        }
        
        
        $this->render('personalInfo',array(
            'model'=>$model,
        ));
    }

    public function actionIndex() {
        $this->render('index');
    }
    
    public function sendForgotPasswordMail($email) {
        $model = User::model()->find('email=:email',array(':email'=>$email));
        if ($model->email != '') {
            if($model->first_name=='' && $model->last_name==''){
                $name = 'User';
            }else{
                $name = $model->first_name.' '.$model->last_name;
            }
            
            $mail = new YiiMailer('forgotPassword', array('name' => $name, 'email'=>md5($model->email)));
            $mail->setLayout('mail');
            $mail->setFrom(Yii::app()->params->adminEmail, 'Wavesales');
            $mail->setSubject('Forgot Password - Wavesales');
            $mail->setTo($model->email);
            $mail->send();
        }
    }
    
    public function actionForgotPasswordLink(){
        if(isset($_POST['email'])){
            $data = array();
            $email = trim($_POST['email']);
            if(User::model()->exists('email=:email',array(':email'=>$email))){
                User::model()->updateAll(array('forgot_pass_code'=>md5($email)),'email=:email',array(':email'=>$email));
                $this->sendForgotPasswordMail($email);
                $data['msg']='Please check your mail to get forgot password link.';
                $data['status']=1;
            }else{
                $data['msg']='Your have given wrong email address';
                $data['status']=0;
            }
            echo json_encode($data);
        }
    }


    public function actionForgotPassword(){
        if ($_POST['Password']) {
            $post = $_POST['Password'];

            if ($post['new'] == '' or $post['re'] == '') {
                Yii::app()->user->setFlash('error', "All filed must be filled!");
                $this->redirect(array('forgotPassword'));
            }

            if ($post['new'] != $post['re']) {
                Yii::app()->user->setFlash('error', "New password and re-password not matched!");
                $this->redirect(array('forgotPassword'));
            }

            if (User::model()->exists('forgot_pass_code=:link', array(':link' => $post['forgot_pass_code']))) {
                $data = User::model()->find('forgot_pass_code=:link', array(':link' => $post['forgot_pass_code']));
                User::model()->updateByPk($data->id,array('password' => md5($post['new']),'forgot_pass_code'=>''));
                Yii::app()->user->setFlash('success', "Password changed successfully");
                $this->sendChangePasswordMail($data->id);//chng password mail
                $this->redirect(array('forgotPassword'));
            } else {
                Yii::app()->user->setFlash('error', "Invalid Request!");
                $this->redirect(array('forgotPassword'));
            }
        }

        $this->render('forgotPassword');
    }

    public function sendChangePasswordMail($id) {
        $model = User::model()->findByPk($id);
        if ($model->email != '') {
            
            if($model->first_name=='' && $model->last_name==''){
                $name = 'User';
            }else{
                $name = $model->first_name.' '.$model->last_name;
            }
            
            $mail = new YiiMailer('changePassword', array('name' => $name, 'email'=>$model->email));
            $mail->setLayout('mail');
            $mail->setFrom(Yii::app()->params->adminEmail, 'Wavesales');
            $mail->setSubject('Change Password - Wavesales');
            $mail->setTo($model->email);
            $mail->send();
        }
    }

    public function actionChangePassword() {
        if ($_POST['Password']) {
            $post = $_POST['Password'];

            if ($post['current'] == '' or $post['new'] == '' or $post['re'] == '') {
                Yii::app()->user->setFlash('error', "All filed must be filled!");
                $this->redirect(array('changePassword'));
            }

            if ($post['new'] != $post['re']) {
                Yii::app()->user->setFlash('error', "New password and re-password not matched!");
                $this->redirect(array('changePassword'));
            }

            if (User::model()->exists('id=:id and password=:pass', array(':id' => Yii::app()->user->userId, ':pass' => md5($post['current'])))) {
                User::model()->updateByPk(Yii::app()->user->userId, array('password' => md5($post['new'])));
                Yii::app()->user->setFlash('success', "Password changed successfully");
                $this->sendChangePasswordMail(Yii::app()->user->userId);//chng password mail
                $this->redirect(array('changePassword'));
            } else {
                Yii::app()->user->setFlash('error', "Invalid current password!");
                $this->redirect(array('changePassword'));
            }
        }

        $this->render('changePassword');
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
