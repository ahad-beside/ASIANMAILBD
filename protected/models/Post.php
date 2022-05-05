<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $short_description
 * @property string $image
 * @property integer $featured
 * @property integer $status
 * @property integer $update_by
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property PostCategories[] $postCategories
 * @property PostImages[] $postImages
 * @property PostTags[] $postTags
 */
class Post extends CActiveRecord {

    public $categoryId;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'post';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, slug, description, update_by, keyword', 'required'),
            array('featured, status, update_by', 'numerical', 'integerOnly' => true),
            array('image', 'file', 'types' => 'jpg,jpeg', 'allowEmpty' => true, 'mimeTypes'=>'image/jpeg, image/jpg','maxSize'=>1024 * 1024 * 1, 'tooLarge'=>'File has to be smaller than 1MB'),
            array('title', 'length', 'max' => 300),
            array('slug', 'length', 'max' => 600),
            array('slug', 'unique', 'allowEmpty' => false, 'className' => 'Post', 'message' => 'Sorry, slug can not be duplicate'),
            array('short_description', 'length', 'max' => 300),
            array('image,keyword', 'length', 'max' => 255),
            array('featured,image,update_time,entry_time,short_description,times_of_read,headline,sub_title,categoryId', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, slug, description, short_description, image, featured, status, update_by, update_time,entry_by, update_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'postCategories' => array(self::HAS_MANY, 'PostCategories', 'post_id'),
            'postImages' => array(self::HAS_MANY, 'PostImages', 'post_id'),
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
            'image' => 'Image',
            'featured' => 'Featured',
            'status' => 'Status',
            'update_by' => 'Update By',
            'update_time' => 'Update Time',
            'times_of_read' => 'Times Of Read',
            'headline' => 'Headline',
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
        $criteria->compare('featured', $this->featured);
        $criteria->compare('status', $this->status);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('headline', $this->headline);

        //$criteria->compare('update_time', $this->update_time, true);
        if ($this->update_time != '')
            $criteria->compare('update_time', date("Y-m-d", strtotime($this->update_time)), true);
        if ($this->categoryId != '') {
            $criteria->join = 'LEFT JOIN post_categories pc ON t.id = pc.post_id';
            $criteria->addCondition('pc.category_id=' . $this->categoryId, 'AND');
        }
        if ($this->entry_by != '') {
            $criteria->addCondition('t.entry_by=' . $this->entry_by, 'AND');
        }
        if ($this->update_by != '') {
            $criteria->addCondition('t.update_by=' . $this->update_by, 'AND');
        }
        if (Yii::app()->user->roles == 'Sub Editor') {

            $criteria->addCondition('t.entry_by=' . Yii::app()->user->userId, 'AND');
        }



        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Post the static model class
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
            //return Yii::app()->createUrl('//post/details/title/'.$info->slug);
            return Yii::app()->createAbsoluteUrl('//article/' . $info->slug);
        } else {
            return '#';
        }
    }
    
    public static function makemobileLink($id) {
        $info = self::model()->findByPk($id);
        if (count($info) > 0) {
            //return Yii::app()->createUrl('//post/details/title/'.$info->slug);
            return Yii::app()->createUrl('//mobile/article/' . $info->slug);
        } else {
            return '#';
        }
    }

    public static function makeSlug($title, $action = 'insert') {
        $c = self::model()->count('title=:title', array(':title' => $title));
        if ($action == 'insert' && $c > 0)
            $title = $title . '-' . ($c + 1);

        $seo_st = str_replace(' ', '-', $title);
        $seo_alm = str_replace('--', '-', $seo_st);
        $title_seo = str_replace(' ', '', $seo_alm);
        $title_seo_final = str_replace('/', '-', $title_seo);
		if(strpos($title_seo_final,'-')==false)
            $title_seo_final = $title_seo_final.'-asianmailbd-'.rand(111,999);
		
        return urlencode(mb_strtolower($title_seo_final, 'UTF-8'));
    }

    public function getFeaturedNews($limit = 3, $offset = '') {
        $data = Post::model()->findAll('featured=:featured and status=:status order by id desc limit :limit offset :offset', array(':featured' => 1, ':status' => 1, ':limit' => $limit, ':offset' => $offset));
        return $data;
    }

    public function getTopRecentPost($limit = 10) {
        $data = Post::model()->findAll('featured=:featured and status=:status order by id desc limit :limit', array(':featured' => 0, ':status' => 1, ':limit' => $limit));
        return $data;
    }

    public static function getPost($category = '', $limit = 3) {
        $command = Yii::app()->db->createCommand();
        $command->select("p.*");
        $command->from('post_categories pc');
        $command->join('post p', 'pc.post_id=p.id');

        $command->where('p.status=:status', array(':status' => 1));
        if ($category != '')
            $command->andWhere('pc.category_id=:catid', array(':catid' => $category));
        $command->order('p.id desc');
        $command->group('pc.post_id');
        $command->limit($limit);
        if ($category != '')
            $data['categoryName'] = Category::model()->findByPk($category)->name;
        $data['result'] = $command->queryAll();
        return $data;
    }
	
	
	
    public static function featuregetPost($category = '', $limit = 1) {
        $command = Yii::app()->db->createCommand();
        $command->select("p.*");
        $command->from('post_categories pc');
        $command->join('post p', 'pc.post_id=p.id');

        $command->where('p.status=:status', array(':status' => 1));
        if ($category != '')
            $command->andWhere('pc.category_id=:catid', array(':catid' => $category));
        $command->order('p.id desc');
        $command->group('pc.post_id');
        $command->limit($limit);
		$command->offset=1;

        if ($category != '')
            $data['categoryName'] = Category::model()->findByPk($category)->name;
        $data['result'] = $command->queryAll();
        return $data;
    }

    public static function getMostRead($limit,$cat='') {
        if($cat!=''){
            $cond = array(
                'join'=>'left join post_categories postCategories on postCategories.post_id=t.id',
                'condition'=>'t.status=1 and postCategories.category_id=:cat and t.update_time  LIKE :ut',
                'params'=>array(
                    ':ut'=>date("Y").'%',
                    ':cat'=>$cat,
                ),
                'order'=>'t.times_of_read desc',
                'limit'=>$limit,
            );
        }else{
            $cond = array(
                'condition'=>'t.status=1 and t.update_time  LIKE :ut',
                'params'=>array(
                    ':ut'=>date("Y-m").'%',
                ),
                'order'=>'t.times_of_read desc',
                'limit'=>$limit,
            );
        }
        
        $data = self::model()->findAll($cond);
        return $data;
    }

    public static function getRecentPost($limit) {
        return Post::model()->findAll('status=1 order by id desc limit ' . $limit);
    }

    public static function getNewsTicker($limit) {
        return Post::model()->findAll('status=1 and headline=1 order by id desc limit ' . $limit);
    }

    public static function getSimilarCategoryPost($postId, $limit = 10) {
        $categoryId = PostCategories::model()->find('post_id=:id', array(':id' => $postId))->category_id;
        if ($categoryId != '') {
            $sql = "select t1.id, t1.title, t1.slug, t1.image, t1.short_description, t1.status, t1.update_time from post t1 join post_categories t2 on t2.post_id=t1.id where t1.status='1' and t2.category_id='{$categoryId}' and t1.id!='{$postId}' order by t1.id desc limit {$limit}";
            $rawData = Yii::app()->db->createCommand($sql);
            return $rawData->queryAll();
        }
    }

    function getExcerpt($str, $startPos = 0, $maxLength = 100) {
        $str = strip_tags($str);
        if (strlen($str) > $maxLength) {
            $excerpt = substr($str, $startPos, $maxLength - 3);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt = substr($excerpt, 0, $lastSpace);
            $excerpt .= '...';
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }

    public static function getSelectedCategoryName($id) {
        $data = PostCategories::model()->findAll('post_id=:id', array(':id' => $id));
        if (count($data) > 0) {
            $sel = array();
            foreach ($data as $row):
                $sel[] = $row->category->name;
            endforeach;
        }
        return $sel;
    }
    
    public static function countInactivePost(){
        if(Yii::app()->user->roles=='Admin'):
        return '<strong>('.self::model()->count(array(
            'condition'=>'status=:status',
            'params'=>array(':status'=>0)
        )).')</strong>';
        endif;
    }
    
    function getRelatedPost($id, $keywords, $limit = 9) {
        $key = explode(',', trim($keywords));
        $res = array();
        if (trim($keywords)!='' && count($key) > 0):
            $cond = '';
            foreach ($key as $v):
                if(CHtml::encode(trim($v))!='')
                    $cond .= 'keyword LIKE "%' . CHtml::encode(trim($v)) . '%" or ';
            endforeach;

            if ($cond != '') {
                $cond = rtrim($cond, ' or ');
                $res =  Post::model()->findAll('id!="' . $id . '" and keyword!="" and (' . $cond . ') order by id desc limit ' . $limit);
                //return 'id!="' . $id . '" and keyword!="" and (' . $cond . ') order by id desc limit ' . $limit;
            }
        endif;
        return $res;
    }

}
