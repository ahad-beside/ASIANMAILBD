<?php
/* @var $this DealController */
/* @var $model Deal */
/* @var $form CActiveForm */
?>

<div class="form col-md-12">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'deal-items-form',
        'action' => $_SERVER['REQUEST_URI'],
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <table class="table table-striped">
        <tr>
            <td style="width: 20%">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </div>
            </td>
            <td style="width: 20%">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'position'); ?>
                    <?php echo $form->dropDownList($model, 'position', array('Top' => 'Top', 'Bottom' => 'Bottom', 'Mobile' => 'Mobile'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'position'); ?>
                </div>
            </td>
            <td style="width: 20%">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'type'); ?>
                    <?php echo $form->dropDownList($model, 'type', array('category' => 'Category','page' => 'Page' , 'custom' => 'Custom'), array('class' => 'form-control', 'onChange' => 'showParticular($(this).val());')); ?>
                    <?php echo $form->error($model, 'type'); ?>
                </div>
            </td>
            <td style="width: 20%">
                <div class="form-group category_box">
                    <label for="category">Category</label><br>
                    <?php echo CHtml::dropDownList('category', $model->additional_id, Category::model()->dropDown(), array('class' => 'form-control chosen-select')); ?>
                </div>
                <div class="form-group page_box" style="display: none;">
                    <label for="page">Product</label><br>
                    <?php echo CHtml::dropDownList('page', $model->additional_id, Page::model()->dropDown(), array('class' => 'form-control chosen-select')); ?>
                </div>
                
                <div class="form-group custom_box" style="display: none;">
                    <label for="page">Custom</label><br>
                    <?php echo CHtml::textField('custom', $model->additional_id, array('class' => 'form-control')); ?>
                </div>
                
                <div class="form-group">
                    <?php echo $form->hiddenField($model, 'additional_id', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'additional_id'); ?>
                </div>

            </td>
            <td style="vertical-align: middle; width: 20%">
                
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'sort_order'); ?>
                    <?php echo $form->textField($model, 'sort_order', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'sort_order'); ?>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'status'); ?>
                    <?php echo $form->dropDownList($model, 'status', array('1'=>'Enable','0'=>'Disable'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'status'); ?>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="DealItems">Parent</label><br>
                    <?php echo $form->dropDownList($model, 'parent', Menu::model()->dropDown(), array('class' => 'form-control chosen-select','empty'=>'Choose One')); ?>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="DealItems">Heading</label><br>
                    <?php echo $form->radioButtonList($model, 'heading', array('heading'=>'Heading', 'new-heading'=>'New Heading', 'menu-item'=>'Menu Item'), array('class' => '')); ?>
                </div>
                
            </td>
            <td style="vertical-align: middle; width: 5%">
                <div class="form-group">
                    <label for="DealItems">Quick Menu</label><br>
                    <?php echo $form->checkBox($model, 'quick_menu', array('class' => '')); ?>
                </div>
                <div>
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
                </div>
            </td>
        </tr>
    </table>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    function showParticular(val) {
        if (val == 'page') {
            $('.custom_box').hide();
            $('.page_box').show();
            $('#page_chosen').css('width', '100%');
            $('.category_box').hide();
            
            setAdditionalVal($('.page_box').find('select option:first').val());
        } 
        else if (val == 'category') {
            $('.custom_box').hide();
            $('.page_box').hide();
            $('.category_box').show();
            $('#category_chosen').css('width', '100%');
            setAdditionalVal($('.category_box').find('select option:first').val());
        }else {
            $('.custom_box').show();
            $('.category_box').hide();
            $('.page_box').hide();
            setAdditionalVal($('.custom_box').find('input[type="text"]').val());
        }
    }
    
    
    $('#category').change(function () {
        setAdditionalVal($(this).val());
    });
    $('#page').change(function () {
        setAdditionalVal($(this).val());
    });
    $('#custom').change(function () {
        setAdditionalVal($(this).val());
    });

    function setAdditionalVal(val) {
        $('#Menu_additional_id').val(val);
    }
    
//      $('#Menu_position').change(function () {
//        $.post("<?= $this->createUrl('loadPositionParentMenu') ?>", {position: $(this).val()}, function (data) {
//            $('#Menu_parent').html(data);
//            $("#Menu_parent").trigger("chosen:updated");
//        });
//    });      
        <?php if ($model->isNewRecord) { ?>
        $(document).ready(function () {
            setAdditionalVal($('.category_box').find('select option:first').val());
        });
<?php } else { ?>
        $(document).ready(function () {
            $('#Menu_type').trigger('change');
        });
<?php } ?>
</script>

<style>
    .chosen-container-single .chosen-single{height: 34px!important; line-height: 34px!important;}
    .chosen-container-single .chosen-single div b{background-position: 0px 8px!important;}
</style>