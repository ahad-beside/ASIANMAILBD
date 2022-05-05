<?php

/**
 * This is the model class for table "slideshow_items".
 *
 * The followings are the available columns in table 'slideshow_items':
 * @property integer $id
 * @property integer $slideshow_id
 * @property string $title
 * @property string $tag_line
 * @property string $image
 * @property string $link
 *
 * The followings are the available model relations:
 * @property Slideshow $slideshow
 */
class SlideshowItems extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'slideshow_items';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('slideshow_id, title, image', 'required'),
            array('slideshow_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 400),
            array('tag_line', 'length', 'max' => 100),
            array('image, link', 'length', 'max' => 255),
            array('tag_line,link', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, slideshow_id, title, tag_line, image, link', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'slideshow' => array(self::BELONGS_TO, 'Slideshow', 'slideshow_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'slideshow_id' => 'Slideshow',
            'title' => 'Title',
            'tag_line' => 'Tag Line',
            'image' => 'Image',
            'link' => 'Link',
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
        $criteria->compare('slideshow_id', $this->slideshow_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('tag_line', $this->tag_line, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('link', $this->link, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SlideshowItems the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
