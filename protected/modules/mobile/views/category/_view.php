<div class="body-cont-grid">
    <div class="grid-top">
        <a href="<?= Post::model()->makemobileLink($data['id']) ?>"><h2><?= $data['title'] ?></h2></a>

        <div class="clearfix"></div>
    </div>
    <div class="grid-bottom">
            <a href="<?= Post::model()->makemobileLink($post['id']) ?>"><img src="<?= Yii::app()->easycode->showImage($data['image'], 300, 170, false, true, false) ?>" title="<?= $data['title'] ?>" class='img-widthl'/></a>
    </div>
</div>