<?php

class SiteController extends Controller {

    public $layout = '//layouts/main';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        //$time = date("h:i A d-m-Y", strtotime('2016-01-04 23:50:10'));
        //echo Yii::app()->easycode->ShowBanglaDate($time);
        //exit();
        $this->render('index');
    }

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

    public function actionEnglish() {
        $this->render('english');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = '//layouts/1column';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = '//layouts/login';
        if (Yii::app()->user->returnUrl == Yii::app()->request->baseUrl . '/index.php/admin/' || Yii::app()->user->returnUrl == Yii::app()->request->baseUrl . '/index.php/admin') {
            Yii::app()->theme = 'login';
        }

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                echo $errors;
                Yii::app()->end();
            }
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                    echo CJSON::encode(array(
                        'authenticated' => true,
                        'redirectUrl' => ($_POST['ref_url'] != '') ? $_POST['ref_url'] : Yii::app()->user->returnUrl,
                        "param" => "Any additional param"
                    ));
                    Yii::app()->end();
                }
                if ($_POST['ref_url'] != '')
                    $this->redirect($_POST['ref_url']);
                else
                    $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionRegistration() {

        $model = new User;
        // collect user input data
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->password = Yii::app()->easycode->genPass($_POST['User']['password']);
            $model->repeatpassword = Yii::app()->easycode->genPass($_POST['User']['repeatpassword']);
            $model->verification_code = md5(Yii::app()->params->md5Key . $_POST['User']['email']);
            $model->role = 2;
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
                    echo CJSON::encode(array(
                        'authenticated' => true,
                        'redirectUrl' => Yii::app()->user->returnUrl,
                        "param" => "Any additional param"
                    ));
                    $model->save();


                    $this->sendRegistrationSuccessMail($model->id);


                    Yii::app()->end();
                }
                $this->redirect(Yii::app()->user->returnUrl);
            } else {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
                    echo CJSON::encode(array(
                        'authenticated' => false,
                        'redirectUrl' => Yii::app()->user->returnUrl,
                        "param" => $model->getErrors(),
                    ));
                }
                //print_r($model->getErrors());
            }
        }
        // display the login form
        //$this->render('index', array('user' => $model));
    }

    public function sendRegistrationSuccessMail($id) {
        $model = User::model()->findByPk($id);
        $mail = new YiiMailer('new_user_registration', array('code' => $model->verification_code));
        $mail->setLayout('mail');
        $mail->setFrom(Yii::app()->params->adminEmail, 'Wavesales');
        $mail->setSubject('New user registration - Wavesales');
        $mail->setTo($model->email);
        $mail->send();
    }

    public function actionEmailverification() {
        if (isset($_GET['verification_code']) && $_GET['verification_code'] != '') {
            if (User::model()->exists('verification_code=:code', array(':code' => $_GET['verification_code']))) {
                if (User::model()->updateAll(array('email_verified' => 1), 'verification_code=:code', array(':code' => $_GET['verification_code'])))
                    Yii::app()->user->setFlash('success', "You have successfully verified your acount");
                else
                    Yii::app()->user->setFlash('error', "Opps!!! Verification failed.");
                $this->redirect(array('site/index'));
            }
        }
    }

    public function actionSearch() {
        $result = '';
        if ($_REQUEST['q']) {
            $q = htmlspecialchars($_REQUEST['q']);

            $product = Products::model()->findAll('(name LIKE :q or description LIKE :q or metatag_title LIKE :q or metatag_keywords LIKE :q) and (status="1") order by name limit 10', array(':q' => '%' . $q . '%'));
            if (count($product) > 0) {
                $result .= '<h2>Products</h2>';
                $result .='<ul class="search_ul">';
                foreach ($product as $pr):
                    $name = $pr->name;
                    $url = Products::model()->makeLink($pr->id);
                    $result .= '<li><a href="' . $url . '">' . $name . '</a></li>';
                endforeach;
                $result .='</ul>';
            }


            $category = Category::model()->findAll('(name LIKE :q or description LIKE :q or metatag_title LIKE :q or metatag_keywords LIKE :q) and (status="1") order by name limit 10', array(':q' => '%' . $q . '%'));
            if (count($category) > 0) {
                $result .= '<h2>Category</h2>';
                $result .='<ul class="search_ul">';
                foreach ($category as $cr):
                    $name = $cr->name;
                    $url = Category::model()->makeLink($cr->id);
                    $result .= '<li><a href="' . $url . '">' . $name . '</a></li>';
                endforeach;
                $result .='</ul>';
            }

            echo $result;
        }
    }

    public function actionNewArrival() {
        $this->renderPartial('newArrival');
    }

    public function actionBestSeller() {
        $this->renderPartial('bestSeller');
    }

    public function actionMensBestSeller() {
        $this->renderPartial('mensBestSeller');
    }

    public function actionWomensBestSeller() {
        $this->renderPartial('womensBestSeller');
    }

    /*
      public function actionLogin() {
      Yii::app()->theme = 'admin';
      $this->layout = '//layouts/login';
      $model = new LoginForm;

      // if it is ajax validation request
      if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
      }

      // collect user input data
      if (isset($_POST['LoginForm'])) {
      $model->attributes = $_POST['LoginForm'];
      // validate user input and redirect to the previous page if valid
      if ($model->validate() && $model->login()) {

      if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
      echo CJSON::encode(array(
      'authenticated' => true,
      'redirectUrl' => Yii::app()->user->returnUrl,
      "param" => "Any additional param"
      ));
      Yii::app()->end();
      }

      $this->redirect(Yii::app()->user->returnUrl);
      }
      }
      // display the login form
      $this->render('login', array('model' => $model));
      } */

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionGallerylist() {
        $model = new Slideshow('searchgallery');
        $model->unsetAttributes();
        $this->render('gallerylist', array('model' => $model));
    }

    public function actionGalleryview() {

        $model = new Slideshow('searchgallery');
        $this->render('galleryview', array('model' => $model));
    }

    public function actionReturnFbLogin() {
        session_start();
        Yii::import('application.vendors.fb.src.Facebook.*');
        require_once 'autoload.php';
        $fb = new Facebook\Facebook([
            'app_id' => Yii::app()->params->fbAppId,
            'app_secret' => Yii::app()->params->fbAppSecret,
            'default_graph_version' => 'v2.4',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            throw new CHttpException(500, "'Graph returned an error: " . $e->getMessage());
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues  
            throw new CHttpException(500, "Facebook SDK returned an error: " . $e->getMessage());
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                throw new CHttpException(500, "Unauthorized Access: " . $e->getErrorReason());
                /* header('HTTP/1.0 401 Unauthorized');
                  echo "Error: " . $helper->getError() . "\n";
                  echo "Error Code: " . $helper->getErrorCode() . "\n";
                  echo "Error Reason: " . $helper->getErrorReason() . "\n";
                  echo "Error Description: " . $helper->getErrorDescription() . "\n"; */
            } else {
                throw new CHttpException(500, "Bad Request");
                //header('HTTP/1.0 400 Bad Request');
                //echo 'Bad request';
            }
            Yii::app()->end();
        }

// Logged in  
        //echo '<h3>Access Token</h3>';
        //var_dump($accessToken->getValue());
// The OAuth 2.0 client handler helps us manage access tokens  
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token  
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        //echo '<h3>Metadata</h3>';
        //var_dump($tokenMetadata);
// Validation (these will throw FacebookSDKException's when they fail)  
        $tokenMetadata->validateAppId(Yii::app()->params->fbAppId);
// If you know the user ID this access token belongs to, you can validate it here  
// $tokenMetadata->validateUserId('123');  
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one  
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                throw new CHttpException(500, "Error getting long-lived access token: " . $helper->getMessage());
                //echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>";
                //exit;
            }
            //echo '<h3>Long-lived</h3>';
            //var_dump($accessToken->getValue());
        }




        Yii::app()->session['fblogin'] = true;
        Yii::app()->session['fbaccessToken'] = (string) $accessToken;
        $model = new FbToken();
        $model->token = $accessToken;
        $model->info = 'info';
        $model->save();
        $this->redirect(array('//admin/facebookToken/index'));

        Yii::app()->session['fb_access_token'] = (string) $accessToken;

        $response = $fb->get('/me?fields=id,first_name,middle_name,last_name,email,gender', Yii::app()->session['fb_access_token']);
        $user = $response->getGraphUser();
        //echo 'Name: ' . $user['name'].$user['email'];
    }

}
