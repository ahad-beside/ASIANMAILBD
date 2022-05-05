<div class="row">
    <div class="col-md-12">
        <p class="bg-info news-title-bg"><a href="<?= Category::model()->makeLink($catId)?>"><?= $data['categoryName']?></a></p>
    </div>
    
    <div class="col-md-7">
        <?php $i=0; foreach ($data['result'] as $info): $i++;?>
            <div class="media col-md-6">
                <div class="media-left">
                    <a href="<?= $link = Post::model()->makeLink($info['id']) ?>">
                        <img alt="<?= $info['title'] ?>" class="media-object" style="width: 64px; height: 64px;" src="<?= Yii::app()->easycode->showImage($info['image'], 64, 64, false, true, false) ?>" data-holder-rendered="true">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading" id="media-heading"><a href="<?= $link ?>"><strong><?= $info['title'] ?></strong></a></h4>
                    <?= Post::model()->getExcerpt($info['description'], 0, 450); ?> <a href="<?= $link ?>"><strong>বিস্তারিত...</strong></a>
                </div>
            </div>
        <?php
            if($i==2){
                echo '<div class="clearfix">&nbsp;</div>';
            }
        ?>
        <?php endforeach; ?>
    </div>

    <div class="col-md-5">
        <?php
        $subcat = Category::model()->findAll('parent=:id',array(':id'=>$catId));
        if(count($subcat)>0):
        ?>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <?php $i =0; foreach($subcat as $cats): $i++;?>
                <li role="presentation" class="<?= ($i==1)?'active':''?>"><a href="#<?= trim($cats->name).$cats->id?>" aria-controls="home" role="tab" data-toggle="tab"><?= $cats->name?></a></li>
                <?php endforeach;?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="padding: 10px 0px">
                <?php $i =0; foreach($subcat as $cats): $i++;?>
                <div role="tabpanel" class="tab-pane tab-group <?= ($i==1)?'active':''?>" id="<?= trim($cats->name).$cats->id?>">
                    <?php
                    //echo $cats->id;
                    $spotlight = Post::model()->getPost($cats->id, 7);
                    if(count($spotlight['result'])>0){
                        $i=0;
                        foreach ($spotlight['result'] as $info):
                            $i++;
                            ?>
                    <?php if($i==1):?>
                    <div class="media">
                        <div class="media-left">
                            <a href="<?= $link = Post::model()->makeLink($info['id']) ?>">
                                <img alt="<?= $info['title'] ?>" class="media-object" style="width: 64px; height: 64px;" src="<?= Yii::app()->easycode->showImage($info['image'], 64, 64, false, true, false) ?>" data-holder-rendered="true">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading" id="media-heading"><a href="<?= $link ?>"><?= $info['title'] ?></a></h4>
                            <?= Post::model()->getExcerpt($info['description'], 0, 450); ?> <a href="<?= $link ?>"><strong>বিস্তারিত...</strong></a>
                        </div>
                    </div>
                    <?php else:?>
                        <div class="more_link"><a href="<?= $link ?>"><?= $info['title'] ?></a></div>
                        <?php endif;?>
                    <?php
                        endforeach;
                    }
                    ?>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>