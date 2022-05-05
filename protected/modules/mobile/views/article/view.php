<?php
$actual_link = "http://$_SERVER[HTTP_HOST]" . str_replace('/mobile', '', $_SERVER[REQUEST_URI]);
$this->pageTitle = $model->title;
$this->pageDescription = Post::model()->getExcerpt(trim((strip_tags($model->description))), 0, 450);
if ($model->keyword != '')
    $this->pageKeyword = $model->keyword;
$this->ogUrl = $actual_link;
$this->ogTitle = $model->title;
$this->ogDescription = $this->pageDescription;


// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://tinyurl.com/api-create.php?url='.$actual_link,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$actual_tinylink = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
?>


<div class="container">
    <div class="row margin-top">
        <div class="col-md-12 post-view">
            <div class="col-md-12 row">                
                <div class="clearfix">&nbsp;</div>
                <?= Advertisement::model()->getAdvertisement('M Article Page F1', 1)?>
                <div class="clearfix">&nbsp;</div>


                <?php if (trim($model->sub_title) != '') { ?><div class="page-sub-title col-md-12"><strong><?= $model->sub_title ?></strong></div><?php } ?>
                <div class="page-title col-md-12"><strong><?= $model->title ?></strong></div>

                <div class="col-md-12 atricle_category" style="text-align: center">
                    <?php
                    foreach ($data['category'] as $cat):
                        if ((int) $cat > 0) {
                            echo "<span class='btn btn-xs btn-default'><a href='" . Category::model()->makemobileLink($cat) . "'>" . Category::model()->findByPk($cat)->name . "</a></span>";
                        }
                    endforeach;
                    ?>   
                </div>

            </div>

            <div class="clearfix">&nbsp;</div>

            <?php if (count($data['category']) > 0 && in_array(207, $data['category'])): ?>
                <iframe width="100%" height="315" src="<?= trim($model->description) ?>" frameborder="0" allowfullscreen></iframe>
            <?php else: ?>
                <div class="col-md-12 row">
                    <div class="post-details">
                        <img src="<?= Yii::app()->easycode->showImage($model['image'], 300, 170, false, true, false) ?>" title="<?= $model['title'] ?>" class='img-widthl'/>
                        <div class="clearfix">&nbsp;</div>

                        <p><?php echo $model->description ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <div><strong>প্রকাশ:</strong> <?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($model->entry_time))) ?><br> <strong>হালনাগাদ:</strong> <?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($model->update_time))) ?></div>

            <div class="clearfix">&nbsp;</div>
            <div>
                <div class="fb-like" data-href="https://www.facebook.com/eibela/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                <div class="fb-share-button" data-href="<?= $actual_link ?>" data-layout="button_count"></div>
                <a class="btn btn-xs btn-success" href="whatsapp://send?text=<?= $model->title.'%0A'.$actual_tinylink ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"> WhatsApp</i></a>
                <div class="fb-send" data-href="<?= $actual_link ?>"></div>
                <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="<?= $actual_link ?>" data-text="<?= CHtml::encode($model->title) ?>" data-hashtags="eibela">Tweet</a>
                <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + '://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'twitter-wjs');</script>
                <div class="g-plus" data-action="share" data-annotation="bubble" data-height="20" data-href="<?= $actual_link ?>"></div>
                <!-- Place this tag after the last share tag. -->
                <script type="text/javascript">
                    (function () {
                        var po = document.createElement('script');
                        po.type = 'text/javascript';
                        po.async = true;
                        po.src = 'https://apis.google.com/js/platform.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(po, s);
                    })();
                </script>
            </div>
            <div class="clearfix">&nbsp;</div>
            <!-- FB like box -->
            <div class="clearfix">&nbsp;</div>
            <div class="fb-like-box" data-href="https://www.facebook.com/eibela" data-width="310" data-height="250" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="false"></div>
            <div class="clearfix">&nbsp;</div>
            <!-- FB like box -->

            <div class="col-md-12 row margin-top">
                <div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div>
                <div class="">
                    <div class="fb-comments" data-href="<?= $actual_link ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-12">
        <?php //$this->renderPartial('_gridRelated',array('data'=>$data)) ?>
         </div>-->

        
        <div class="clearfix">&nbsp;</div>
        <?= Advertisement::model()->getAdvertisement('M Article Page F2', 2)?>
        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12">
            <div class="page-title">আরও খবর</div><br>
            <?php
            $similarPost = Post::model()->getSimilarCategoryPost($model->id, 20);
            if (count($similarPost) > 0) {
                foreach ($similarPost as $post):
                    ?>
                    <div class="listed">
                        <?php $link = Post::model()->makemobileLink($post['id']); ?>
                        <div class="media-lefts">
                            <a href="<?= $link ?>">
                                <img class="media-object" src="<?= Yii::app()->easycode->showImage($post['image'], 70, 65, false, true, false) ?>" alt="<?= $post['title'] ?>">
                            </a>
                        </div>
                        <div class="media-bodys">
                            <h4 class="media-heading"><a href="<?= $link ?>"><?= $post['title'] ?></a></h4>
                            <div class="datetimes"><?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($post['update_time']))) ?></div>
                        </div>
                    </div>
                    <?php
                endforeach;
            }
            ?>
        </div>

    </div>
</div>

