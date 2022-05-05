<?php
$this->pageTitle = $model->title;
$this->pageDescription = Post::model()->getExcerpt(trim(htmlspecialchars(strip_tags($model->description))), 0, 450);
if ($model->keyword != '')
    $this->pageKeyword = $model->keyword;
?>

<div class="container">
    <div class="row margin-top">
        <div class="col-md-8 post-view">
            <div class="col-md-12 row">
                <div class="page-title col-md-12"><strong><?= $model->title ?></strong></div>
                <div class="additional-info-post col-md-6">আপডেট: <?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($model->update_time))) ?></div>
                <div class="col-md-6">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_native_toolbox pull-right"></div>
                </div>
            </div>
            <div class="col-md-12 row">
                <div class="post-details">
                    <?php $this->renderPartial('slideShow', array('data' => $data)); ?>
                    <br><br>
                    <?php echo $model->description ?>
                </div>
            </div>
            <div class="col-md-12 row">
                <div class="col-md-12">
                    <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                    <div class="fb-comments" data-href="<?= $actual_link ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                </div>
            </div>

            <div class="clearfix">&nbsp;</div>

            <div class="row">
                <div class="col-md-12">
                    <span class='st_facebook_vcount' displayText='Facebook'></span>
                    <span class='st_fblike_vcount' displayText='Facebook Like'></span>
                    <span class='st__vcount' displayText=''></span>
                    <span class='st_googleplus_vcount' displayText='Google +'></span>
                    <span class='st_twitter_vcount' displayText='Tweet'></span>
                    <span class='st_linkedin_vcount' displayText='LinkedIn'></span>
                    <span class='st_email_vcount' displayText='Email'></span>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="bg-info news-title-bg row">আরও খবর</div>
            <?php
            $similarPost = Post::model()->getSimilarCategoryPost($model->id, 20);
            if (count($similarPost) > 0) {
                foreach ($similarPost as $post):
                    ?>
                    <div class="more_link row f16"><a href="<?= $link = Post::model()->makeLink($post['id']) ?>"><?= $post['title'] ?></a></div>
                    <?php
                endforeach;
            }
            ?>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12">
                <div class="tab-menu row">
                    <div class="bs-docs-example">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#MostRead" data-toggle="tab">সর্বাধিক পঠিত</a></li>
                            <li class=""><a href="#recentstorages" data-toggle="tab">সাম্প্রতিক খবর</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="MostRead">
                                <ul class="nav popular-link-nav tab-nav">
                                    <?php
                                    $getMostRead = Post::model()->getMostRead(10);
                                    if (count($getMostRead) > 0) {
                                        foreach ($getMostRead as $post):
                                            ?>
                                            <li><a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>"><?= $post->title ?></a></li>
                                        <?php endforeach;
                                    } ?> 
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="recentstorages">
                                <ul class="nav popular-link-nav tab-nav">
                                    <?php
                                    $getMostRead = Post::model()->getRecentPost(10);
                                    if (count($getMostRead) > 0) {
                                        foreach ($getMostRead as $post):
                                            ?>
                                            <li><a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>"><?= $post->title ?></a></li>
    <?php endforeach;
} ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

