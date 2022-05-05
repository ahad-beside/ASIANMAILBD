<?php $this->pageTitle = $data['categoryName']->name . ' | ' . Yii::app()->name; ?>

<div class="container">
    <div class="page-title col-md-12"><strong><?= $data['categoryName']->name ?></strong></div>
    <div class="clearfix">&nbsp;</div>
    <div class="tab-content body-content">
        <div role="tabpanel" class="tab-pane active" id="latestv">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $model,
                'itemView' => '_view',
                'itemsCssClass' => 'per-item',
                'summaryText' => '',
                'emptyText' => 'দুঃখিত কোন ফলাফল পাওয়া যাইনি',
                'enablePagination'=>false,
            ));
            ?>

            <?php
            $this->widget('CLinkPager', array(
                'pages' => $pages,
                'header' => '',
                'maxButtonCount' => 5,
                'firstPageLabel' => '<<',
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
                'lastPageLabel' => '<<',
                //'htmlOptions'=>array('class'=>'')
            ))
            ?>
        </div>
    </div>
</div>
