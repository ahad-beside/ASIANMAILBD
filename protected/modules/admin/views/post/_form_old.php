<?php
/* @var $this ManufacturerController */
/* @var $model Manufacturer */
/* @var $form CActiveForm */
?>

<?php
$this->widget('ext.kindeditor.KindEditorWidget', array(
    'id' => 'Post_description', //Textarea id
    // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
    'items' => array(
        'langType' => 'en',
        'width' => '100%',
        'height' => '300px',
        'themeType' => 'simple',
        'allowImageUpload' => true,
        'allowFileManager' => true,
        'items' => array(
            'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
            'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
            'emoticons', 'image', 'media', 'link',),
    ),
));
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'page-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo Yii::app()->easycode->showNotification(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" class="tab" href="#general">General</a></li>
        <li class=""><a data-toggle="tab" class="tab" href="#images">Images</a></li>
    </ul>
    <div class="tab-content">
        <div id="general" class="tab-pane fade active in">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'title'); ?>
                <?php echo $form->textField($model, 'title', array('size' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'title'); ?>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'slug'); ?>
                <?php echo $form->textField($model, 'slug', array('size' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'slug'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'description'); ?>
                <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'description'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'short_description'); ?>
                <?php echo $form->textArea($model, 'short_description', array('rows' => 2, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'short_description'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'image'); ?>
                <?php echo $form->fileField($model, 'image', array('class' => '')); ?>

                <?php echo Yii::app()->easycode->showImage($model->image, 120, 100); ?>
                <?php echo $form->error($model, 'image'); ?>
            </div>
            
            <div class="form-group">
                <?php echo CHtml::label('Categories', 'categories'); ?>
                <?php echo CHtml::dropDownList('categories[]', $data['selectedCategories'], Category::model()->dropDown(), array('class' => 'form-control chosen-select', 'multiple' => 'multiple', 'empty' => 'Select Any')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'keyword'); ?>
                <?php echo $form->textField($model, 'keyword', array('size' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'keyword'); ?>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'featured'); ?>
                <?php echo $form->dropdownList($model, 'featured', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'featured'); ?>
            </div>
			
			<div class="form-group">
                <?php echo $form->labelEx($model, 'headline'); ?>
                <?php echo $form->dropdownList($model, 'headline', array('' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'headline'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'status'); ?>
                <?php echo $form->dropdownList($model, 'status', Yii::app()->easycode->getStatusOptions(), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'status'); ?>
            </div>
        </div>
        <div id="images" class="tab-pane fade">
            <div class="clearfix">&nbsp;</div>

            <h4>Slider Items</h4>
            <table class="table table-bordered table-striped items-rows">
                <tbody>
                    <?php
                    if (!$model->isNewRecord) {
                        $postImages = PostImages::model()->findAll('post_id=:id', array(':id' => $model->id));
                        if (count($postImages) > 0) {
                            foreach ($postImages as $row):
                                ?>
                                <tr class="clone">
                                    <td>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($modelPostImg, 'title'); ?>
                                            <?php echo $form->textField($modelPostImg, 'title[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'value' => $row->title)); ?>
            <?php echo $form->hiddenField($modelPostImg, 'id[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'value' => $row->id)); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($modelPostImg, 'image'); ?>
                                            <?php echo $form->fileField($modelPostImg, 'image[]'); ?>
            <?php echo Yii::app()->easycode->showImage($row->image, 120, 100); ?>
                                        </div>
                                    </td>
                                    
                                    <td style="vertical-align: middle">
                                        <div title="Delete" class="btn btn-danger del-row" style="display:none" onclick="delItems(<?php echo $row->id ?>, $(this));"><i class="fa fa-minus"></i></div>
                                    </td>
                                </tr>
                            <?php endforeach;
                        }else {
                            ?>
                            <tr class="clone">
                                <td>
                                    <div class="form-group">
        <?php echo $form->labelEx($modelPostImg, 'title'); ?>
        <?php echo $form->textField($modelPostImg, 'title[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
        <?php echo $form->labelEx($modelPostImg, 'image'); ?>
        <?php echo $form->fileField($modelPostImg, 'image[]'); ?>
                                    </div>
                                </td>
                                <td style="vertical-align: middle">
                                    <div title="Delete" class="btn btn-danger del-row" style="display:none" onclick="$(this).parent().parent().remove();
                                            drawNavigation();"><i class="fa fa-minus"></i></div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr class="clone">
                            <td>
                                <div class="form-group">
    <?php echo $form->labelEx($modelPostImg, 'title'); ?>
    <?php echo $form->textField($modelPostImg, 'title[]', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
    <?php echo $form->labelEx($modelPostImg, 'image'); ?>
    <?php echo $form->fileField($modelPostImg, 'image[]'); ?>
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
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>

    <div class="form-group buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->


<div class="row clone-img-row" style="display: none">
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="PostImages_image">Image <span class="required">*</span></label>                             <input type="hidden" name="PostImages[image]" value="" id="ytPostImages_image"><input type="file" id="PostImages_image" name="PostImages[image]" class="">                    
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="PostImages_title">Title <span class="required">*</span></label>                            <input type="text" maxlength="200" id="PostImages_title" name="PostImages[title]" class="form-control" size="50">                    
        </div>
    </div>
</div>


<script type="text/javascript">
    
    $('#Post_title').keyup(function(e){
        e.preventDefault();
        $('#Post_slug').val(convertToSlug($(this).val()));
    })
    
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

    function delItems(id, $this) {
        //var clickrow = $(this);
        if (id !== '' && confirm('Are you sure to permanent delete?')) {
            $.post('<?php echo Yii::app()->createUrl('//admin/page/delPostImages'); ?>', {id: id}, function (data) {
                if (data == '1') {
                    $this.parent().parent().remove();
                    drawNavigation();
                }
            });
        } else if (id == '') {
            $this.parent().parent().remove();
        }
    }

    drawNavigation();
</script>