<div class="container">
    <div class="open_page">
        <div class="page-title col-md-12"><h4 style="font-size:24px; margin-top:10px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Gallery List</h4></div>
        <div style="padding-bottom: 15px;"></div>


        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading"></div> -->
                <div class="panel-body">

                    <div class="col-md-4 col-md-offset-4">
                        <form action="" method="get">
                            <table class="table">
                                <tr>
                                    <td style="border:none">
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                            'name' => 'filter_date',
                                            'value' => (isset($_GET['filter_date']) && $_GET['filter_date'] != '' ) ? date("d-m-Y", strtotime($_GET['filter_date'])) : '',
                                            'options' => array(
                                                'mode' => 'focus',
                                                'dateFormat' => 'dd-mm-yy',
                                                'showAnim' => 'slideDown',
                                            ),
                                            'htmlOptions' => array(
                                                'class' => 'form-control', 'placeholder' => 'Select Date'
                                            ),
                                        ));
                                        ?>
                                    </td>
                                    <td style="border:none">
                                        <input type="submit" value="Filter" class="btn btn-primary">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="clearfix">&nbsp;</div>

                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $model->searchgallery(),
                        'itemView' => '_slideShowItem',
                        'summaryText' => ''
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .ssitem{
        min-height: 295px;
    }
    .ssitem h4{
        text-align: center;
    }
</style>



