<style>
    .customNavigation i {
        font-size: 24px;
    }
</style>
<div class="container">
    <div class="tab-content body-content">
        <div role="tabpanel" class="tab-pane active" id="latestv">
            <div id="demo"> 

                <!--<div class="customNavigation">
                        <div style="float:left;"><a class="btn prev"><i aria-hidden="true" class="fa fa-arrow-circle-left"></i></a></div>
                        <div style="float:right;"><a class="btn next"><i aria-hidden="true" class="fa fa-arrow-circle-right"></i></a></div>
                      </div>-->

                <div id="owl-demo" class="owl-carousel">
                    <?php
                    $featured = Post::model()->getFeaturedNews(5, 0);
                    foreach ($featured as $post):
                        ?>
                        <div class="item"> <a href="<?= Post::model()->makemobileLink($post['id']) ?>"><img src="<?= Yii::app()->easycode->showImage($post['image'], 300, 170, false, true, false) ?>" title="<?= $post['title'] ?>" class='img-widthl'/></a>
                            <div class="slidertitle"><a href="<?= Post::model()->makemobileLink($post['id']) ?>">
                                    <h2>
                                        <?= $post['title'] ?>
                                    </h2>
                                </a></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <?= Advertisement::model()->getAdvertisement('M Home Page F1', 1)?>
            <div class="clearfix">&nbsp;</div>
            <!-- <img src="<?= Yii::app()->baseUrl . '/images/promotion/adddin.jpg' ?>" class="img-responsive"/> -->
            <div class="clearfix">&nbsp;</div>
            <!--start latest post-->
            <div class="page-title col-md-12" style="text-align:left;"><strong>সর্বশেষ</strong></div>
            <div class="clearfix">&nbsp;</div>
            <?php
            $featured = Post::model()->getPost('', 10);
            if (count($featured['result']) > 0):
                foreach ($featured['result'] as $post): $x++;
                    ?>
                    <div class="listed">
                        <?php $link = Post::model()->makeLink($post['id']); ?>
                        <div class="media-lefts"> <a href="<?= Post::model()->makemobileLink($post['id']) ?>"><img src="<?= Yii::app()->easycode->showImage($post['image'], 70, 65, false, true, false) ?>" title="<?= $post['title'] ?>" class='media-object'/></a> </div>
                        <div class="media-bodys">
                            <h4 class="media-heading"><a href="<?= Post::model()->makemobileLink($post['id']) ?>">
                                    <?= $post['title'] ?>
                                </a></h4>
                            <div class="datetimes"><?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($post['update_time']))) ?></div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
            <!--end latest post--> 


            <div class="clearfix">&nbsp;</div>
            <!--start special post-->
            <div class="body-cont-grid">
                <?php
                /* এইবেলা স্পেশাল  Data */
                $spotlight = Post::model()->getPost(11, 10);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 11));
                }
                ?>
            </div>
            <!--end special post-->
            
            <div class="clearfix">&nbsp;</div>
            <?php $this->renderPartial('/poll/giveVote') ?>
            <div class="clearfix">&nbsp;</div>
            

            <!--start national-->
            <div class="clearfix">&nbsp;</div>
            <div class="body-cont-grid">
                <?php
                /* জাতীয়  Data */
                $spotlight = Post::model()->getPost(1, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 1));
                }
                ?>
            </div>
            <div class="clearfix">&nbsp;</div>

            <!--end national--> 

            <!--start rajneti/politics-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(3, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 3));
                }
                ?>
            </div>
            <!--end rajnet/politices-->
            <div class="clearfix">&nbsp;</div>
            <!--            start sharadesh-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(165, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 165));
                }
                ?>
            </div>
            <!--end sharadesh-->
            <div class="clearfix">&nbsp;</div>
            <!--            start international-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(2, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 2));
                }
                ?>
            </div>
            <!--end international-->
            <div class="clearfix">&nbsp;</div>
            <!--            start entertainment-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(15, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 15));
                }
                ?>
            </div>
            <!--end entertainment-->
            <div class="clearfix">&nbsp;</div>
            <!--            start play-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(16, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 16));
                }
                ?>
            </div>
            <!--end play-->
            <div class="clearfix">&nbsp;</div>
            <!--            start education-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(13, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 13));
                }
                ?>
            </div>
            <!--end education-->
            <div class="clearfix">&nbsp;</div>
            <!--            start mukto-mot-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(73, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 73));
                }
                ?>
            </div>
            <!--end mukto-mot-->
            <div class="clearfix">&nbsp;</div>

            <!--            start lifestyle-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(74, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 74));
                }
                ?>
            </div>
            <!--end lifestyle-->
            <div class="clearfix">&nbsp;</div>
            <!--            start religion-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(143, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 143));
                }
                ?>
            </div>
            <!--end religion-->
            <div class="clearfix">&nbsp;</div>
            <!--            start protibeshi-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(213, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 213));
                }
                ?>
            </div>
            <!--end protibeshi-->
            <div class="clearfix">&nbsp;</div>
            <!--            start science and technology-->
            <div class="body-cont-grid">
                <?php
                $spotlight = Post::model()->getPost(4, 7);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 4));
                }
                ?>
            </div>

            <!--end science and technology-->
            <div class="clearfix">&nbsp;</div>

            <div id="demo"> 
                <div id="owl-demo2" class="owl-carousel">
                    <?php
                    $gallary = Slideshow::model()->getLatestSlideShow();
                    //echo count($gallary);
                    if (count($gallary) > 0) {
                        foreach ($gallary as $post):
                            ?>
                            <div class="item"> 
                                <img src="<?= Yii::app()->easycode->showImage($post['image'], 300, 170, false, true, false) ?>" title="<?= $post['title'] ?>" class='img-widthl'/>

                                <div class="slidertitle"><a href="<?= Post::model()->makemobileLink($post['id']) ?>">
                                        <h2>
                                            <?= $post['title'] ?>
                                        </h2>
                                    </a></div>
                            </div>
                            <?php
                        endforeach;
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>

            <div class="row">
                <div class="col-md-12">

                    <?php $this->renderPartial('subscribeForm'); ?>

                </div>
            </div>

            <div class="clearfix">&nbsp;</div>
        </div>
    </div>
</div>
