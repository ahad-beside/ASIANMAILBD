
<div class="category red">

    <h2><span><a href="<?= Category::model()->makemobileLink($catId) ?>"><?= $spotlight['categoryName'] ?></a></span>
    </h2>    
    <?php
    $i = 0;
    foreach ($spotlight['result'] as $post): $i++;
        if ($i == 1) {
            ?>
            <div class="catimg"><a href="<?= $link = Post::model()->makemobileLink($post['id']) ?>"><?= Yii::app()->easycode->showImage($post['image'], 300, 170, true, true, false) ?></a></div> 
            <div class="grid-top">
                <a href="<?= $link ?>"><h4><strong><?= $post['title'] ?></strong></h4></a>
                <div class='datetimes'><?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($post['update_time']))) ?></div>
                <div class="clearfix"></div>
            </div>

            <?php
            echo '<div class="older-articles"><ul>';
        } else {
            ?>
            <li class='more_link row'>
                <div class='borderbtm'>
                    <div class='arttile'><a href='<?= Post::model()->makemobileLink($post['id']) ?>'><?= $post['title'] ?></a></div>			
                    <div class='datetimes'><?= Yii::app()->easycode->ShowBanglaDate(date("h:i A d-m-Y", strtotime($post['update_time']))) ?></div>
                </div>
            </li>
            <?php
        } endforeach;
    ?></ul>


<div class="col-md-12">
    <div class="col-md-12 allnews" style="text-align:right;">
        <a href="<?= Category::model()->makemobileLink($catId) ?>"><?= $spotlight['categoryName'] ?> এর সব খবর >></a>
    </div>
</div>

</div>

