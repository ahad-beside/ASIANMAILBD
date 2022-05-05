<?php $this->pageTitle = $data['categoryName']->name . ' | ' . Yii::app()->name; ?>
<div class="container">
    <?php if (isset($this->breadcrumbs) && count($this->breadcrumbs) > 0): ?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
             'homeLink'=>CHtml::link('প্রচ্ছদ', array('/site/index')),
            'links' => $this->breadcrumbs,
            'separator' => ' / ',
            'htmlOptions' => array('class' => 'breadcrumb', 'style' => 'margin-top:10px; background-color: #efefef;')
        ));
        ?><!-- breadcrumbs -->
    <?php else: ?>
        <div class="clearfix">&nbsp;</div>
    <?php endif; ?>
    <div class="col-md-8 no-padding">
        <?php
        $id = 15;
        $sql = "select t1.id, t1.title, t1.slug, t1.image, t1.description, t1.status from post t1 join post_categories t2 on t2.post_id=t1.id where t1.status='1' and t2.category_id='{$id}' order by t1.id DESC limit 21";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $index = 0;
        foreach ($rawData as $s):
            if ($index == 0) {
                ?>
                <div class="col-md-12" style="margin-bottom: 40px;">
                    <div class="col-md-8 category-view-img no-padding">
                        <?= Yii::app()->easycode->showImage($s['image'], 530, 300) ?>
                    </div>
                    <div class="col-md-4 short_note" style="padding-right: 10px; padding-top:5px;  min-height:278px">
                        <h7 style="font-size: 24px"><a href="<?= Post::model()->makeLink($s['id']) ?>"><strong><?= CHtml::encode($s['title']) ?></strong></a></h7><br/>
                        <div style="text-align:justify" > <?= Post::model()->getExcerpt($s['description'], 0, 1000); ?></div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: -25px; text-align: center">
                    <!-- G&R_Inside Content --> <script type="text/javascript"> (function (i, g, b, d, c) { i[g] = i[g] || function(){(i[g].q = i[g].q || []).push(arguments)}; var s = d.createElement(b); s.async = true; s.src = c; var x = d.getElementsByTagName(b)[0]; x.parentNode.insertBefore(s, x); })(window, 'gandrad', 'script', document, '//content.green-red.com/lib/display.js'); var site_id = 7341; var slot_id; var scripts = document.getElementsByTagName("script"); var thisScriptTag = scripts[ scripts.length - 1 ]; var container_width = thisScriptTag.parentNode.offsetWidth; if (container_width >= 970) slot_id = 21748; thisScriptTag.setAttribute("id", "GNR" + slot_id); gandrad({siteid:site_id, slot:slot_id});</script> <!-- End of G&R_Inside Content -->
                </div>
                <!--    <div class="clearfix">&nbsp;</div>-->
                <?php
                $index = 1;
            } else {
                ?>

                <div class="col-md-6">
                    <div><?= Yii::app()->easycode->showImage($s['image'], 400, 220) ?></div>
                    <h4 style="padding-top:2px"><a href="<?= Post::model()->makeLink($s['id']) ?>"><strong><?= CHtml::encode($s['title']) ?></strong></a></h4>
                    <?= Post::model()->getExcerpt($s['description'], 0, 450); ?>
                    <div>
                        <b><a href="<?= Post::model()->makeLink($s['id']) ?>" class="read_more" style="float: left">বিস্তারিত</a></b>
                    </div>
                    <div style="border-bottom: solid 1px #efefef; padding-bottom:10px">&nbsp;</div>
                </div>
                <?php
                $index = $index + 1;
            }
            ?>

            <?php
//if ($index>=2 && ($index % 2) == 0) 
            if ($index >= 2 && ($index % 2) != 0) {
                ?>
                <div class="clearfix">&nbsp;</div>
                <div class="clearfix">&nbsp;</div>
                <div class="clearfix">&nbsp;</div>
                <!--    <div class="clearfix" style='border-bottom: 2px solid #ccc;  padding: 10px 5px 0;'>&nbsp;</div>-->
                <?php
            }
        endforeach;
        ?>
    </div>
    <div class="col-md-4">
        <!-- FB like box -->
        <div class="row">

            <div class="col-md-12">
                <div class="fb-like-box" data-href="https://www.facebook.com/eibela" data-width="260" data-height="250" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="false"></div>
            </div>
        </div>
        <!-- FB like box -->

        <div class="clearfix">&nbsp;</div>

        <div class="col-md-12" style="text-align:center; border:solid 1px #ccc; padding: 10px">
            <!-- G&R_Right Side Of The Home Page --> <script type="text/javascript"> (function (i, g, b, d, c) { i[g] = i[g] || function(){(i[g].q = i[g].q || []).push(arguments)}; var s = d.createElement(b); s.async = true; s.src = c; var x = d.getElementsByTagName(b)[0]; x.parentNode.insertBefore(s, x); })(window, 'gandrad', 'script', document, '//content.green-red.com/lib/display.js'); var site_id = 7341; var slot_id; var scripts = document.getElementsByTagName("script"); var thisScriptTag = scripts[ scripts.length - 1 ]; var container_width = thisScriptTag.parentNode.offsetWidth; if (container_width >= 250) slot_id = 21699; thisScriptTag.setAttribute("id", "GNR" + slot_id); gandrad({siteid:site_id, slot:slot_id});</script> <!-- End of G&R_Right Side Of The Home Page -->
        </div>

        <div class="clearfix">&nbsp;</div>

        <div class="col-md-12 no-padding">
            <div class="bg-info news-title-bg">আরও খবর</div><br>
            
            <?php
            $getMostRead = Post::model()->getMostRead(25,15);
            if (count($getMostRead) > 0) {
                foreach ($getMostRead as $post):
                    ?>
                    <div class="media">
                        <?php $link = Post::model()->makeLink($post->id); ?>
                        <div class="media-left">
                            <a href="<?= $link ?>">
                                <img class="media-object" src="<?= Yii::app()->easycode->showImage($post->image, 70, 65, false, true, false) ?>" alt="<?= $post->title?>">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="<?= $link ?>"><?= $post->title?></a></h4>
                        </div>
                    </div>
                <?php
                endforeach;
            }
            ?>
        </div>

        <h4><a target="_blank" href="category/15">বিনোদন-এর সব খবর »</a></h4>

    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
</div>
