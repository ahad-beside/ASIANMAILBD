<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Photo Gallary</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('slideshow/createCategorySlide'), array('class' => 'btn btn-default btn-circle', 'title' => 'New'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('slideshow/adminCategorySlide'), array('class' => 'btn btn-default btn-circle', 'title' => 'All'));
            ?>
        </div>
    </div>

    <div class="col-md-12">
        <?php
        echo CHtml::ajaxLink("Enable/Disable", $this->createUrl('//admin/slideshow/enableDisable'), array(
            'cache' => true,
            'type' => 'POST',
            'data' => 'js:{value : $.fn.yiiGridView.getChecked("slideshow-grid","actionCheck[]")}',
            "beforeSend" => 'js:function(){
                    var ask = confirm("Are you sure?");
                    if(ask==false){
                        return false;
                    }
                }',
            'success' => 'js:function(data){
                    $.fn.yiiGridView.update("slideshow-grid");
                    data = $.parseJSON (data);
                    if(data.msg=="success"){
                        alert("Proccess successfully.");
                    }else if(data.msg=="error"){
                        alert("Error occured !!!");
                    }
                }',
            'error' => 'js:function(data){
                    alert("Problem occured !!!");
                }',
                ), array('class' => 'btn btn-sm btn-danger', 'style' => ' font-weight:normal;', 'id' => 'confirmOrder' . uniqid()));
        ?>
    </div>
    <div class="clearfix">&nbsp;</div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Gallary</div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'slideshow-grid',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'itemsCssClass' => 'table table-hover table-striped custom-data-table',
                    'dataProvider' => $model->searchcategory(),
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
                            'updateButtonUrl' => 'Yii::app()->createUrl("//admin/slideshow/updateCategorySlide",array("id"=>$data->id))',
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



