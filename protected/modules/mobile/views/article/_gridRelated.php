<?php if(count($data['relatedPost'])>0):?>
<!--<h3 style="margin-top: 0px" class="bg-info news-title-bg"><a href="/category/208/বিশেষ সংবাদ ">বিশেষ সংবাদ</a></h3>-->
<?php $i=0; foreach($data['relatedPost'] as $item): $i++;?>
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <a href="<?= $link=Post::model()->makeLink($item->id)?>"><img width="250" height="150" data-holder-rendered="true" src="<?= Yii::app()->easycode->showImage($item->image,250,150,false)?>" alt="<?= $title=CHtml::encode($item->title)?>" class="img-responsive"></a>
        <div class="caption">
            <a href="<?= $link?>"><strong><?= $title?></strong></a>
        </div>
    </div>
</div>
<?php if($i==3): $i=0;?>
<div class="clear">&nbsp;</div><div class="clear">&nbsp;</div>
<?php endif;?>
<?php endforeach;?>
<!--<div class="clear">&nbsp;</div><div class="clear">&nbsp;</div>-->
<?php endif;?>