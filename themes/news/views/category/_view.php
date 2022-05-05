<div class="col-md-6" style="margin-bottom: 40px; ">
    <div class="row">
        <div class="col-md-4 category-view-img">
            <?= Yii::app()->easycode->showImage($data['image'], 150, 100) ?>
        </div>
        <div class="col-md-8">
            <h4><a href="<?= Post::model()->makeLink($data['id']) ?>"><strong><?= CHtml::encode($data['title']) ?></strong></a></h4>
            <?= Post::model()->getExcerpt($data['description'], 0, 450); ?>
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12" style="border-bottom: solid 1px #efefef">
                <a href="<?= Post::model()->makeLink($data['id']) ?>" class="read_more">বিস্তারিত</a>
            </div>
        </div>

    </div>
</div>
<?php if (($index % 2) != 0) { ?>
    <div class="clearfix">&nbsp;</div>
    <?php if($index==1):?>
    <?= Advertisement::model()->getAdvertisement('Category Page F1', 1)?>
    <div class="clearfix">&nbsp;</div>
    <?php endif;?>
<?php
}?>