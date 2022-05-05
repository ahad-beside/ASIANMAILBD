<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs = array(
    'Products' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'Manage Products', 'url' => array('admin')),
);
?>

<div class="row open_page">

    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Products</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('products/create'), array('class' => 'btn btn-default btn-circle', 'title' => 'New Products'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('products/admin'), array('class' => 'btn btn-default btn-circle', 'title' => 'All Products'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Product
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $this->renderPartial('_form', array('model' => $model,'data'=>$data,'modelProductsDiscount'=>$modelProductsDiscount)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>