<?php

class FacebookTokenController extends Controller {

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
                'actions' => array('index', 'chkTokenStatus'),
                'roles' => array('Admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        Yii::import('application.vendors.fb.src.Facebook.*');
        require_once 'autoload.php';
        $data['fb'] = new Facebook\Facebook([
            'app_id' => Yii::app()->params->fbAppId,
            'app_secret' => Yii::app()->params->fbAppSecret,
            'default_graph_version' => 'v2.4',
        ]);
        $data['fb_helper'] = $data['fb']->getRedirectLoginHelper();

        $permissions = ['email', 'publish_actions', 'manage_pages', 'publish_pages']; // Optional permissions
        $data['fbloginurl'] = $data['fb_helper']->getLoginUrl('http://www.coder71.com/asianmailbd/site/returnFbLogin', $permissions);

        $chkExistToken = FbToken::model()->find(array('condition' => '', 'order' => 'id desc'));
        if (count($chkExistToken) > 0) {
            $data['accessToken'] = new Facebook\Authentication\AccessToken($chkExistToken->token);
        }

        $this->render('index', array('data' => $data));
    }


    public function actionChkTokenStatus() {
        FbToken::model()->postToFb(array('ling'=>'http://www.eibela.com/asianmailbd', 'text'=>'Eibela.com'));
    }

}
