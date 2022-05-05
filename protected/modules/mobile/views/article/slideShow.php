<?php $xi=0; if (count($data['image']) > 0): ?>
    <div class="post-bxslider"  style="width: 300px">
        <?php foreach ($data['image'] as $post):
            $xi++;
    if($xi==1){
        $this->ogImage = 'http://www.eibela.com/upload/'.$post['src'];
    }
            ?>
            <div><img rel="image_src" src="<?= Yii::app()->easycode->showImage($post['src'], 600, 350, false, true, false) ?>" title="<?= $post['title'] ?>" /></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
