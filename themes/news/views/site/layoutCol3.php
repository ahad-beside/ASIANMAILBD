<div class="col-md-12">
    <div class="row">
    	<div class="widget-title">
    	<h3 class="bg-info news-title-bg row"><a href="<?= Category::model()->makeLink($catId) ?>"><?= $spotlight['categoryName'] ?></a></h3>
    </div>
    </div>
    <?php
    $i = 0;
    foreach ($spotlight['result'] as $post): $i++;
        if ($i == 1) {
            ?>
            <div class="row imagecontent"><a href="<?= $link = Post::model()->makeLink($post['id']) ?>"><?= Yii::app()->easycode->showImage($post['image'], 275, 175, true, true, false) ?></a></div> 
            <div class="contentdesign">
            <div class="row">
                <a href="<?= $link ?>"><h4><strong><?= $post['title'] ?></strong></h4></a>
            </div>
            <div class="row">
                <div class="postdtls"><p><?= Post::model()->getExcerpt($post['description'], 0, 450); //$post['short_description'] ?>
               </p>
			</div>
            </div>
            </div>
            <?php
			
        } else {
			if(count($spotlight['result'])>1 && $i==2)
				echo "<ul class='arrowlist'>";
			?>
           <li><a href="<?php echo Post::model()->makeLink($post['id'])?>"><?php echo $post['title']?></a></li>
        <?php 
		if(count($spotlight['result'])>1 && $i==count($spotlight['result']))
				echo "</ul>";
		} endforeach;
    ?>
</div>
<div class="col-md-12">
    <div class="col-md-12 allnews">
        <a href="<?= Category::model()->makeLink($catId) ?>"><?= $spotlight['categoryName'] ?> এর সব খবর >></a>
    </div>
</div>