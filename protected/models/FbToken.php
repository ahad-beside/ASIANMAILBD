<?php

/**
 * This is the model class for table "fb_token".
 *
 * The followings are the available columns in table 'fb_token':
 * @property integer $id
 * @property string $token
 * @property string $info
 */
class FbToken extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'fb_token';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('token, info', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, token, info', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'token' => 'Token',
            'info' => 'Info',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('token', $this->token, true);
        $criteria->compare('info', $this->info, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return FbToken the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function postToFb($postInfo=array()) {
        Yii::import('application.vendors.fb.src.Facebook.*');
        require_once 'autoload.php';
        $data['fb'] = new Facebook\Facebook([
            'app_id' => Yii::app()->params->fbAppId,
            'app_secret' => Yii::app()->params->fbAppSecret,
            'default_graph_version' => 'v2.4',
        ]);
        //$pageList = $data['fb']->get('/me/accounts', Yii::app()->session['fbaccessToken']);
        $fbtoken = FbToken::model()->find(array('condition' => '', 'order' => 'id desc'));

        $pageList = $data['fb']->get('/me/accounts', $fbtoken->token);
        //print_r($pageList);exit();

        $pp = $pageList->getDecodedBody();
        foreach ($pp as $da):
            
            foreach ($da as $dd):
            //print_r($dd);
        //echo '<br><br>';
                if (isset($dd['id']) && $dd['id'] == '190270917831906') {
                    $pageToken = $dd['access_token'];
                    //echo '<br><br><br>';
                }
            endforeach;
        endforeach;
        //exit();
        //echo $pageToken;

        
        $linkData = [
            'link' => $postInfo['link'],
            'message' => $postInfo['text'],
        ];
        try {
            // Returns a `Facebook\FacebookResponse` object
            //$response = $fb->post('/790115974390898/feed', $linkData, $_SESSION['fb_access_token']);
            if(count($postInfo)>0)
                $data['fb']->post('/190270917831906/feed', $linkData, $pageToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            //return 'Graph returned an error: ' . $e->getMessage();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            //return 'Facebook SDK returned an error: ' . $e->getMessage();
        }

        //$graphNode = $response->getGraphNode();
    }

}
