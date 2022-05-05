<?php

class VideosController extends Controller {
    
    public $layout = '//layouts/main';
    public $defaultAction = 'index';

    public function actionIndex() {
        $id=207;
        $data['categoryName'] = Category::model()->findByPk($id);

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

        $this->render('index', array(
            'id' => $id,
            'data' => $data,
            'model' => $model,
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
