<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $short_description
 * @property string $image
 * @property integer $status
 * @property integer $update_by
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property PageCategories[] $pageCategories
 * @property PageImages[] $pageImages
 * @property PageTags[] $pageTags
 */
class Page extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'page';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, slug, description, update_by', 'required'),
            array('status, update_by', 'numerical', 'integerOnly' => true),
            array('title, slug', 'length', 'max' => 300),
            array('slug','unique','allowEmpty' => false,'className'=>'Page','message'=>'Sorry, slug can not be duplicate'),
            array('short_description', 'length', 'max' => 100),
            //array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,png','mimeTypes'=>'image/gif, image/jpeg, image/png'),
            array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,png'),
            array('image,keyword', 'length', 'max' => 255),
            array('featured,image,update_time,short_description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, slug, description, short_description, image, status, update_by, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pageCategories' => array(self::HAS_MANY, 'PageCategories', 'page_id'),
            'pageImages' => array(self::HAS_MANY, 'PageImages', 'page_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'short_description' => 'Short Description',
            'image' => 'Feature Image',
            'status' => 'Status',
            'update_by' => 'Update By',
            'update_time' => 'Update Time',
            'featured' => 'Featured',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('short_description', $this->short_description, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('featured', $this->featured);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('update_time', $this->update_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function dropDown($id = 0, $con = '') {
        $cond = 'status="1" ';
        if ((int) $id > 0)
            $cond = 'id!=' . $id;
        $data = array();
        $parent = self::model()->findAll($cond);
        foreach ($parent as $p) {
            $data[$p->id] = $p->title;
        }
        return $data;
    }

    public static function makeLink($id) {
        $info = self::model()->findByPk($id);
        if (count($info) > 0) {
            return Yii::app()->createUrl('//page/' . $id, array('title' => $info->title));
        } else {
            return '#';
        }
    }
    
      public static function makemobileLink($id) {
        $info = self::model()->findByPk($id);
        if (count($info) > 0) {
            return Yii::app()->createUrl('//mobile/page/' . $id, array('title' => $info->title));
        } else {
            return '#';
        }
    }

    public static function makeSlug($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

}
