<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$this->pageTitle = 'ভোটিং সিস্টেম';
$this->pageDescription = 'ভোটিং সিস্টেম';
$this->pageKeyword = 'ভোটিং সিস্টেম';
$this->ogUrl = $actual_link;
$this->ogTitle = $this->pageTitle;
$this->ogDescription = $this->pageDescription;
?>

<div class="container">
    <div class="row margin-top">
        <div class="col-md-8 post-view">

            <div class="row">
                <div class="col-md-12"><h2 class="job-title">ভোটের ইতিহাস</h2></div>

                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'poll-grid',
                        'htmlOptions' => array('class' => 'table-responsive'),
                        'itemsCssClass' => 'table table-hover',
                        'dataProvider' => $model->search(),
                        'summaryText'=>'',
                        'columns' => array(
                            array(
                                'class' => 'IndexColumn',
                                'header' => '',
                                'headerHtmlOptions' => array('style' => 'width:20px;'),
                            ),
                            array(
                                'name' => 'title',
                                'header' => '',
                                'type' => 'html',
                                'value' => 'CHtml::link($data->title,Yii::app()->createUrl("//poll/viewResult",array("id"=>$data->id,"name"=>Yii::app()->easycode->seoUrl($data->title))))',
                            ),
                            array(
                                'name' => 'update_time',
                                'header' => '',
                                'value' => 'date(\'d M, Y\', strtotime(($data->update_time == Null) ? $data->entry_time : $data->update_time))',
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
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


            <div class="col-md-12" style="text-align:center; border:solid 1px #ccc; padding: 10px">
                <!-- G&R_Right Side Of The Home Page --> <script type="text/javascript"> (function (i, g, b, d, c) { i[g] = i[g] || function(){(i[g].q = i[g].q || []).push(arguments)}; var s = d.createElement(b); s.async = true; s.src = c; var x = d.getElementsByTagName(b)[0]; x.parentNode.insertBefore(s, x); })(window, 'gandrad', 'script', document, '//content.green-red.com/lib/display.js'); var site_id = 7341; var slot_id; var scripts = document.getElementsByTagName("script"); var thisScriptTag = scripts[ scripts.length - 1 ]; var container_width = thisScriptTag.parentNode.offsetWidth; if (container_width >= 250) slot_id = 21699; thisScriptTag.setAttribute("id", "GNR" + slot_id); gandrad({siteid:site_id, slot:slot_id});</script> <!-- End of G&R_Right Side Of The Home Page -->
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
                                            <li><div><i class='fa fa-circle gray-f-color'></i></div> <a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>"><?= $post->title ?></a></li>
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
                                            <li><div><i class='fa fa-circle gray-f-color'></i></div> <a class="font-14" href="<?= Post::model()->makeLink($post->id) ?>"><?= $post->title ?></a></li>
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