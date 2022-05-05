<?php

/**
 * This is the model class for table "slideshow".
 *
 * The followings are the available columns in table 'slideshow':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $update_by
 * @property string $update_time
 */
class Slideshow extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'slideshow';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, type, update_by, update_time', 'required'),
            array('update_by,additional_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            array('description', 'length', 'max' => 255),
            array('description,additional_id,status', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, update_by, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
             'items'=>array(self::HAS_MANY,'SlideshowItems','slideshow_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'additional_id' => 'Category',
            'status'=>'Status',
            'update_by' => 'Update By',
            'update_time' => 'Update Time',
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
    public function searchimage() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('type', 'image', true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('update_time', $this->update_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function searchcategory() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('type', 'gallary', true);
        $criteria->compare('description', $this->description, true);
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
     * @return Slideshow the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getLatestSlideShow(){
        $slide = self::model()->find('status=:status and type=:type',array(':status'=>1,':type'=>'gallary'));
        if(count($slide)>0):
            return SlideshowItems::model()->findAll('slideshow_id=:id',array(':id'=>$slide->id));
        endif;
    }
    
    public function searchgallery() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        //$criteria->compare('id', $this->id);
        //$criteria->compare('name', $this->name, true);
        //$criteria->compare('type', 'image', true);
        //$criteria->compare('description', $this->description, true);
        //$criteria->compare('update_by', $this->update_by);
        
        if(isset($_GET['filter_date'])){
            $criteria->addCondition('update_time Like "'.date('Y-m-d',strtotime($_GET['filter_date'])).'%"','AND');
        }
        
        //$criteria->compare('update_time', $this->update_time, true);
        $criteria->addCondition('status="1"','AND');
        $criteria->addCondition('type="gallary"','AND');
        $criteria->order='id desc';
        //$criteria->limit='1';
        
        //$criteria->condition = 'type = "image" or type = "event"';
        //$criteria->andCondition('type = "image" or type = "event"');
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination'=>array(
                'pageSize'=>Yii::app()->params->pageSize,
            ),
        ));
    }

}
