<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$this->pageTitle = 'ভোটিং সিস্টেম';
$this->pageDescription = 'ভোটিং সিস্টেম';
$this->pageKeyword = 'ভোটিং সিস্টেম';
$this->ogUrl = $actual_link;
$this->ogTitle = $this->pageTitle;
$this->ogDescription = $this->pageDescription;
?>

<div class="container">
    <div class="row margin-top">
        <div class="col-md-12 post-view">
            <div class="col-md-12 row">
                <div class="clearfix">&nbsp;</div>

                <div class="row">
                    <div class="col-md-12"><h2 class="job-title">ভোটের ইতিহাস</h2></div>

                    <div class="col-md-12">
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'poll-grid',
                            'htmlOptions' => array('class' => 'table-responsive'),
                            'itemsCssClass' => 'table table-hover',
                            'dataProvider' => $model->search(),
                            'summaryText' => '',
                            'columns' => array(
                                array(
                                    'class' => 'IndexColumn',
                                    'header' => '',
                                    'headerHtmlOptions' => array('style' => 'width:20px;'),
                                ),
                                array(
                                    'name' => 'title',
                                    'header' => '',
                                    'type' => 'html',
                                    'value' => 'CHtml::link($data->title,Yii::app()->createUrl("//poll/viewResult",array("id"=>$data->id,"name"=>Yii::app()->easycode->seoUrl($data->title))))',
                                ),
                                array(
                                    'name' => 'update_time',
                                    'header' => '',
                                    'value' => 'date(\'d M, Y\', strtotime(($data->update_time == Null) ? $data->entry_time : $data->update_time))',
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>