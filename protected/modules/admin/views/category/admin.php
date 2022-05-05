<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Category</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('category/create'), array('class' => 'btn btn-default btn-circle', 'title' => 'New Category'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('category/admin'), array('class' => 'btn btn-default btn-circle', 'title' => 'All Category'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Categories</div>
            <div class="panel-body">





                <div class="search-form" style="display:none">
                    <p>
                        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
                        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
                    </p>

                    <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
                </div><!-- search-form -->



                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'category-grid',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'itemsCssClass' => 'table table-hover',
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
                            'name' => 'name',
                            'value' => 'Category::model()->getCategoryName($data->id,$data->name)',
                        ),
                        array(
                            'name' => 'sort_order',
                            'filter' => false,
                        ),
                        //'description',
                        //'metatag_title',
                        //'metatag_description',
                        //'metatag_keywords',
                        /*
                          'parent',
                          'image',
                          'top',

                          'status',
                          'update_by',
                          'update_time',
                         */
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{update}{delete}',
                            /*'buttons' => array(
                                'update' => array(
                                    'type'=>'raw',
                                    'label' => '<i class="fa fa-check"></i>',
                                    'imageUrl'=>'',
                                )
                            ),*/
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>


