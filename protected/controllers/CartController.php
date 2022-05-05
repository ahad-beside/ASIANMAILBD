<?php

class CartController extends Controller {

    public $layout = '//layouts/fullscreen';

    public function actionIndex() {
        //$this->render('index');
        echo Yii::app()->user->getState('cart');
    }

    public static function getOptionData($options) {
        $data = array();
        if (count($options) > 0) {
            foreach ($options as $k => $v):
                $option_item = OptionItem::model()->findByPk($v);
                $option = Option::model()->findByPk($option_item->option_id);
                $poi = ProductsOptionItem::model()->find('product_option_id=:poi and option_item_id=:oii', array(':poi' => $k, ':oii' => $v));
                $data[$option->name] = array('name' => $option_item->name, 'price_prefix' => $poi->price_prefix, 'price' => $poi->price);
            endforeach;
        }
        return $data;
    }

    public function actionDell($id) {
        //$id = (int) trim($_POST['id']);
        
       
        $session = Yii::app()->session;
        $temp = $session['cart'];
        unset($temp[$id]);
        $session['cart'] = $temp;
        Yii::app()->user->setFlash('success', "1 item deleted from cart");
        $this->redirect(array($_GET['return']));
    }

    public function actionAdd() {
        if (isset($_POST)) {
            $session = Yii::app()->session;

            if (isset($session['item'])) {
                $session['item'] +=1;
            } else {
                $session['item'] = 0;
            }
            $cc = $session['item'];

            $pid = $_POST['product-id'];
            $qty = 1;
            $price = Products::model()->getProductPrice($pid, $_POST['option']);
            $option = $this->getOptionData($_POST['option']);

            $productInfo = Products::model()->findByPk($pid);

            $product = array(
                'id' => $pid,
                'qty' => $qty,
                'name' => $productInfo->name,
                'image' => $productInfo->image,
                'price' => $price,
                'option' => $option,
            );

            //$session['cart'][$cc] = $product;
            $cartArray = Yii::app()->session['cart'];
            $cartArray[$cc] = $product;
            $session['cart'] = $cartArray;
            //echo json_encode($session['cart']);
            echo 1;
        }
    }

    public function actionCountItems() {
        $session = Yii::app()->session;
        echo count($session['cart']);
    }

    public function actionCheckout() {
        $this->render('checkout');
    }

    public function actionOrder() {
        $this->layout = '//layouts/1column';
        $model = new Order;
        $data = array();

        $data['userId'] = (isset(Yii::app()->user->userId)) ? Yii::app()->user->userId : '0';
        $model->delivery_info = ShippingInfo::model()->getShippingInfo($data['userId']);
        
        if ($_POST['Order']) {
            $total = 0;

            //start read session
            $session = Yii::app()->session;
            foreach ($session['cart'] as $k => $v):
                $total += $v['price'];
            endforeach;
            //end read session

            $model->attributes = $_POST['Order'];
            $model->user_id_fk = $data['userId'];
            $model->order_number = $model->genOrderNumber('WS');
            $model->total = $total;
            $model->discount = 0;
            $model->delivery_charge = $model->calDeliveryCharge($total);
            $model->grand_total = ($total - $model->discount) + $model->delivery_charge;
            $model->update_by = $data['userId'];
            $model->update_time = date("Y-m-d H:i:s");

            if ($model->save()) {
                //start order items
                foreach ($session['cart'] as $k => $v):
                    $items = new OrderProducts;
                    $items->order_id_fk = $model->id;
                    $items->products_id_fk = $v['id'];
                    $items->qty = $v['qty'];
                    $items->price = $v['price'];
                    $items->total = ($v['price'] * $v['qty']);
                    $items->options = json_encode($v['option']);
                    $items->save();
                endforeach;
                //end order items
                Yii::app()->user->setFlash('success', "Order successfully placed");
                unset($session['cart']);
                $this->redirect(array('order', 'order' => 'success','orderid'=>$model->id));
            }
        }
        
        if(isset($_GET['orderid'])){
            $data['orderInfo'] = $model->findByPk((int) $_GET['orderid']);
        }
        
        //print_r($model->getErrors());
        
        $this->render('order', array(
            'model' => $model,
            'data' => $data,
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
