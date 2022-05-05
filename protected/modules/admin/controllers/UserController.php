<?php

class UserController extends Controller {

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
                //'actions' => array('index', 'view', 'admin', 'delete', 'sentVerificationLink', 'block', 'active', 'update', 'create','changePassword'),
                'actions' => array('index', 'create', 'update', 'admin', 'changePassword'),
                'roles' => array('Admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
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
                //$this->sendChangePasswordMail(Yii::app()->user->userId); //chng password mail
                $this->redirect(array('changePassword'));
            } else {
                Yii::app()->user->setFlash('error', "Invalid current password!");
                $this->redirect(array('changePassword'));
            }
        }

        $this->render('changePassword');
    }

    public function actionActive() {
        if (Yii::app()->request->isAjaxRequest) {
            $data = array('msg' => 'error');
            if ($_POST['value']) {
                $orderIds = array();
                for ($i = 0; $i < count($_POST['value']); $i++):
                    if (User::model()->exists('id=:id and active="0"', array(':id' => $_POST['value'][$i]))) {
                        $userInfo = User::model()->updateByPk($_POST['value'][$i], array('active' => '1'));
                        $orderIds[] = $_POST['value'][$i];
                    }
                endfor;
                $data = array('msg' => 'success', 'totalOrders' => count($orderIds));
            } else {
                $data = array('msg' => 'error');
            }
        } else {
            $data = array('msg' => 'error');
        }
        echo json_encode($data);
    }

    public function actionBlock() {
        if (Yii::app()->request->isAjaxRequest) {
            $data = array('msg' => 'error');
            if ($_POST['value']) {
                $orderIds = array();
                for ($i = 0; $i < count($_POST['value']); $i++):
                    if (User::model()->exists('id=:id and active="1"', array(':id' => $_POST['value'][$i]))) {
                        $userInfo = User::model()->updateByPk($_POST['value'][$i], array('active' => '0'));
                        $orderIds[] = $_POST['value'][$i];
                    }
                endfor;
                $data = array('msg' => 'success', 'totalOrders' => count($orderIds));
            } else {
                $data = array('msg' => 'error');
            }
        } else {
            $data = array('msg' => 'error');
        }
        echo json_encode($data);
    }

    public function ReSendVerificationMail($id) {
        $model = User::model()->findByPk($id);
        $mail = new YiiMailer('new_user_registration', array('code' => $model->verification_code));
        $mail->setLayout('mail');
        $mail->setFrom(Yii::app()->params->adminEmail, Yii::app()->params->adminName);
        $mail->setSubject('Re:Email Verification - ' . Yii::app()->params->adminName);
        $mail->setTo($model->email);
        $mail->send();
    }

    public function actionSentVerificationLink() {
        if (Yii::app()->request->isAjaxRequest) {
            $data = array('msg' => 'error');
            if ($_POST['value']) {
                $orderIds = array();
                for ($i = 0; $i < count($_POST['value']); $i++):
                    if (User::model()->exists('id=:id and email_verified="0"', array(':id' => $_POST['value'][$i]))) {
                        $this->ReSendVerificationMail($_POST['value'][$i]);
                        $orderIds[] = $_POST['value'][$i];
                    }
                endfor;
                $data = array('msg' => 'success', 'totalOrders' => count($orderIds));
            } else {
                $data = array('msg' => 'error');
            }
        } else {
            $data = array('msg' => 'error');
        }
        echo json_encode($data);
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
        $model = new User;
        //$data['profileModel'] = new EmProfile;
        //$data['profilePhoto'] = new ProfilePhoto;
        $model->email_verified = 1;

        
        
        //echo $model->password."vgh";
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if(trim($_POST['User']['password'])!=''){
                $model->password = Yii::app()->easycode->genPass($_POST['User']['password']);
            }
            $model->repeatpassword = $model->password;
            
            
//        $upassword = $model->password;
//        if (!empty($upassword)) {
//            $model->password = $upassword;
//        }
//        else
//            $model->password = "";

            //$model->role = 3;
            //$model->password = Yii::app()->easycode->genPass($_POST['User']['password']);
            //$model->repeatpassword = Yii::app()->easycode->genPass($_POST['User']['repeatpassword']);
            //$model->verification_code = md5(Yii::app()->params->md5Key . $_POST['User']['email']);
            //$model->email_verified = 1;
            //$data['profileModel']->attributes = $_POST['EmProfile'];
            //$data['profileModel']->update_by = Yii::app()->user->userId;
            if ($model->save()) {
                //$data['profileModel']->user_id = $model->id;
                //$data['profileModel']->save();
//                if ($_POST['ProfilePhoto']) {
//                    $uploadedFile = CUploadedFile::getInstance($data['profilePhoto'], "image");
//                    if ($uploadedFile) {
//                        $fileName = Yii::app()->easycode->genFileName($uploadedFile->extensionName);
//                        $data['profilePhoto']->image = $fileName;
//                        $data['profilePhoto']->user_id = $model->id;
//                        $data['profilePhoto']->update_by = Yii::app()->user->userId;
//                        if ($data['profilePhoto']->validate()) {
//                            $uploadedFile->saveAs(UPLOAD . '/' . $fileName);
//                        }
//                        $data['profilePhoto']->save();
//                    }
//                }

                Yii::app()->user->setFlash('success', "Success: User created successfully");
                $this->redirect(array('admin'));
            } else {
                //print_r($model->getErrors());exit();
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }



        $this->render('create', array(
            'model' => $model,
            'data' => $data,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $prePass = $model->password;
        //echo $prePass."jgjg"; exit(); 
//        if ($model->role == 2) {
//            $data['viewFile'] = 'js_update_form';
//            if (JsProfile::model()->exists('user_id=:id', array(':id' => $id)))
//                $data['profileModel'] = JsProfile::model()->find('user_id=:id', array(':id' => $id)); //Get JobSeeker Profile
//            else
//                $data['profileModel'] = new JsProfile;
//        }else {
//            $data['viewFile'] = 'em_update_form';
//            if (EmProfile::model()->exists('user_id=:id', array(':id' => $id)))
//                $data['profileModel'] = EmProfile::model()->find('user_id=:id', array(':id' => $id)); //Get Employer Profile
//            else
//                $data['profileModel'] = new EmProfile;
//        }
//
//
//        if (ProfilePhoto::model()->exists('user_id=:id', array(':id' => $id))) {
//            $data['profilePhoto'] = ProfilePhoto::model()->find('user_id=:id', array(':id' => $id)); //Get Profile Photo
//            $preImage = $data['profilePhoto']->image;
//        } else
//            $data['profilePhoto'] = new ProfilePhoto;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //$prePass = Yii::app()->easycode->genPass($_POST['User']['password']);
        //echo $model->email_verified=1; exit;

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $upassword = $model->password;
            //echo $upassword; exit();
            if (!empty($upassword)) {
                $model->password = md5($upassword);
            }
            else
                $model->password = $prePass;

//            if (isset($_POST['EmProfile'])) {
//                $data['profileModel']->attributes = $_POST['EmProfile'];
//            } else if (isset($_POST['JsProfile'])) {
//                $data['profileModel']->attributes = $_POST['JsProfile'];
//                $data['profileModel']->date_of_birth = date("Y-m-d", strtotime($data['profileModel']->date_of_birth));
//            }
//
//            $data['profileModel']->user_id = $id;
//            $data['profileModel']->update_by = Yii::app()->user->userId;
//
//            if ($_POST['ProfilePhoto']) {
//                $uploadedFile = CUploadedFile::getInstance($data['profilePhoto'], "image");
//                if ($uploadedFile) {
//                    $fileName = Yii::app()->easycode->genFileName($uploadedFile->extensionName);
//                    $data['profilePhoto']->image = $fileName;
//                    $data['profilePhoto']->user_id = $id;
//                    $data['profilePhoto']->update_by = Yii::app()->user->userId;
//                    if ($data['profilePhoto']->validate()) {
//                        if (isset($preImage) && $preImage != '')
//                            Yii::app()->easycode->deleteFile($preImage);
//                        $uploadedFile->saveAs(UPLOAD . '/' . $fileName);
//                    }
//                    if (!$data['profilePhoto']->save()) {
//                        //print_r($data['profilePhoto']->getErrors());
//                        //exit();
//                    }
//                }

            if ($model->save()) {
                Yii::app()->user->setFlash('success', "User updated successfully");
                $this->redirect(array('admin'));
            } else {
                //print_r($model->getErrors());
                //print_r($data['profileModel']->getErrors());
                print_r($model->getErrors());
                exit();
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }





        $this->render('update', array(
            'model' => $model,
            'data' => $data,
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
        /* $dataProvider=new CActiveDataProvider('User');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */
//$this->render('index');       
        $this->actionAdmin();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
