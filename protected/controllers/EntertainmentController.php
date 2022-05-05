<?php

class EntertainmentController extends Controller
{
 public $layout = '//layouts/main';	
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
        $id=15;
        $this->actionView($id);
    }
    
    public function actionAll() {
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
        // echo $id."mahmood"; exit();
        $id = CHtml::encode($id);
        $data['categoryName'] = Category::model()->findByPk($id);

        $this->breadcrumbs = array(
            'বিনোদন' => array('//entertainment'),
        );
        $this->render('index', array(
            'id' => $id,
            'data' => $data,
            //'model' => $model,
        ));
    }
}
