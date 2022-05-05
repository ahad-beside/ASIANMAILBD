<!-- English section -->
                    <?php
                    $english = Yii::app()->dbeng->createCommand()
                            ->select('*')
                            ->from('post')
                            ->where('status=:sta', array(':sta' => 1))
                            ->order('update_time desc')
                            ->queryAll();
                    ?>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="bg-info news-title-bg" style="margin-top: 0px"><a href="http://www.coder71.com/asianmailbd/english">Eibela English</a></h3>
<?php
/* english Data */
foreach ($english as $eng):
    ?>
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading"><a href="http://www.coder71.com/asianmailbd/english/article/<?= $eng['slug'] ?>"><?= $eng['title'] ?></a></h4>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>

            <!-- end of english section -->