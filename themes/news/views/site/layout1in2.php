<div class="col-sm-6">
    <div class="future">
        <div class="stores-heading"><span><a href="<?= Category::model()->makeLink($catId)?>"><?= $spotlight['categoryName'] ?></a></span></div>
        <?php
        $i = 0;
        foreach ($spotlight['result'] as $post): $i++;
            if ($i == 1) {
                ?>
                <div class="future-img"><a href="<?= $link = Post::model()->makeLink($post['id']) ?>"><?= Yii::app()->easycode->showImage($post['image'], 213, 135, true, true, false) ?></a></div> 
                <div class="future-title">
                    <a href="<?= $link ?>"><h4><?= $post['title'] ?></h4></a>
                </div>
                <div class="future-descriptor">
                    <p><?= $post['short_description'] ?></p><hr/>
                </div>  
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="stores-link politcis">
                    <ul><?php } else { ?>
                        <li><a href="<?= Post::model()->makeLink($post['id']) ?>"><?= $post['title'] ?></a></li>
                    <?php } endforeach; ?></ul>  
        </div>
    </div>
</div>