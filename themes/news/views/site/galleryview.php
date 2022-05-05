<div class="container post-view">
    <div class="page-title"><h4>
            <?php
            $gid = $_GET['id'];
            $slider = Slideshow::model()->find(
                    array(
                        'condition' => 'id=:gid',
                        'params' => array(':gid' => $gid),
            ));
            echo $slider->name;
            $slideitems = SlideshowItems::model()->findAll(
                    array(
                        'condition' => 'slideshow_id=:slideritem',
                        'params' => array(':slideritem' => $gid),
            ));
            ?>
        </h4></div>
    <div class='clearfix'>&nbsp;</div>
    <?php
    foreach ($slideitems as $items):
        ?>
        <div class='col-md-3'>
            <a class="fancybox" rel="gallery1" href="<?php echo Yii::app()->baseUrl ?>/upload/<?php echo $items->image ?>" title="<?php echo $items->title ?>" style="float: right">
                <img src="<?php echo Yii::app()->easycode->showimage($items->image, 265, 165, false) ?>" alt="" style='margin-bottom: 20px'/>       
            </a>
        </div>
<?php endforeach; ?>

</div>


