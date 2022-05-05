<div class='container'>
    
	<?php
	foreach($model as $if):
	?>
	
	<div class="col-md-12" style="margin-bottom: 40px; ">
    <div class="row">
       
            <?= Yii::app()->easycode->showImage($if->image, 150, 100) ?>
       
        <br/>
            <h4><a href="<?= Post::model()->makeLink($if['id']) ?>"><strong><?= CHtml::encode($if['title']) ?></strong></a></h4>
            <?= Post::model()->getExcerpt($if->description, 0, 450); ?>
            <div class="clearfix">&nbsp;</div>
           <hr/>

    </div>
</div>

<?php
endforeach;
?>

</div>