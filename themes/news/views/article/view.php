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
        <div class="col-md-8 post-view">
            <div class="col-md-12 atricle_category row">
                <?php
                if(count($data['category'])>0):
                    echo "<span class='btn btn-sm btn-default'><a href='" . Yii::app()->homeUrl . "'><i class='fa fa-home'></i></a></span> ";
                endif;
                foreach ($data['category'] as $cat):
                    if ((int) $cat > 0) {
                        echo "<span class='btn btn-sm btn-default'><a href='" . Category::model()->makemobileLink($cat) . "'>" . Category::model()->findByPk($cat)->name . "</a></span> ";
                    }
                endforeach;
                ?>   
            </div>
            <div class="clearfix">&nbsp;</div>
            <?= Advertisement::model()->getAdvertisement('Article Page F1', 1)?>
            <div class="clearfix">&nbsp;</div>

            <div class="col-md-12 row">
                <?php if (trim($model->sub_title) != '') { ?><div class="page-sub-title col-md-12"><strong><?= $model->sub_title ?></strong></div><?php } ?>
                <div class="page-title col-md-12"><strong><?= $model->title ?></strong></div>
                <div class="additional-info-post col-md-12"><strong>প্রকাশ:</strong> <?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($model->entry_time))) ?> <strong>হালনাগাদ:</strong> <?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($model->update_time))) ?></div>
            </div>

            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12">
                <table>
                    <tr>
                        <td>
                            <div class="fb-like" data-href="https://www.facebook.com/asianmailbd/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <div class="fb-share-button" data-href="<?= $actual_link ?>" data-layout="button_count"></div>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <div class="fb-send" data-href="<?= $actual_link ?>"></div>
                        </td>
                        <td>&nbsp;</td>
                        <td style="padding-top:5px">
                            <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="<?= $actual_link ?>" data-text="<?= CHtml::encode($model->title) ?>" data-hashtags="asianmailbd">Tweet</a>
                            <script>!function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = p + '://platform.twitter.com/widgets.js';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'twitter-wjs');</script>
                        </td>
                        <td>&nbsp;</td>
                        <td style="padding-top:5px">
                            <!-- Place this tag where you want the share button to render. -->
                            <div class="g-plus" data-action="share" data-annotation="bubble" data-height="20" data-href="<?= $actual_link ?>"></div>
                        </td>
                        <td>&nbsp;</td>
                        <td><a target="_blank" href="<?= $this->createUrl('//article/print/' . $model->id) ?>" class="btn btn-info btn-xs white-f-color"><i class="fa fa-print"></i> Print</a></td>                       
                    </tr>
                </table>
            </div>
            <div class="clearfix">&nbsp;</div>

            <?php if (!Yii::app()->user->isGuest): ?>
                <div class="col-md-12 row">
                    <table class="table table-striped">
                        <tr>
                            <td>
                                <strong>Posted By: <?= User::model()->findByPk($model->entry_by)->first_name ?></strong>
                                &nbsp;&nbsp;&nbsp;
                                <strong>Update By: <?= User::model()->findByPk($model->update_by)->first_name ?></strong>
                            </td>
                            <td style="text-align: right"><strong>Total View: <?= $model->times_of_read ?></strong></td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>

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

           

            <div class="col-md-12 row margin-top">
                <div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div>
                <div class="col-md-12">
                    <div class="fb-comments" data-href="<?= $actual_link ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                </div>

                <!-- Place this tag after the last share tag. -->
                <script type="text/javascript">
                    (function () {
                        var po = document.createElement('script');
                        po.type = 'text/javascript';
                        po.async = true;
                        po.src = 'https://apis.google.com/js/platform.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(po, s);
                    })();</script>

            </div>
                
            <div class="clearfix">&nbsp;</div>    
                <?= Advertisement::model()->getAdvertisement('Article Page F2', 1)?>
            <div class="clearfix">&nbsp;</div>

            <?php $this->renderPartial('_gridRelated', array('data' => $data)) ?>

            <div class="clearfix">&nbsp;</div>
        </div>
        <div class="col-md-4">

            <!-- FB like box -->
            <div class="row">
                <div class="col-md-12">
                    <div class="fb-like-box" data-href="https://www.facebook.com/asianmailbd" data-width="360" data-height="250" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="false"></div>
                </div>
            </div>
            <!-- FB like box -->

            <div class="clearfix">&nbsp;</div>
            <?= Advertisement::model()->getAdvertisement('Article Page Sidebar', 1)?>
            <div class="clearfix">&nbsp;</div>

            <div class="col-md-12">
               
                
                <div class="widget-title"><h3 class="bg-info news-title-bg" style="margin-top: 0px">আরও খবর</h3></div>
                
                <?php
                $similarPost = Post::model()->getSimilarCategoryPost($model->id, 20);
                if (count($similarPost) > 0) {
                    foreach ($similarPost as $post):
                        ?>
                        <div class="media">
                            <?php $link = Post::model()->makeLink($post['id']); ?>
                            <div class="media-left">
                                <a href="<?= $link ?>">
                                    <img class="media-object" src="<?= Yii::app()->easycode->showImage($post['image'], 70, 65, false, true, false) ?>" alt="<?= $post['title'] ?>">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="<?= $link ?>"><?= $post['title'] ?></a></h4>
                            </div>
                        </div>
                        <?php /* <div class="more_link row f16"><div><i class='fa fa-circle gray-f-color'></i></div> <a href="<?= $link = Post::model()->makeLink($post['id']) ?>"><?= $post['title'] ?></a></div> */ ?>
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
                                    $categoryId = PostCategories::model()->find('post_id=:id', array(':id' => $model->id))->category_id;
                                    $getMostRead = Post::model()->getMostRead(25, $categoryId);
                                    if (count($getMostRead) > 0) {
                                        foreach ($getMostRead as $post):
                                            ?>
                                            <li> <a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>"><?= $post->title ?></a></li>
                                            <?php
                                        endforeach;
                                    }
                                    ?> 
                                </ul>
                            </div>
                            <div class="tab-pane fade in" id="recentstorages">
                                <ul class="nav popular-link-nav tab-nav">
                                    <?php
                                    $getMostRead = Post::model()->getRecentPost(50);
                                    if (count($getMostRead) > 0) {
                                        foreach ($getMostRead as $post):
                                            ?>
                                            <li> <a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>"><?= $post->title ?></a></li>
                                            <?php
                                        endforeach;
                                    }
                                    ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
        </div>
    </div>
</div>