<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Photo Gallary</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('slideshow/createCategorySlide'), array('class' => 'btn btn-default btn-circle', 'title' => 'New'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('slideshow/adminCategorySlide'), array('class' => 'btn btn-default btn-circle', 'title' => 'All'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Gallary
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $this->renderPartial('_formCategorySlide', array('model' => $model,'modelItems'=>$modelItems)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>