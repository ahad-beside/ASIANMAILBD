<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$this->pageTitle = $model->title;
$this->pageDescription = Post::model()->getExcerpt(trim((strip_tags($model->description))), 0, 450);
if ($model->keyword != '')
    $this->pageKeyword = $model->keyword;
$this->ogUrl = $actual_link; 
$this->ogTitle = $model->title;
$this->ogDescription = $this->pageDescription;
?>

<div class="container">
    <div class="row margin-top">
        <div class="col-md-12" style="text-align: center">
            <a href="<?= Yii::app()->homeUrl ?>"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/eibela24.png" alt="eibela24.com" height="100"></a><br/><?= Yii::app()->easycode->ShowBanglaDate(date('l, d, F, Y')) ?>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12">
            <hr/>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12 post-view">
            <div class="col-md-12 row">
                <?php if (trim($model->sub_title) != '') { ?><div class="page-sub-title col-md-12"><strong><?= $model->sub_title ?></strong></div><?php } ?>
                <div class="page-title col-md-12"><strong><?= $model->title ?></strong></div>
                <div class="additional-info-post col-md-6">আপডেট: <?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($model->update_time))) ?></div>
                <div class="col-md-6">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_native_toolbox pull-right"></div>
                </div>
            </div>
            
            <div class="clearfix">&nbsp;</div>
            
            <?php if (count($data['category']) > 0 && in_array(207, $data['category'])): ?>
                <iframe width="560" height="315" src="<?= trim($model->description) ?>" frameborder="0" allowfullscreen></iframe>
            <?php else: ?>
                <div class="col-md-12 row">
                    <div class="post-details">
                        <?php $this->renderPartial('slideShow', array('data' => $data)); ?>
                        <br><br>
                        <?php echo $model->description ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-12 row">
                <div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div>
                <div class="col-md-12">
                    <div class="fb-comments" data-href="<?= $actual_link ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>

