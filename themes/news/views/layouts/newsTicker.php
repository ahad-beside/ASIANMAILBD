<div class="news-ticker">
    
    <div class="">
    	<div class="title">
        	সর্বশেষ 
        </div>
        <div class="ticker-container">
        <ul id="demo">
            <?php
            $newsTicker = Post::model()->getRecentPost(10);
            foreach ($newsTicker as $latestNews):
                ?>
                <li><a href="<?= Post::model()->makeLink($latestNews->id) ?>"><?= $latestNews->title ?></a></li>
            <?php endforeach; ?>
        </ul>
        </div>
    </div>
</div>
