<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'image-slider-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo Yii::app()->easycode->showNotification(); ?>

    <table class="table table-striped">
        <tr>
            <td>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'description'); ?>
                    <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'description'); ?>
                </div>
            </td>
            <td style="display: none">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'type'); ?>
                    <?php echo $form->hiddenField($model, 'type', array('class' => 'form-control','value'=>'image')); ?>
                    <?php echo $form->error($model, 'type'); ?>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'status'); ?>
                    <?php echo $form->dropDownList($model, 'status', array('1' => 'Enable', '0' => 'Disable'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'status'); ?>
                </div>
            </td>
        </tr>
    </table>

    <h4>Slider Items</h4>
    <table class="table table-bordered table-striped items-rows">
        <tbody>
            <?php
            if (!$model->isNewRecord) {
                $savedItems = SlideshowItems::model()->findAll('slideshow_id=:id', array(':id' => $model->id));
                if (count($savedItems) > 0) {
                    foreach($savedItems as $row):
                    ?>
                    <tr class="clone">
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'title'); ?>
                                <?php echo $form->textField($modelItems, 'title[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'value'=>$row->title)); ?>
                                <?php echo $form->hiddenField($modelItems, 'id[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'value'=>$row->id)); ?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'tag_line'); ?>
                                <?php echo $form->textField($modelItems, 'tag_line[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'value'=>$row->tag_line)); ?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'image'); ?>
                                <?php echo $form->fileField($modelItems, 'image[]'); ?>
                                <?php echo Yii::app()->easycode->showImage($row->image, 120, 100);?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'link'); ?>
                                <?php echo $form->textField($modelItems, 'link[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'value'=>$row->link)); ?>
                            </div>
                        </td>
                        <td style="vertical-align: middle">
                            <div title="Delete" class="btn btn-danger del-row" style="display:none" onclick="delItems(<?php echo $row->id?>,$(this));"><i class="fa fa-minus"></i></div>
                        </td>
                    </tr>
                <?php endforeach; } else { ?>
                    <tr class="clone">
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'title'); ?>
                                <?php echo $form->textField($modelItems, 'title[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'tag_line'); ?>
                                <?php echo $form->textField($modelItems, 'tag_line[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'image'); ?>
                                <?php echo $form->fileField($modelItems, 'image[]'); ?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $form->labelEx($modelItems, 'link'); ?>
                                <?php echo $form->textField($modelItems, 'link[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                            </div>
                        </td>
                        <td style="vertical-align: middle">
                            <div title="Delete" class="btn btn-danger del-row" style="display:none" onclick="$(this).parent().parent().remove();
                                            drawNavigation();"><i class="fa fa-minus"></i></div>
                        </td>
                    </tr>
                <?php }
            } else {
                ?>
                <tr class="clone">
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($modelItems, 'title'); ?>
    <?php echo $form->textField($modelItems, 'title[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($modelItems, 'tag_line'); ?>
    <?php echo $form->textField($modelItems, 'tag_line[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($modelItems, 'image'); ?>
    <?php echo $form->fileField($modelItems, 'image[]'); ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($modelItems, 'link'); ?>
    <?php echo $form->textField($modelItems, 'link[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        </div>
                    </td>
                    <td style="vertical-align: middle">
                        <div title="Delete" class="btn btn-danger del-row" style="display:none" onclick="$(this).parent().parent().remove();
                                    drawNavigation();"><i class="fa fa-minus"></i></div>
                    </td>
                </tr>
<?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td><div title="Add More Items" id="addMoreItem" class="btn btn-primary"><i class="fa fa-plus"></i></div></td>
            </tr>
        </tfoot>
    </table>


    <div class="form-group buttons" style="">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    function drawNavigation() {
        var numAddresses = $(".items-rows .clone").length;
        if (numAddresses > 1) {
            $(".clone div.del-row").show();
        }
        else {
            $(".clone div.del-row").hide();
        }
    }

    $('#addMoreItem').click(function () {
        var row = $('.items-rows tr:first').clone();
        row.find('[type=text]').val('');
        row.find('[type=hidden]').val('');
        row.find('[type=file]').val('');
        row.find('img').remove();
        $('.items-rows').append(row);
        drawNavigation();
    });
    
    function delItems(id,$this){
        //var clickrow = $(this);
        if(id!=='' && confirm('Are you sure to permanent delete?')){
            $.post('<?php echo Yii::app()->createUrl('//admin/slideshow/delSlideshowItem');?>',{id : id},function(data){
                if(data=='1'){
                    $this.parent().parent().remove();
                    drawNavigation();
                }
            });
        }else if(id==''){
            $this.parent().parent().remove();
        }
    }

drawNavigation();
</script>