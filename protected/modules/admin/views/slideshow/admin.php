<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs = array(
    'Products' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'Create Products', 'url' => array('create')),
);
?>

<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Category</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('products/create'), array('class' => 'btn btn-default btn-circle', 'title' => 'New Product'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('products/admin'), array('class' => 'btn btn-default btn-circle', 'title' => 'All Products'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Products</div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'products-grid',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'itemsCssClass' => 'table table-hover table-striped custom-data-table',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'value' => '$data->id',
                            'selectableRows' => '2',
                            'id' => 'actionCheck'
                        ),
                        array(
                            'class' => 'IndexColumn',
                            'header' => 'Sl',
                            'headerHtmlOptions' => array('style' => 'width:20px;'),
                        ),
                        array(
                          'name'=>'image',
                          'filter'=>false,
                          'type'=>'raw',
                          'value'=>'Yii::app()->easycode->showImage($data->image, $data->image, 40, 40)',
                        ),
                        'name',
                        'model',
                        array(
                            'name'=>'price',
                            'htmlOptions'=>array('class'=>'right-align'),
                            'filterHtmlOptions'=>array('class'=>'right-align'),
                            'headerHtmlOptions'=>array('class'=>'right-align'),
                        ),
                        array(
                            'name'=>'quantity',
                            'htmlOptions'=>array('class'=>'right-align'),
                            'filterHtmlOptions'=>array('class'=>'right-align'),
                            'headerHtmlOptions'=>array('class'=>'right-align'),
                        ),
                        array(
                          'name'=>'status',
                          'type'=>'raw',
                          'value'=>'Products::model()->getProductStatus($data->status)',
                            'htmlOptions'=>array('class'=>'center-align'),
                        ),
                        /*
                        'description',
                        'metatag_title',
                        'metatag_description',
                        'metatag_keywords',
                        'image',
                        
                        'sku',
                        
                        
                        'minimum_quantity',
                        'substract_stock',
                        'outofstock_status',
                        'seo_keyword',
                        'manufacturer',
                        
                        'sort_order',
                        'update_by',
                        'update_time',
                         */
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{update}',
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-data-table tbody tr td{vertical-align: middle}
    .right-align{text-align: right}
    center-align{text-align: center}
</style>



