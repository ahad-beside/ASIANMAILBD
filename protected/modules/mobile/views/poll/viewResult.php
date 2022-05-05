<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$this->pageTitle = 'Vote Result - ' . $data['poll']->title;
$this->pageDescription = Post::model()->getExcerpt(trim((strip_tags($model->description))), 0, 450);
if ($model->keyword != '')
    $this->pageKeyword = $model->keyword;
$this->ogUrl = $actual_link;
$this->ogTitle = $data['poll']->title;
$this->ogDescription = $this->pageDescription;
?>

<div class="container">
    <div class="row margin-top">
        <div class="col-md-12 post-view">
            <div class="col-md-12 row">
                <div class="clearfix">&nbsp;</div>
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
                                <?php
                                foreach ($data['pollOptions'] as $opt):
                                    if ($opt->vote != Null)
                                        $percentage = number_format(($opt->vote / $data['totalVote']->vote) * 100);
                                    else
                                        $percentage = 0;
                                    ?>
                                    <tr>
                                        <td><?= $opt->option ?></td>
                                        <td style="text-align: right"><?= $percentage ?>%</td>
                                        <td><div class="progress"> <div style="width:<?= $percentage ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?= $percentage ?>" role="progressbar" class="progress-bar progress-bar-info progress-bar-striped"> <span class="sr-only"><?= $percentage ?>% Complete</span> </div> </div></td>
                                        <td style="text-align: right"><?= (int) $opt->vote ?></td>
                                    </tr>
<?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr style="background-color:#efefef">
                                    <td colspan="4" style="text-align: right"><strong>সর্বমোট ভোট: </strong><?= (int) $data['totalVote']->vote ?></td>
                                </tr>
                            </tfoot>
                        </table>
                        <p>ভোট শুরু: <?= Yii::app()->easycode->ShowBanglaDate(date('l, d, F, Y', strtotime(($data['poll']->update_time == Null) ? $data['poll']->entry_time : $data['poll']->update_time))) ?></p>
                        <div class="clearfix">&nbsp;</div>

                        <div class="alert alert-warning">
                            <strong><i class="fa fa-exclamation-triangle"></i> Terms and Conditions</strong>
                            <p>This poll-generated data is posted for purposes of stimulating discussions within the eibela.com community only. Any reproduction of this data in any form must be pre-approved in writing by authorized professionals at eibela.com</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>