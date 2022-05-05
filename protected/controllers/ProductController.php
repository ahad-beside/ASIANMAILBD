<?php

class ProductController extends Controller {

    public $layout = '//layouts/productView';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('rating', 'addToWishList'),
                'users' => array('@'),
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

    public function actionAddToWishList() {
        $productId = $_POST['id'];
        
        $model = new ProductsWishlist;

        //get previous data
        $previous = $model->count('user_id=:uid', array(':uid' => Yii::app()->user->userId));
        if ($previous == 25) {
            $model->deleteAll('user_id=:uid order by entry_time limit 1', array(':uid' => Yii::app()->user->userId));
            $data = array('msg' => 'Product not delete.');
        }

        if (!$model->exists('user_id=:uid and product_id=:pid', array(':uid' => Yii::app()->user->userId, ':pid' => $productId))) {
            $model->product_id = $productId;
            $model->user_id = Yii::app()->user->userId;
            $model->save();
            $data = array('msg' => 'Product added to wishlist.');
        } else {
            $data = array('msg' => 'Product already in your wishlist.');
        }

        echo json_encode($data);
    }

    public function actionRating($id) {
        $this->layout = '//layouts/1column';
        $model = new ProductsRatingReview;
        $productInfo = Products::model()->findByPk($id);

        if (isset($_POST['ProductsRatingReview'])) {
            $model->attributes = $_POST['ProductsRatingReview'];
            $model->product_id = $id;
            $model->user_id = Yii::app()->user->userId;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Thanks for your review.");
                $this->redirect(array('//product/' . $id, 'name' => $productInfo->name));
            }
        }

        $this->render('rating', array(
            'model' => $model,
            'productInfo' => $productInfo,
        ));
    }

    public function actionIndex() {
        
    }

    public function actionView($id) {
        $model = $this->loadModel($id);
        
        //Recent Viewed
        $data['recentViewed'] = Products::model()->getRecentViewProducts();
        Products::model()->addRecentViewProducts($id);
        
        //Recommendation Products
        $data['recommendedProducts'] = Products::model()->getRecommendedProducts();
        Products::model()->addRecommendedProducts($id);
        
        //Customer Also Viewed Products
        $data['alsoViewedProducts'] = Products::model()->getAlsoViewedProducts($id);
        
        
        //get discount info
        $data['discount'] = ProductsDiscount::model()->find('product_id=:id and now() between from_date and to_date', array(':id' => (int) $id));

        //get product options
        $data['options'] = ProductsOption::model()->findAll('product_id=:id', array(':id' => (int) $id));

        //get products rating
        $data['rating'] = Products::model()->getProductRating($id);
        $data['rating_percent'] = number_format(($data['rating']->rating_score / 5) * 100);

        //get product attributes
        $attributes = ProductsAttribute::model()->findAll('product_id=:id', array(':id' => (int) $id));
        $groupAttr = array();
        foreach ($attributes as $attr):
            $attrInfo = Attribute::model()->findByPk($attr->attribute_id);
            $groupAttr[$attrInfo->group_id][] = array('attrName' => $attrInfo->name, 'attrText' => $attr->message);
        endforeach;

        $data['attributes'] = $groupAttr;

        $this->render('view', array(
            'model' => $model,
            'data' => $data,
        ));
    }

    public function loadModel($id) {
        $model = Products::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
