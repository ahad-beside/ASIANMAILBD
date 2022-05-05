<?php

session_start();
header('Content-Type: text/html; charset=UTF-8');
//Yii::app()->setTimeZone("Asia/Dhaka");
date_default_timezone_set("Asia/Dhaka");
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Asianmailbd.Com | Latest Bangla News Update From asianmailbd.Com',
    'theme' => 'news',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.YiiMailer.YiiMailer',
    ),
    'modules' => array(
        'shop' => array('debug' => 'true'),
        'admin' => array('defaultController' => 'dashboard'),
        'mobile' => array('defaultController' => 'default'),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'request' => array(
            'enableCookieValidation' => true,
        ),
        'mobileDetect' => array(
            'class' => 'ext.MobileDetect.MobileDetect'
        ),
        //'Cookies' => array('class' => 'application.components.CookiesHelper'),
        //YiimageThumb
        'thumb' => array(
            'class' => 'YiimageThumb'
        ),
        //EasyCode Components
        'easycode' => array('class' => 'EasyCode'),
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js' => false,
                'jquery.min.js' => false,
            ),
        /* 'packages' => array(
          'jquery' => array(
          'baseUrl' => 'js/',
          'js' => array('jquery-1.11.0.js'),
          'coreScriptPosition' => CClientScript::POS_HEAD
          ),
          ), */
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'EWebUser',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                // 'entertainment'=>'entertainment/view/15',
                '<module:\w+>/<controller:\w+>/<id:\d+>' => array('<module>/<controller>/view', 'urlSuffix' => '.jsp', 'caseSensitive' => false),
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => array('<module>/<controller>/<action>', 'urlSuffix' => '.jsp', 'caseSensitive' => false),
                '<module:\w+>/<controller:\w+>/<action:\w+>' => array('<module>/<controller>/<action>', 'urlSuffix' => '.jsp', 'caseSensitive' => false),
                'category/<id>/<title>' => 'category/view/id/<id>/<title>',
                'article/<title>' => 'article/view/title/<title>',
                'videos' => 'videos',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'mobile/category/<id>/<name>' => 'mobile/category/view/id/<id>/<name>',
                'mobile/article/<title>' => 'mobile/article/view/title/<title>',
            ),
        ),
        /* 'db' => array(
          'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
          ), */
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=asianmailbd',
            'class' => 'application.extensions.PHPPDO.CPdoDbConnection',
            'pdoClass' => 'PHPPDO',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        //'enableParamLogging' => true,
        ),
        'dbeng' => array(
            'connectionString' => 'mysql:host=localhost;dbname=asianmailbd',
            'emulatePrepare' => true,
            //'username' => 'asianmai_admin',
            //'password' => 'adminMehedi123',
            'username'=>'root',
            'password' => '',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        //'enableParamLogging' => true,
        ),
        //'dbeng' => array(
        //  'connectionString' => 'mysql:host=localhost;dbname=eibela_english',
        //'emulatePrepare' => true,
        //'username' => 'root',
        //'password' => '',
        //'password' => '@IK@TnnH@f4r',
        //'charset' => 'utf8',
        //'class' => 'CDbConnection',
        //'enableParamLogging' => true,
        //  ),
//        'db' => array(
//            'connectionString' => 'mysql:host=localhost;dbname=eibela24_amarbela',
//            'class'=>'application.extensions.PHPPDO.CPdoDbConnection',
//      	    'pdoClass' => 'PHPPDO',
//            'emulatePrepare' => true,
//            'username' => 'eibela24_bela',
//            //'password' => 'fokirnirPUT2020',
//            'password' => '@IK@TnnH@f4r',
//            'charset' => 'utf8',
//            //'enableParamLogging' => true,
//        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'SERVER_HOST' => 'http://www.asianmailbd.com',
        'SITE_URL' => 'http://www.asianmailbd.com',
        'md5Key' => 2441139,
        'companyLogo' => '/images/logo.png',
        'adminEmail' => 'info@asianmailbd.com',
        'currencySymbol' => 'BDT ',
        'countryName' => 'Bangladesh',
        'bankName' => 'Bangladesh Bank',
        'bankAccountNumber' => '100001',
        'pageSize' => 50,
        'fbAppId' => '',
        'fbAppSecret' => '',
    ),
);
