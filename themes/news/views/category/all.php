<?php $this->pageTitle = 'সকল খবর | ' . Yii::app()->name; ?>

<div class="container">
<form action="" method="get" style="text-align: center">
    <div class="col-md-12" style="text-align: center">
        
            <table style="width: auto!important; margin: 0 auto">
                <tr class="">
                    <td></td>
                    <td>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'name' => 'publish_date',
                            'value'=>date("d-m-Y",strtotime($data['publish_date'])),
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'fold',
                                'dateFormat' => 'dd-mm-yy',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                            ),
                            'htmlOptions' => array(
                                'placeholder'=>'তারিখ নির্বাচন করুন',
                                'class'=>'form-control',
                                'style'=>'color:black',
                                
                            ),
                        ));
                        ?>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> অনুসন্ধান</button>
                    </td>
                </tr>
            </table>
        
    </div>
    </form>

    <div class="category-page">
        <div class="page-title col-md-12"><strong>সকল খবর</strong></div>
    </div>

    <div class="">
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $model,
            'itemView' => '_view',
            'itemsCssClass' => 'row per-item',
            'summaryText'=>'',
            'emptyText'=>'দুঃখিত কোন ফলাফল পাওয়া যাইনি',
            
        ));
        ?>
    </div>
</div>
