<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $id
 * @property string $website_name
 * @property string $email
 * @property string $notification_email
 * @property integer $email_alert
 * @property integer $sms_alert
 * @property integer $free_days
 * @property string $update_time
 * @property integer $update_by
 */
class Settings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('footer_text, footer_mtext, notification_email, update_time, update_by', 'required'),
			array('email_alert, sms_alert, update_by', 'numerical', 'integerOnly'=>true),
			array('notification_email', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, notification_email, email_alert, sms_alert, update_time, update_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'notification_email' => 'Notification Email',
			'email_alert' => 'Email Alert',
			'sms_alert' => 'Sms Alert',
			'update_time' => 'Update Time',
			'update_by' => 'Update By',
                    'footer_text'=>'Footer 4 Desktop',
                    'footer_mtext'=>'Footer 4 Mobile',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);$criteria->compare('notification_email',$this->notification_email,true);
		$criteria->compare('email_alert',$this->email_alert);
		$criteria->compare('sms_alert',$this->sms_alert);$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_by',$this->update_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
