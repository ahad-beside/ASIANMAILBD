<div class="col-md-4" style="margin-bottom: 40px; ">
    <div class="row">
        <div class="col-md-12 category-view-img">
            <a href="<?= Post::model()->makeLink($data['id']) ?>"><?= Yii::app()->easycode->showImage($data['image'], 200, 120) ?></a>
        </div>
        <div class="col-md-12">
            <h4><a href="<?= Post::model()->makeLink($data['id']) ?>"><strong><?= CHtml::encode($data['title']) ?></strong></a></h4>
        </div>
    </div>
</div>
<?php if (($index % 2) != 0) { ?>
    <div class="clearfix">&nbsp;</div>
<?php
}?>