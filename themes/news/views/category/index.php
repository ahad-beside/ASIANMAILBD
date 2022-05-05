<?php 
$this->pageTitle = CHtml::encode($data['categoryName']->metatag_title);
$this->pageDescription = CHtml::encode($data['categoryName']->metatag_description);
$this->pageKeyword = CHtml::encode($data['categoryName']->metatag_keywords);
?>

<div class="container">
    <div class="category-page">
        <div class="page-title col-md-12"><strong><?= $data['categoryName']->name ?></strong></div>
    </div>
    <div class="">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $model,
            'itemView' => '_view',
            'itemsCssClass'=>'row per-item',
            'summaryText'=>'',
            'emptyText'=>'দুঃখিত কোন ফলাফল পাওয়া যাইনি',
        )); ?>
    </div>
</div>
