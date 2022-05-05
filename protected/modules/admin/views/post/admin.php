<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Posts</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('create'), array('class' => 'btn btn-default btn-circle', 'title' => 'New Post'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('admin'), array('class' => 'btn btn-default btn-circle', 'title' => 'All Post'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Post <?php //echo Yii::app()->user->userId; ?></div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'post-grid',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'itemsCssClass' => 'table table-hover',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'afterAjaxUpdate' => 'reinstallDatePicker',
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
                            'name' => 'title',
                            'type'=>'raw',
                            'value'=>'CHtml::link($data->title,Post::model()->makeLink($data->id),array("target"=>"_blank"))',
                        ),
                        array(
                            'name'=>'categoryId',
                            'filter'=> CHtml::dropDownList('Post[categoryId]', $model->categoryId, Category::model()->dropDown(),array('empty'=>'Select Category','style'=>'width:150px')),
                            'value'=>'(is_array(Post::model()->getSelectedCategoryName($data->id))?implode(", ",Post::model()->getSelectedCategoryName($data->id)):"")',
                        ),
                        
                         array(
                            'name' => 'entry_by',
                            'type'=>'raw',
                             'filter'=> CHtml::dropDownList('Post[entry_by]', $model->entry_by, CHtml::listData(User::model()->findAll(), 'id', 'first_name'), array('empty' => 'Select Any')),
                             
//                            'value'=>'CHtml::link($data->entry_by,Post::model()->makeLink($data->id),array("target"=>"_blank"))',
                       'value'=>'User::model()->findByPk($data->entry_by)->first_name',
                        'visible'=>(Yii::app()->user->roles=='Admin')?true:false,     
                        ),
                        
                         array(
                            'name' => 'update_by',
                            'type'=>'raw',
                             'filter'=> CHtml::dropDownList('Post[update_by]', $model->update_by, CHtml::listData(User::model()->findAll(), 'id', 'first_name'), array('empty' => 'Select Any')),
                           'value'=>'User::model()->findByPk($data->update_by)->first_name',
                             'visible'=>(Yii::app()->user->roles=='Admin')?true:false,
                        ),
                        array(
                            //'name' => 'update_time',
                            'name' => 'update_time',
                            'value' => 'date("d-m-Y", strtotime($data->update_time))',
                            'header'=>'Date',
                            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'update_time',
                                'language' => 'en',
                                'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
                                'htmlOptions' => array(
                                    'id' => 'datepicker_for_update_time',
                                    'size' => '10',
                                ),
                                'defaultOptions' => array(// (#3)
                                    'showOn' => 'focus',
                                    'dateFormat' => 'dd-mm-yy',
                                    'showOtherMonths' => true,
                                    'selectOtherMonths' => true,
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                    'showButtonPanel' => true,
                                )
                            ), true),
                        ),
                        array(
                            'name'=>'status',
                            'value'=>'($data->status==0)?"Inactive":"Active"',
                            //'value'=>'$data->status',
                            //'visible'=>(Yii::app()->user->roles!='Admin')?true:false,
                            'filter'=> CHtml::dropDownList('Post[status]', $model->status, array('1'=>'Active', '0'=>'Inactive'), array('empty' => 'Select Any')),
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{update}{delete}',
                            'buttons' => array(
                                'update' => array(
                                    'label' => '<i class="fa fa-edit"></i>',
                                    'imageUrl' => false,
                                    'options' => array('style' => 'margin:0px 5px; font-size:20px', 'title' => 'Update'),
                                    //'url' => 'Yii::app()->createUrl("//user/jobpost",array("id"=>$data->id))',
                                ),
                                'delete' => array(
                                    'label' => '<i class="fa fa-times"></i>',
                                    'imageUrl' => false,
                                    'options' => array('class' => 'delete', 'title' => 'Delete', 'style'=>'color:red'),
                                    'visible'=>'Yii::app()->user->roles=="Admin"',
                                    //'url' => 'Yii::app()->createUrl("//user/jobdel",array("id"=>$data->id))',
                                ),
                            ),
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_update_time').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['en'],{'dateFormat':'dd-mm-yy'}));
    
}
");
?>