<?php foreach ($data->items as $items): ?>
    <div class='col-md-3'>
        <a class="fancybox" rel="gallery1" href="<?php echo Yii::app()->baseUrl ?>/upload/<?php echo $items->image ?>" title="<?php echo $items->title ?>" style="float: right">
            <img src="<?php echo  Yii::app()->easycode->showimage($items->image, 265, 165, false) ?>" alt="" style='margin-bottom: 20px'/>       
        </a>
    </div>
<?php endforeach; ?>


