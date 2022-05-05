<?php

/**
 * This is the model class for table "page_tags".
 *
 * The followings are the available columns in table 'page_tags':
 * @property integer $page_id
 * @property integer $tag_id
 *
 * The followings are the available model relations:
 * @property Page $page
 * @property Tag $tag
 */
class PageTags extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'page_tags';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('page_id, tag_id', 'required'),
            array('page_id, tag_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('page_id, tag_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
            'tag' => array(self::BELONGS_TO, 'Tag', 'tag_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'page_id' => 'Page',
            'tag_id' => 'Tag',
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

        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('tag_id', $this->tag_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public static function getSelectedTags($id) {
        $data = self::model()->findAll('page_id=:id', array(':id' => $id));
        if (count($data) > 0) {
            $sel = array();
            foreach ($data as $row):
                $sel[] = $row->tag_id;
            endforeach;
        }
        return $sel;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PageTags the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
