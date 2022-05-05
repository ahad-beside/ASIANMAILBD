<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$this->pageTitle = 'Vote Result - '.$data['poll']->title;
$this->pageDescription = Post::model()->getExcerpt(trim((strip_tags($model->description))), 0, 450);
if ($model->keyword != '')
    $this->pageKeyword = $model->keyword;
$this->ogUrl = $actual_link;
$this->ogTitle = $data['poll']->title;
$this->ogDescription = $this->pageDescription;
?>

<div class="container">
    <div class="row margin-top">
        <div class="col-md-8 post-view">

        

        <div class="row">
            <div class="col-md-12"><h2 class="job-title">অনলাইন ভোট</h2></div>

            <div class="col-md-12">
                <p><strong><?= $data['poll']->title ?></strong></p>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>ভোটিং অপশন</th>
                            <th></th>
                            <th style="width: 30%"></th>
                            <th style="text-align: right">ভোট</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['pollOptions'] as $opt): 
                            if($opt->vote!=Null)
                                $percentage = number_format(($opt->vote / $data['totalVote']->vote) * 100);
                            else
                                $percentage=0;
                            ?>
                            <tr>
                                <td><?= $opt->option?></td>
                                <td style="text-align: right"><?= $percentage?>%</td>
                                <td><div class="progress"> <div style="width:<?= $percentage?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?= $percentage?>" role="progressbar" class="progress-bar progress-bar-info progress-bar-striped"> <span class="sr-only"><?= $percentage?>% Complete</span> </div> </div></td>
                                <td style="text-align: right"><?= (int) $opt->vote ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr style="background-color:#efefef">
                            <td colspan="4" style="text-align: right"><strong>সর্বমোট ভোট: </strong><?= (int)$data['totalVote']->vote ?></td>
                        </tr>
                    </tfoot>
                </table>
                <p>ভোট শুরু: <?= Yii::app()->easycode->ShowBanglaDate(date('l, d, F, Y', strtotime(($data['poll']->update_time == Null) ? $data['poll']->entry_time : $data['poll']->update_time))) ?></p>
                <div class="clearfix">&nbsp;</div>

                <div class="alert alert-warning">
                    <strong><i class="fa fa-exclamation-triangle"></i> Terms and Conditions</strong>
                    <p>This poll-generated data is posted for purposes of stimulating discussions within the asianmailbd.com community only. Any reproduction of this data in any form must be pre-approved in writing by authorized professionals at asianmailbd.com</p>
                </div>

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
                                    $getMostRead = Post::model()->getMostRead(25,$categoryId);
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