<?php

/**
 * This is the model class for table "poll_options".
 *
 * The followings are the available columns in table 'poll_options':
 * @property integer $id
 * @property integer $poll_id
 * @property string $option
 * @property integer $vote
 *
 * The followings are the available model relations:
 * @property Poll $poll
 */
class PollOptions extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'poll_options';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('poll_id, option', 'required'),
            array('poll_id, sort_order, vote', 'numerical', 'integerOnly' => true),
            array('option', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, poll_id, option, vote', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'poll' => array(self::BELONGS_TO, 'Poll', 'poll_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'poll_id' => 'Poll',
            'option' => 'Option',
            'vote' => 'Vote',
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
        $criteria->compare('poll_id', $this->poll_id);
        $criteria->compare('option', $this->option, true);
        $criteria->compare('vote', $this->vote);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PollOptions the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
