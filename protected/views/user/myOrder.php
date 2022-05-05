<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'order-grid',
    'htmlOptions' => array('class' => 'table-responsive'),
    'itemsCssClass' => 'table table-hover table-striped custom-data-table',
    'dataProvider' => $model->search(Yii::app()->user->userId),
    'filter' => $model,
    'columns' => array(
        /* array(
          'class' => 'CCheckBoxColumn',
          'value' => '$data->id',
          'selectableRows' => '2',
          'id' => 'actionCheck'
          ), */
        array(
            'class' => 'IndexColumn',
            'header' => 'Sl',
            'headerHtmlOptions' => array('style' => 'width:20px;'),
        ),
        'order_number',
        array(
            'name' => 'order_date',
            'value' => '($data->order_date!="")?date("d-m-y",strtotime($data->order_date)):""',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'order_date',
                        'language' => 'en',
                        'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_order_date',
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
        'grand_total',
        array(
            'name'=>'status',
            'filter' => CHtml::dropDownList("Order[status]", $model->status, array('Pending'=>'Pending','Shipped'=>'Shipped','Delivered'=>'Delivered'), array('empty' => 'All')),
        ),
        /*array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
        ),*/
    ),
));
?>