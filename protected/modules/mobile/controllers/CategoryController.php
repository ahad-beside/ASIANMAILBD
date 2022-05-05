<?php

class CategoryController extends Controller {

    //public $layout = '//layouts/main';
     //Yii::app()->theme = 'mobile';

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
                'actions' => array('index', 'view', 'all'),
                'users' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        Yii::app()->theme = 'mobile';
    }
    
    public function actionAll() {
        Yii::app()->theme = 'mobile';
        $cond='';
        if($_GET['publish_date']){
            $data['publish_date'] = mysql_escape_string(trim($_GET['publish_date']));
        }else{
            $data['publish_date'] = date("Y-m-d");
        }
        
        $cond .= ' and update_time LIKE "'.date("Y-m-d",strtotime($data['publish_date'])).'%"';
        
        $sql = "select t1.id, t1.title, t1.slug, t1.image, t1.description, t1.status from post t1 join post_categories t2 on t2.post_id=t1.id where t1.status='1'".$cond." group by t1.id";
        $rawData = Yii::app()->db->createCommand($sql);
        $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();

        $model = new CSqlDataProvider($rawData, array(
            'keyField' => 'id',
            'totalItemCount' => $count,
            'sort' => array(
                'attributes' => array(
                    'id', 'title', 'short_description'
                ),
                'defaultOrder' => array(
                    'id' => CSort::SORT_DESC, //default sort value
                ),
            ),
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
        
        

        $this->render('all', array(
            'id' => $id,
            'data' => $data,
            'model' => $model,
        ));
    }

    public function actionView($id) {
        Yii::app()->theme = 'mobile';
        
        $data['categoryName'] = Category::model()->findByPk(CHtml::encode($id));
        $id = CHtml::encode($id);

        $sql = "select t1.id, t1.title, t1.slug, t1.image, t1.description, t1.status from post t1 join post_categories t2 on t2.post_id=t1.id where t1.status='1' and t2.category_id='{$id}'";
        $rawData = Yii::app()->db->createCommand($sql);
        $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();

        $model = new CSqlDataProvider($rawData, array(
            'keyField' => 'id',
            'totalItemCount' => $count,
            'sort' => array(
                'attributes' => array(
                    'id', 'title', 'description'
                ),
                'defaultOrder' => array(
                    'id' => CSort::SORT_DESC, //default sort value
                ),
            ),
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
        
        $pages=new CPagination($count);
        $pages->pageSize=30;

        //$this->pageTitle = $data['categoryInfo']->name;
        $this->render('index', array(
            'id' => $id,
            'data' => $data,
            'model' => $model,
            'pages'=>$pages,
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
