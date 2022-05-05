<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>User</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('create'), array('class' => 'btn btn-default btn-circle', 'title' => 'New User'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('index'), array('class' => 'btn btn-default btn-circle', 'title' => 'All User'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update User
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php //$this->renderPartial($data['viewFile'], array('model' => $model,'data'=>$data)); 
                        $this->renderPartial('em_update_form', array('model' => $model,'data'=>$data));
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>