<div class="container">
    <div class="row margin-top">
        <div class="col-sm-5">
            <div class="future">
                <?php
                $featured = Post::model()->getFeaturedNews(3);
                if (count($featured)):
                    $i = 0;
                    foreach ($featured as $items):
                        $i++;
                        $url = Post::model()->makeLink($items->id);
                        if ($i == 1) {
                            ?>
                            <div class="future-img"><a href="<?= $url ?>"><?= Yii::app()->easycode->showImage($items->image, 570, 270) ?></a></div>
                            <div class="future-title">
                                <a href="<?= $url ?>"> <?= $items->title ?> </a>
                            </div>
                            <div class="future-descriptor">
                                <p><?= $items->short_description ?></p>
                                <hr/>
                            </div>
                        <?php } else { ?>
                            <div class="short-future-img">
                                <a href="<?= $url ?>"><?= Yii::app()->easycode->showImage($items->image, 80, 58) ?></a>
                                <a style="font-weight: bold" href="<?= $url ?>"><?= $items->title ?></a>

                                <p><?= $items->short_description ?></p>
                            </div>
                            <?php
                        } endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="future">
                    <!--<div class="stores-heading"><span> শীর্ষ খবর  </span></div>-->
                    <div class="stores-link">
                        <ul>
                            <?php
                            $topPost = Post::model()->getTopRecentPost(15);
                            if (count($topPost) > 0): foreach ($topPost as $post):
                                    ?>
                                    <li><a href="<?= Post::model()->makeLink($post->id) ?>"><?= $post->title ?></a></li>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div class="stores-heading all-latest"><a href="<?= $this->createUrl('//category/all') ?>">সব খবর</a></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="category-title">স্পটলাইট</div><br>
            <?php
            /* স্পটলাইট Data */
            $spotlight = Post::model()->getPost(11, 8);
            if (count($spotlight['result']) > 0) {
                $this->renderPartial('listData', array('spotlight' => $spotlight, 'catId' => 11));
            }
            ?>
        </div>
    </div>
    <!-- secont row start -->
    <div class="row margin-top">
        <hr/>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-8">
                    <div class="addons">
                        <a href=""><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/500x100.gif" alt></a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="addons">
                        <div style="width: 180px; height: 80px; background-color: #ccc; text-align: center; line-height: 80px;">Advertisement 180 X
                            100
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="fiture-show-wrap secont-content">
                    <?php
                    /* জাতীয় Data */
                    $spotlight = Post::model()->getPost(1, 6);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 1, 'class' => 'col-sm-4'));
                    }
                    ?>

                    <?php
                    /* আন্তর্জাতিক Data */
                    $spotlight = Post::model()->getPost(2, 6);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 2, 'class' => 'col-sm-4'));
                    }
                    ?>

                    <?php
                    /* রাজনীতি Data */
                    $spotlight = Post::model()->getPost(3, 6);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 3, 'class' => 'col-sm-4'));
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="fiture-show-wrap">
                    <?php
                    /* টেলিকম ও প্রযুক্তি Data */
                    $spotlight = Post::model()->getPost(4, 6);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 4, 'class' => 'col-sm-4'));
                    }
                    ?>
                    <?php
                    /* অর্থনীতি Data */
                    $spotlight = Post::model()->getPost(5, 6);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 5, 'class' => 'col-sm-4'));
                    }
                    ?>
                    <?php
                    /* আইন ও বিচার Data */
                    $spotlight = Post::model()->getPost(6, 6);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 6, 'class' => 'col-sm-4'));
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-md-12">
                <div class="future future-border margin-left">
                    <div class="stores-heading">আর্কাইভ</div>
                    <div class="future-descriptor">
                        <br>
                        <form action="<?= $this->createUrl('//category/all') ?>" method="get" style="text-align: center">
                            <table style="width: auto!important; margin: 0 auto">
                                <tr class="">
                                    <td></td>
                                    <td>
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                            'name' => 'publish_date',
                                            // additional javascript options for the date picker plugin
                                            'options' => array(
                                                'showAnim' => 'fold',
                                                'dateFormat' => 'dd-mm-yy',
                                                'showOtherMonths' => true,
                                                'selectOtherMonths' => true,
                                                'changeMonth' => true,
                                                'changeYear' => true,
                                            ),
                                            'htmlOptions' => array(
                                                'placeholder' => 'তারিখ নির্বাচন করুন',
                                                'class' => 'form-control',
                                                'style' => 'color:black',
                                            ),
                                        ));
                                        ?>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> অনুসন্ধান</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12">
                <div class="tab-menu">
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
                                            <?php
                                        endforeach;
                                    }
                                    ?>
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
            <div class="col-md-12">
                <div class="sidebar-add-wrap">
                    <div class="sidebar-add1">
                        <a href=""><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/500x100.gif" alt=""> </a>
                    </div>
                </div>
                <div class="sidebar-add-wrap">
                    <div class="sidebar-add1">
                        <a href=""><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/500x100.gif" alt=""> </a>
                    </div>
                </div>
                <div class="sidebar-add-wrap">
                    <div class="sidebar-add1">
                        <a href=""><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/500x100.gif" alt=""> </a>
                    </div>
                </div>
            </div>

            <div class="clearfix">&nbsp;</div>

            <div class="col-md-12">
                <div class="fb-like-box" data-href="https://www.facebook.com/asianmailbd" data-width="280" data-height="350" data-colorscheme="light"
                     data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
            </div>
        </div>
    </div>
    <!-- second row exit -->
    <!-- third section html start -->
    <div class="row margin-top">
        <hr/>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12 row">
                    <?php
                    /* অপরাধ Data */
                    $spotlight = Post::model()->getPost(7, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layout1in2', array('spotlight' => $spotlight, 'catId' => 7));
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 row">
                    <?php
                    /* শিল্প ও সাহিত্য Data */
                    $spotlight = Post::model()->getPost(12, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layout1in2', array('spotlight' => $spotlight, 'catId' => 12));
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 row">
                    <?php
                    /* বিনোদন Data */
                    $spotlight = Post::model()->getPost(15, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layout1in2', array('spotlight' => $spotlight, 'catId' => 12));
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="">
                <div class="add-small">
                    <a href=""><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/500x100.gif" alt=""></a>
                </div>

                <div class="add-small">
                    <a href=""><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/180x500.gif" alt=""></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="row">
                <?php
                /* শিক্ষা Data */
                $spotlight = Post::model()->getPost(13, 6);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 13, 'class' => 'col-sm-12'));
                }
                ?>
            </div>

            <div class="row">
                <?php
                /* স্বাস্থ্য Data */
                $spotlight = Post::model()->getPost(14, 6);
                if (count($spotlight['result']) > 0) {
                    $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 14, 'class' => 'col-sm-12'));
                }
                ?>
            </div>
        </div>
    </div>
    <!-- third section html Exit -->

    <div class="row margin-top">
        <?php
        $spotlight = Post::model()->getPost(3, 15);
        if (count($spotlight['result']) > 0) {
            ?>
            <div class="col-sm-9">
                <div class="category-title">
                ফটো গ্যালারী 
                </div><br><br>
                <div class="bxslider-gallary">
    <?php foreach ($spotlight['result'] as $post): ?>
                        <div>
                            <a href="<?= Post::model()->makeLink($post['id']) ?>"><img src="<?= $slide[]=Yii::app()->easycode->showImage($post['image'], 836, 580, false, true, false) ?>" title="<?= $post['title'] ?>"/></a>
                        </div>
    <?php endforeach; ?>
                </div>
            </div>
<?php } ?>
    </div>


    <!-- slider html start -->
    <div class="row margin-top">
        <hr/>
        <div class="col-sm-12">
            <div class="category-title">
                এইবেলা স্পেশাল 
            </div><br><br>
            <?php
            /* বিনোদন Data */
            $spotlight = Post::model()->getPost(3, 15);
            if (count($spotlight['result']) > 0) {
                echo '<ul class="bxslider"  style="margin-left: -40px; width:1100px">';
                foreach ($spotlight['result'] as $post):
                    ?>
                    <li><a href="<?= Post::model()->makeLink($post['id']) ?>"><img
                                src="<?= Yii::app()->easycode->showImage($post['image'], 300, 240, false, true, false) ?>"
                                title="<?= $post['title'] ?>"/></a></li>
                        <?php
                    endforeach;
                    echo '</ul>';
                }
                ?>

        </div>
    </div>
    <!-- slider html Exit -->

    <div class="row margin-top">
        <div class="col-md-8">

        </div>

        <!-- Third row Start -->
        <!--    <div class="row margin-top"><hr/>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="stores-heading popular"><span >POPULAR SEARCHES ON BDNEWS24 CLASSIFIEDS</span></div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="popular-link">
                                    <ul class="nav popular-link-nav">
                                        <li><a href="#">Part time jobs in dhaka for students</a></li>
                                        <li><a href="#">Toyota car price in bangladesh</a></li>
                                        <li><a href="#">Used cars for sale in dhaka bangladesh</a></li>
                                        <li><a href="#">Hp pavilion g4 laptop price in bangladesh</a></li>
                                        <li><a href="#">Price of mobile phones in bangladesh</a></li>
                                        <li><a href="#">German shepherd dog for sale</a></li>
                                        <li><a href="#">Dining table and chairs</a></li>
                                        <li><a href="#">Furniture for sale</a></li>
                                        <li><a href="#">Outsourcing center</a></li>
                                        <li><a href="#">Industrial sewing machine</a></li> 
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="popular-link">
                                    <ul class="nav popular-link-nav">
                                        <li><a href="#">Part time jobs in dhaka for students</a></li>
                                        <li><a href="#">Toyota car price in bangladesh</a></li>
                                        <li><a href="#">Used cars for sale in dhaka bangladesh</a></li>
                                        <li><a href="#">Hp pavilion g4 laptop price in bangladesh</a></li>
                                        <li><a href="#">Price of mobile phones in bangladesh</a></li>
                                        <li><a href="#">German shepherd dog for sale</a></li>
                                        <li><a href="#">Dining table and chairs</a></li>
                                        <li><a href="#">Furniture for sale</a></li>
                                        <li><a href="#">Outsourcing center</a></li>
                                        <li><a href="#">Industrial sewing machine</a></li> 
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="popular-link">
                                    <ul class="nav popular-link-nav">
                                        <li><a href="#">Part time jobs in dhaka for students</a></li>
                                        <li><a href="#">Toyota car price in bangladesh</a></li>
                                        <li><a href="#">Used cars for sale in dhaka bangladesh</a></li>
                                        <li><a href="#">Hp pavilion g4 laptop price in bangladesh</a></li>
                                        <li><a href="#">Price of mobile phones in bangladesh</a></li>
                                        <li><a href="#">German shepherd dog for sale</a></li>
                                        <li><a href="#">Dining table and chairs</a></li>
                                        <li><a href="#">Furniture for sale</a></li>
                                        <li><a href="#">Outsourcing center</a></li>
                                        <li><a href="#">Industrial sewing machine</a></li> 
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="popular-link">
                                    <ul class="nav popular-link-nav">
                                        <li><a href="#">Part time jobs in dhaka for students</a></li>
                                        <li><a href="#">Toyota car price in bangladesh</a></li>
                                        <li><a href="#">Used cars for sale in dhaka bangladesh</a></li>
                                        <li><a href="#">Hp pavilion g4 laptop price in bangladesh</a></li>
                                        <li><a href="#">Price of mobile phones in bangladesh</a></li>
                                        <li><a href="#">German shepherd dog for sale</a></li>
                                        <li><a href="#">Dining table and chairs</a></li>
                                        <li><a href="#">Furniture for sale</a></li>
                                        <li><a href="#">Outsourcing center</a></li>
                                        <li><a href="#">Industrial sewing machine</a></li> 
                                    </ul>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div> 
            </div>-->
        <!-- Third row exit -->

    </div>