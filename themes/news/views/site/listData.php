<?php foreach ($spotlight['result'] as $post):?>
<div class="media">
<?php $link = Post::model()->makeLink($post['id']);?>
  <div class="media-left">
    <a href="<?= $link?>">
        <img class="media-object" src="<?= Yii::app()->easycode->showImage($post['image'], 70, 65, false, true, false) ?>" alt="<?= $post['title'] ?>">
    </a>
  </div>
  <div class="media-body">
      <h4 class="media-heading"><a href="<?= $link?>"><?= $post['title'] ?></a></h4>
  </div>
</div>
<?php endforeach;?>
