<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Image Slider</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('slideshow/createImageSlide'), array('class' => 'btn btn-default btn-circle', 'title' => 'New Slider'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('slideshow/adminImageSlide'), array('class' => 'btn btn-default btn-circle', 'title' => 'All Slider'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Slider</div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'slideshow-grid',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'itemsCssClass' => 'table table-hover table-striped custom-data-table',
                    'dataProvider' => $model->searchimage(),
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
                        'name',
                        'type',
                        array(
                            'name' => 'status',
                            'type' => 'raw',
                            'filter' => CHtml::dropDownList('Slideshow[status]', $model->status, Yii::app()->easycode->getStatusOptions('All')),
                            'value' => 'Yii::app()->easycode->getStatus($data->status)',
                            'htmlOptions' => array('class' => 'center-align'),
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{update}{delete}',
                            'updateButtonUrl'=>'Yii::app()->createUrl("//admin/slideshow/updateImageSlide",array("id"=>$data->id))',
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



