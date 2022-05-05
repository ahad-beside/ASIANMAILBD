<?php
$this->pageTitle = 'Bangla News Online | Latest Bangla News Online - asianmailbd.Com';
$this->pageDescription = 'Grab the bangla news online with asianmailbd from a wide collection of latest bangla news online throughout the world.';
$this->pageKeyword = 'bangla news online, latest bangla news online';
?>

<div class="container">
  <div class="col-md-9"> 
    <!-- Featured & Tabs -->
    <div class="row">
      <div class="col-md-8" style="height: 415px; overflow: hidden">
        <div class="banner owl-carousel owl-theme">
          <?php
                        $featured = Post::model()->getFeaturedNews(5, 0);
                        foreach ($featured as $post):
                            ?>
          <div class="item"> <a href="<?= Post::model()->makeLink($post['id']) ?>"><img src="<?= Yii::app()->easycode->showImage($post['image'], 600, 400, false, true, false) ?>" title="<?= $post['title'] ?>" width="600" height="400"/></a>
            <div class="bannertitle">
              <?= $post['title'] ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="tab-menu">
          <div class="bs-docs-example">
            <div id="myTab">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#recentstorages" data-toggle="tab">সর্বশেষ</a></li>
                <li><a href="#MostRead" data-toggle="tab">সর্বাধিক পঠিত</a></li>
              </ul>
            </div>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane active fade in" id="recentstorages">
                <ul class="nav popular-link-nav tab-nav">
                  <?php
                                        $getMostRead = Post::model()->getRecentPost(50);
                                        if (count($getMostRead) > 0) {
                                            foreach ($getMostRead as $post):
                                                ?>
                  <li>
                    <?php if (trim($post->sub_title) != '') { ?>
                    <span>
                    <?= $post->sub_title ?>
                    </span>
                    <?php } ?>
                    <a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>">
                    <?= $post->title ?>
                    </a> </li>
                  <?php
                                            endforeach;
                                        }
                                        ?>
                </ul>
              </div>
              <div class="tab-pane fade in" id="MostRead">
                <ul class="nav popular-link-nav tab-nav">
                  <?php
                                        $getMostRead = Post::model()->getMostRead(25);
                                        if (count($getMostRead) > 0) {
                                            foreach ($getMostRead as $post):
                                                ?>
                  <li><a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>">
                    <?= $post->title ?>
                    </a></li>
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
    </div>
    <!-- Featured & Tabs -->
    
    <?= Advertisement::model()->getAdvertisement('Home Page F1', 1)?>
    
    <!-- Extra Featured -->
    
    <div class="row">
      <div class="col-md-12"> 
        
        <!---------------------------new design start---------------------->
        <div class="row">
          <div class="col-md-12">
            <div class="widget-title">
              <h3 style="margin-top: 0px" class="bg-info news-title-bg"><a href="#">শীর্ষ সংবাদ</a></h3>
            </div>
          </div>
          <div class="col-md-12">
            <?php
            //206 top news id
            $featured = Post::model()->getPost(206, 6);
          // $featured = Post::model()->find();
		    if (count($featured['result']) > 0):
			$i=1;
			 foreach ($featured['result'] as $post):
			 	if($i==1){
                ?>
            <div class="row classic-blog-type">
              <div class="col-md-12">
                <div class="bk-mask">
                  <div class="thumb"><a href="<?= Post::model()->makeLink($post['id']) ?>"> <img alt="<?= $post['title'] ?>" style="width: 100%; display: block;" src="<?= Yii::app()->easycode->showImage($post['image'], 245, 200, false, true, false) ?>" data-holder-rendered="true" width="100%" height="auto"> </a> <!-- close a tag --></div>
                  <!-- close thumb --> </div>
                <div class="post-c-wrap">
                  <h4 class="title"><a href="<?= Post::model()->makeLink($post['id']) ?>" itemprop="url"><?php echo $post["title"]; ?></a></h4>
                  <div class="excerpt"> <?php echo Post::model()->getExcerpt($post["description"], 0, 1050); ?> </div>
                </div>
                <div class="readmorelink"><a href="<?= Post::model()->makeLink($post['id']) ?>">বিস্তারিত...</a></div>
              </div>
            </div>
            <?php } $i++;
								endforeach;
								endif; ?>
            <div class="row module-block-2">
              <div class="col-md-12">
                <div class="list-small-post">
                  <ul>
                    <?php
            //206 top news id
            $featured = Post::model()->featuregetPost(206, 4);
            if (count($featured['result']) > 0){
			 foreach ($featured['result'] as $post):
    echo '
   <li class="small-post content_out clearfix">
      <div>
        <div class="thumb">
        	<a href="'. Post::model()->makeLink($post["id"]).'">
            	<img alt="'.$post["title"].'" src="'.Yii::app()->easycode->showImage($post["image"], 245, 200, false, true, false).'"  width="100%" height="auto">
            </a>
        </div>
       
        <div class="post-c-wrap">
          <h4 class="title" itemprop="name"><a href="'.Post::model()->makeLink($post["id"]).'">'. $post["title"] .'</a></h4>
          <div class="excerpt">
          	<p>'.Post::model()->getExcerpt($post["description"], 0, 250).'</p>
          </div>
        </div>
       
      </div>
    </li>';
    
     endforeach;
			}
    ?>
                    
                    <!-- End post -->
                  </ul>
                  <!-- End list-post --> 
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!---------------------------new design end----------------------> 
        
      </div>
    </div>
    
    <!-- Extra Featured -->
    
    
    <?php /*?><?= Advertisement::model()->getAdvertisement('Home Page F2', 1)?><?php */?>
    
    <div class="clearfix">&nbsp;</div>
    <div class="row margin-top">
      <div class="col-sm-12"><a href="#" target="_blank"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/sp_ad.jpg"/></a></div>
    </div>
    <div class="clearfix">&nbsp;</div>
    
    
   
    <!-- Category Displayed -->
    <div class="row margin-top">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-4">
            <?php
                            /* জাতীয়  Data */
                            $spotlight = Post::model()->getPost(1, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 1));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /* রাজনীতি Data */
                            $spotlight = Post::model()->getPost(3, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 3));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /* অর্থনীতি Data */
                            $spotlight = Post::model()->getPost(5, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 5));
                            }
                            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Category Displayed -->
    
    <div class="clearfix">&nbsp;</div>
    <div class="row margin-top">
      <div class="col-sm-12"><a href="http://www.coder71.com" target="_blank"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/coder71.gif" style="border:solid 2px #D9EDF7"/></a></div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <?php
            $data = Post::model()->getPost(165, 3);
            if (count($data) > 0)
                $this->renderPartial('groupTab', array('data' => $data, 'catId' => 165));
            ?>
    
    
    <div class="clearfix">&nbsp;</div>
    <div class="row margin-top">
      <div class="col-sm-12"><a href="#" target="_blank"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/sp_ad.jpg"/></a></div>
    </div>
    <div class="clearfix">&nbsp;</div>
    
    
    
    <!-- Category Displayed -->
    <div class="row margin-top">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-4">
            <?php
                            /* আন্তর্জাতিক Data */
                            $spotlight = Post::model()->getPost(7, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 7));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /* শিক্ষা  Data */
                            $spotlight = Post::model()->getPost(13, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 13));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /* বিজ্ঞান ও প্রযুক্তি  Data */
                            $spotlight = Post::model()->getPost(4, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 4));
                            }
                            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Category Displayed -->
    
    <div class="clearfix">&nbsp;</div>
    <div class="row margin-top">
      <div class="col-sm-12"><a href="#" target="_blank"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/sp_ad.jpg"/></a></div>
    </div>
    <div class="clearfix">&nbsp;</div>
    
    
    
    <!-- Gallary -->
    <div class="row">
      <div class="col-md-12">
        <div class="widget-title">
        <h3 class="bg-info news-title-bg row"><a href="<?= Yii::app()->createUrl('//site/gallerylist') ?>"> ছবিঘর</a></h3>
       
        </div>
        <ul class="bxslider-photogallary">
          <?php
                        $gallary = Slideshow::model()->getLatestSlideShow();
                        if (count($gallary) > 0) {
                            foreach ($gallary as $post):
                                ?>
          <li> <img src="<?= Yii::app()->easycode->showOriginalImage($post->image) ?>" title="<?= $post->title ?>" width="700" height="424"/> </li>
          <?php
                            endforeach;
                        }
                        ?>
        </ul>
      </div>
      
    </div>
    <!-- Gallary -->
    
   <div class="clearfix">&nbsp;</div>
    <div class="row margin-top">
      <div class="col-sm-12"><a href="#" target="_blank"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/sp_ad.jpg"/></a></div>
    </div>
    <div class="clearfix">&nbsp;</div>
    
    <!-- Category Displayed -->
    <div class="row margin-top">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-4">
            <?php
                            /* ধর্ম  Data */
                            $spotlight = Post::model()->getPost(216, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 216));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /*স্বাস্থ্য ও পরিবেশ  Data */
                            $spotlight = Post::model()->getPost(14, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 14));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /* খেলাধুলা  Data */
                            $spotlight = Post::model()->getPost(16, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 16));
                            }
                            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Category Displayed -->
    
    <div class="clearfix">&nbsp;</div>
    <div class="row margin-top">
      <div class="col-sm-12"><a href="#" target="_blank"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/sp_ad.jpg"/></a></div>
    </div>
    <div class="clearfix">&nbsp;</div>
    
    <!-- Category Displayed -->
    <div class="row margin-top">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-4">
            <?php
                            /* লাইফস্টাইল Data */
                            $spotlight = Post::model()->getPost(74, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 74));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /* বিনোদন Data */
                            $spotlight = Post::model()->getPost(15, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 15));
                            }
                            ?>
          </div>
          <div class="col-sm-4">
            <?php
                            /* কৃষি Data */
                            $spotlight = Post::model()->getPost(199, 7);
                            if (count($spotlight['result']) > 0) {
                                $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 199));
                            }
                            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Category Displayed -->
    
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="col-md-3"> 
    
    <!-- FB like box -->
    <div class="row">
      <div class="col-md-12">
        <div class="fb-like-box" data-href="https://www.facebook.com/asianmailbd" data-width="260" data-height="250" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="false"></div>
      </div>
    </div>
    <!-- FB like box -->
    
    
    
    <?= Advertisement::model()->getAdvertisement('Home Page Sidebar', 1)?>
      
    <div class="sidead" style="margin-top:20px;"><img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/295x240-.gif" /></div>
    
    <div class="sidead"><img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/295x240-.gif" /></div>
    
    <div class="row">
      <div class="col-md-12">
        <?php $this->renderPartial('//poll/giveVote') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h3 class="bg-info news-title-bg" style="margin-top: 0px"><a href="<?= $this->createUrl('//videos') ?>">ভিডিও</a></h3>
        <?php
                    /* video Data */
                    $spotlight = Post::model()->getPost(207, 1);
                    if (count($spotlight['result']) > 0) {
                        foreach ($spotlight['result'] as $video):
                            ?>
        <iframe width="265" height="180" src="<?= trim($video['description']) ?>" frameborder="0" allowfullscreen></iframe>
        <?php
                        endforeach;
                    }
                    ?>
      </div>
      <div class="col-md-12" style="text-align: right; font-weight: bold; font-size: 16px;"><a href="<?= $this->createUrl('//videos') ?>">আরও ভিডিও</a></div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row">
      <div class="col-md-12">
        <div class="future future-border margin-left">
          <div class="stores-heading">আর্কাইভ</div>
          <div class="future-descriptor"> <br>
            <form action="<?= $this->createUrl('//category/all') ?>" method="get" style="text-align: center">
              <table style="width: auto!important; margin: 0 auto">
                <tr class="">
                  <td></td>
                  <td><?php
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
                                            ?></td>
                  <td><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> অনুসন্ধান</button></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    
    <!-- Category Displayed -->
    <div class="row">
      <div class="col-md-12">
        <?php
                    /* উন্নয়নের পথে Data */
                    $spotlight = Post::model()->getPost(73, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 73));
                    }
                    ?>
      </div>
    </div>
    <!-- Category Displayed -->
    <div class="clearfix">&nbsp;</div>
    <div class="row">
      <div class="col-md-12">
        <?php $this->renderPartial('//site/subscribeForm'); ?>
      </div>
    </div>
    <!-- Category Displayed -->
    <div class="clearfix">&nbsp;</div>
    
    
      <div class="row">
      <div class="col-md-12">
        <?php
                    /* ফিচার Data */
                    $spotlight = Post::model()->getPost(214, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 214));
                    }
                    ?>
      </div>
    </div>
    
    
    <div>&nbsp;</div>
    
    <div class="row">
      <div class="col-md-12">
        <?php
                    /* ইতিহাসের পাতা  Data */
                    $spotlight = Post::model()->getPost(196, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 196));
                    }
                    ?>
      </div>
    </div>
    
    
    <div>&nbsp;</div>
    
    <div class="row">
      <div class="col-md-12">
        <?php
                    /* রাশিফল  Data */
                    $spotlight = Post::model()->getPost(197, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 197));
                    }
                    ?>
      </div>
    </div>
    
    
     <div>&nbsp;</div>
    
    <div class="row">
      <div class="col-md-12">
        <?php
                    /* আইন ও অপরাধ Data */
                    $spotlight = Post::model()->getPost(217, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 217));
                    }
                    ?>
      </div>
    </div>
    
     <div>&nbsp;</div>
    
    <div class="row">
      <div class="col-md-12">
        <?php
                    /* পর্যটন Data */
                    $spotlight = Post::model()->getPost(213, 7);
                    if (count($spotlight['result']) > 0) {
                        $this->renderPartial('layoutCol3', array('spotlight' => $spotlight, 'catId' => 213));
                    }
                    ?>
      </div>
    </div>
    
    
    
    
   
    
    
  </div>
  
  

    
    
    
  
  <div class="clearfix">&nbsp;</div>
  <?php /*
      <div class="row">
      <!-- slider html start -->
      <div class="col-md-12 margin-top">
      <h3 class="bg-info news-title-bg" style="margin-top: 0px">
      হাইলাইটস
      </h3>
      <?php

      $spotlight = Post::model()->getPost(195, 15);
      if (count($spotlight['result']) > 0) {
      echo '<ul class="bxslider"  style="margin-left: -40px; width:1100px">';
      foreach ($spotlight['result'] as $post):
      ?>
      <li><a href="<?= Post::model()->makeLink($post['id']) ?>"><img src="<?= Yii::app()->easycode->showImage($post['image'], 250, 180, false, true, false) ?>" title="<?= $post['title'] ?>" width="250" height="180"/></a></li>
      <?php
      endforeach;
      echo '</ul>';
      }
      ?>
      </div>
      <!-- slider html Exit -->
      </div>

     */ ?>
</div>
