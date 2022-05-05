<?php $this->ogImage = 'http://www.coder71.com/asianmailbd/upload/'.$data['image'][0]['src'];?>
<div class="col-md-12 no-padding" style="text-align: center">
    <img rel="image_src" src="<?= Yii::app()->easycode->showOriginalImage($data['image'][0]['src']) ?>" title="<?= $data['image'][0]['title'] ?>" class="img-responsive" style="display: inline!important" />
</div>
<div class="clearfix">&nbsp;</div>

<?php /*$xi=0; if (count($data['image']) > 0): ?>

    <div class="post-bxslider"  style="width: 300px">
        <?php foreach ($data['image'] as $post):
            $xi++;
    if($xi==1){
        $this->ogImage = 'http://www.asianmailbd.com/upload/'.$post['src'];
    }
            ?>
            <div><img rel="image_src" src="<?= Yii::app()->easycode->showImage($post['src'], 600, 350, false, true, false) ?>" title="<?= $post['title'] ?>" /></div>
        <?php endforeach; ?>
    </div>
<?php endif; */?>
