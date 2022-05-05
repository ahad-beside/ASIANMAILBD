<!-- FB like box -->
<div class="row">

                  <div class="col-md-12">
                        <div class="fb-like-box" data-href="https://www.facebook.com/asianmailbd" data-width="260" data-height="250" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="false"></div>
                    </div>
</div>
<div class="clearfix">&nbsp;</div>
<!--<div class="clearfix">&nbsp;</div>-->
<!-- FB like box -->
<div class="row"> 
    <?php
    //echo "<h3 class='bg-info news-title-bg' style='margin-top: 0px'>" . date("Y-m-d", strtotime('-1 Days')) . "<h3>";
     echo "<h3 class='bg-info news-title-bg' style='margin-top: 0px'>গত কালের খবর<h3>";
    
    $id = 15;
    $pdate=date("Y-m-d", strtotime('-1 Days'));
    $sql = "select t1.id, t1.title, t1.slug, t1.image, t1.description, t1.status, t1.entry_time from post t1 join post_categories t2 on t2.post_id=t1.id where t1.status='1' and t2.category_id='{$id}' and t1.entry_time like '{$pdate}%' limit 5";
    $rawData = Yii::app()->db->createCommand($sql)->queryAll();
//foreach($rawData as $s):
//    echo $s['title'];
//endforeach;


    foreach ($rawData as $s):
        ?>
    <div class="media" style="border-bottom: 1px solid #EEEEEE; padding-bottom: 10px">
            <?php if ($s['image'] != ''): ?>
                <div class="media-left">
                    
<!--                        <img class="media-object" src= "<?php //echo Yii::app()->easycode->showImage($s['image'], 70, 35) ?>"/>-->
                        <img class="media-object" src="<?php echo Yii::app()->easycode->showImage($s['image'], 60, 55, false) ?>"/>
                </div>
            <?php endif; ?>
            <div class="media-body">
                <h4 class="media-heading"><a target="_blank" href="<?= Post::model()->makeLink($s['id']) ?>"><?= $s['title'] ?></a></h4>
            </div>
        </div>
        <?php
    endforeach;
    ?>
    </div>
<div class="col-md-6px"></div><div class="col-md-6px" style="float: right; padding-right: 1px"><h4><a target="_blank" href="category/15" class="read_more">বিনোদন-এর সব খবর »</a></h4></div>





