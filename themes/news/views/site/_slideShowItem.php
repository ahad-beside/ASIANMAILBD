<?php foreach($data->items as $row):?>

<div class="col-md-4 ssitem">
    <a class="fancybox" rel="gallery1" href="<?php echo Yii::app()->baseUrl ?>/upload/<?php echo $row->image ?>" title="<?php echo $row->title ?>">
        <img src="<?php echo Yii::app()->easycode->showimage($row->image, 325, 220, false) ?>" alt="<?php echo $row->title ?>"/>
        <h4 class="title"><?php echo Post::model()->getExcerpt($row->title,0,200) ?></h4>
    </a>
</div>

<?php endforeach;?>
