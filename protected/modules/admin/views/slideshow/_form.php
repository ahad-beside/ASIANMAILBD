<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'products-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo Yii::app()->easycode->showNotification(); ?>


    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" class="tab" href="#general">General</a></li>
        <li class=""><a data-toggle="tab" class="tab" href="#links">Links</a></li>
        <li class=""><a data-toggle="tab" class="tab" href="#attribute">Attribute</a></li>
        <li class=""><a data-toggle="tab" class="tab" href="#option">Option</a></li>
        <li class=""><a data-toggle="tab" class="tab" href="#discount">Discount</a></li>
        <li class=""><a data-toggle="tab" class="tab" href="#image">Image</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="general" class="tab-pane fade active in">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'description'); ?>
                <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'description'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'metatag_title'); ?>
                <?php echo $form->textField($model, 'metatag_title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'metatag_title'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'metatag_description'); ?>
                <?php echo $form->textField($model, 'metatag_description', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'metatag_description'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'metatag_keywords'); ?>
                <?php echo $form->textField($model, 'metatag_keywords', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'metatag_keywords'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'image'); ?>
                <?php echo $form->fileField($model, 'image', array('class' => '')); ?>
                <?php echo Yii::app()->easycode->showImage($model->image, 120, 100);?>
                <?php echo $form->error($model, 'image'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'model'); ?>
                <?php echo $form->textField($model, 'model', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'model'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'sku'); ?>
                <?php echo $form->textField($model, 'sku', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'sku'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'price'); ?>
                <?php echo $form->textField($model, 'price', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'price'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'quantity'); ?>
                <?php echo $form->textField($model, 'quantity', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'quantity'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'minimum_quantity'); ?>
                <?php echo $form->textField($model, 'minimum_quantity', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'minimum_quantity'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'substract_stock'); ?>
                <?php echo $form->dropDownList($model, 'substract_stock', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'substract_stock'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'outofstock_status'); ?>
                <?php echo $form->dropDownList($model, 'outofstock_status', array('In Stock' => 'In Stock', 'Out Of Stock' => 'Out Of Stock'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'outofstock_status'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'seo_keyword'); ?>
                <?php echo $form->textField($model, 'seo_keyword', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'seo_keyword'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'status'); ?>
                <?php echo $form->dropDownList($model, 'status', Yii::app()->easycode->loadStatusDropdownOptions(), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'status'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'sort_order'); ?>
                <?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'sort_order'); ?>
            </div>
        </div>
        <div id="links" class="tab-pane fade">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'manufacturer'); ?>
                <?php echo $form->dropDownList($model, 'manufacturer', Manufacturer::model()->loadAsDropDown(), array('class' => 'form-control chosen-select', 'empty' => 'Select Any')); ?>
                <?php echo $form->error($model, 'manufacturer'); ?>
            </div>

            <div class="form-group">
                <?php echo CHtml::label('Categories', 'categories'); ?>
                <?php echo CHtml::dropDownList('categories[]', $data['selectedCategory'], Category::model()->dropDown(false), array('class' => 'form-control chosen-select', 'multiple' => 'multiple', 'empty' => 'Select Any')); ?>
            </div>

            <div class="form-group">
                <?php echo CHtml::label('Filters', 'filters'); ?>
                <?php echo CHtml::dropDownList('filters[]', $data['selectedFilter'], Filter::model()->dropDown(false), array('class' => 'form-control chosen-select', 'multiple' => 'multiple', 'empty' => 'Select Any')); ?>
            </div>

            <div class="form-group">
                <?php echo CHtml::label('Related Products', 'related_products'); ?>
                <?php echo CHtml::dropDownList('relatedProducts[]', $data['selectedRelatedProducts'], Products::model()->dropDown($model->id), array('class' => 'form-control chosen-select', 'multiple' => 'multiple', 'empty' => 'Select Any')); ?>
            </div>
        </div>
        <div id="attribute" class="tab-pane fade">
            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Attribute</th>
                                <th>Text</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="attributeItemBox">
                            <?php
                            $showSingleRow = 0;
                            if ($this->action->id == 'update') {
                                if (count($data['selectedAttributes']) > 0) {
                                    foreach ($data['selectedAttributes'] as $preAttr) {
                                        ?>
                                        <tr>
                                            <td><?php echo CHtml::dropDownList('attribute[id][]', $preAttr->attribute_id, Attribute::model()->dropDownWithGroup(), array('class' => 'form-control', 'placeholder' => 'Type option value name', 'id' => uniqid())) ?></td>
                                            <td><?php echo CHtml::textField('attribute[text][]', $preAttr->message, array('class' => 'form-control')) ?></td>
                                            <td><div class="btn btn-danger del-item" title="Delete"><i class="fa fa-minus"></i></div></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    $showSingleRow = 1;
                                }
                            } else {
                                $showSingleRow = 1;
                            }

                            if ($showSingleRow == 1) {
                                ?>
                                <tr>
                                    <td><?php echo CHtml::dropDownList('attribute[id][]', '', Attribute::model()->dropDownWithGroup(), array('class' => 'form-control', 'placeholder' => 'Type option value name', 'id' => uniqid())) ?></td>
                                    <td><?php echo CHtml::textField('attribute[text][]', '', array('class' => 'form-control')) ?></td>
                                    <td><div class="btn btn-danger del-item" title="Delete"><i class="fa fa-minus"></i></div></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td><div class="btn btn-primary" id="addMoreItem" title="Add More Items"><i class="fa fa-plus"></i></div></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div id="option" class="tab-pane fade">
            <div class="form-group">

                <table class="table">
                    <tr>
                        <td>
                            <?php echo CHtml::dropDownList('optionselect', '', Option::model()->dropDownWithGroup(), array('class' => 'form-control', 'empty' => 'Choose Option')); ?>
                        </td>
                        <td>
                            <div class="btn btn-primary" id="addOptionContainer"><i class="fa fa-plus"></i></div>
                        </td>
                    </tr>
                </table>

                <div id="optionContainer">
                    <?php
                    if (!$model->isNewRecord) {
                        if (count($data['optionContainer']) > 0) {
                            $q = 0;
                            foreach ($data['optionContainer'] as $selOption):
                                $parentData = array('option_id' => $selOption->option_id, 'isrequired' => $selOption->isrequired);
                                $childData = ProductsOptionItem::model()->findAll('product_option_id=:id', array(':id' => $selOption->id));

                                $optionId = $selOption->option_id;
                                $optionCount = $q;
                                $optionType = Option::model()->findByPk((int) $optionId);
                                if ($optionType->type === 'select' || $optionType->type === 'radio') {
                                    echo Option::model()->getOptionContainer($optionType->type, $optionType->id, $optionType->name, $optionCount, $parentData, $childData);
                                    $q++;
                                }
                            endforeach;
                        }
                    }
                    ?>
                </div>
                <input type="hidden" id="countOptionContainer" value="<?php echo $data['countOptionContainer'] ?>">
            </div>
        </div>
        <div id="discount" class="tab-pane fade">
            <div class="form-group">
                <?php echo $form->labelEx($modelProductsDiscount, 'price'); ?>
                <?php echo $form->textField($modelProductsDiscount, 'price', array('class' => 'form-control')); ?>
                <?php echo $form->error($modelProductsDiscount, 'price'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($modelProductsDiscount, 'from_date'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'ProductsDiscount[from_date]',
                    'value' => ($modelProductsDiscount->from_date == '') ? '' : date("d-m-Y", strtotime($modelProductsDiscount->from_date)),
                    'options' => array(
                        'dateFormat' => 'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Choose Date',
                    ),
                ));
                ?>
                <?php echo $form->error($modelProductsDiscount, 'from_date'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($modelProductsDiscount, 'to_date'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'ProductsDiscount[to_date]',
                    'value' => ($modelProductsDiscount->to_date == '') ? '' : date("d-m-Y", strtotime($modelProductsDiscount->to_date)),
                    'options' => array(
                        'dateFormat' => 'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Choose Date',
                    ),
                ));
                ?>
                <?php echo $form->error($modelProductsDiscount, 'to_date'); ?>
            </div>
        </div>
        <div id="image" class="tab-pane fade">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Sort Order</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="imageItemBox">
                    <?php
                    if (count($data['productsImage']) > 0) {
                        foreach ($data['productsImage'] as $preImage):
                            ?>
                            <tr>
                                <td>
                                    <input type="file" name="ProductsImage[image][]">
                                    <?php echo Yii::app()->easycode->showImage($model->image, 120, 100);?>
                                    <input type="hidden" name="ProductsImage[id][]" value="<?php echo $preImage->id ?>">
                                </td>
                                <td class="text-right">
                                    <input type="text" name="ProductsImage[sort_order][]" class="form-control" value="<?php echo $preImage->sort_order ?>">
                                </td>
                                <td class="text-left">
                                    <button data-original-title="Remove" type="button" data-toggle="tooltip" data-id="<?php echo $preImage->id ?>" title="Remove" class="btn btn-danger del-image-db"><i class="fa fa-minus-circle"></i></button>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="file" name="ProductsImage[image][]">
                        </td>
                        <td class="text-right">
                            <input type="text" name="ProductsImage[sort_order][]" class="form-control">
                        </td>
                        <td class="text-left">
                            <button data-original-title="Remove" type="button" data-toggle="tooltip" onclick="$(this).parent().parent().remove();" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td class="text-left">
                            <button data-original-title="Add More Image" type="button" onclick="addImageRow('#imageItemBox');" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <div class="form-group buttons" style="">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<!-- For Image -->
<script>
    function addImageRow(idtoappend) {
        var row = '<tr><td><input type="file" name="ProductsImage[image][]"></td><td class="text-right"><input type="text" class="form-control" name="ProductsImage[sort_order][]"></td><td class="text-left"><button class="btn btn-danger" title="Remove" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button></td></tr>';
        $(idtoappend).append(row);
    }

    $('body').on('click', '.del-image-db', function () {
        $this = $(this);
        if (confirm('Are you sure to detele?')) {
            var dataId = $this.attr('data-id');
            if (dataId.trim() !== '') {
                $.post("<?php echo Yii::app()->createUrl('//admin/products/delImage') ?>", {delId: dataId}, function (data) {
                    if (data == '1') {
                        $this.parent().parent().remove();
                    }
                });
            }
        }

    });
</script>
<!-- End For Image -->


<!-- For Option -->
<script>
    $('#addOptionContainer').click(function () {
        var optionselect = $('#optionselect').val();
        var optionCountContainer = $('#countOptionContainer').val();
        if (optionselect !== '') {
            $.post("<?php echo Yii::app()->createUrl('//admin/products/getOptionContainer') ?>", {optionId: optionselect, optionCount: optionCountContainer}, function (data) {
                if (data !== '') {
                    $('#optionContainer').append(data);
                    $('#countOptionContainer').val(parseInt(optionCountContainer) + 1);
                }
            });
        }
    });

    function addOptionValue(optionId) {
        //var ftr = '<tr>'+$('#option-value'+optionId).find('tbody').find('tr:first').html()+'</tr>';

        var ftr = $('#hiddenTr' + optionId).find('table').find('tbody').find('tr:first').clone();
        $('#option-value' + optionId).find('tbody').append(ftr);
    }
</script>
<!-- End For Option -->

<script>
    $('.tab').click(function () {
        $('.chosen-container').css('width', '100%');
    });
</script>

<style>
    .tab-pane{padding: 20px 0px;}
</style>




<!-- For Attriute -->
<div id="attributeGroupList" style="display: none"><?php echo CHtml::dropDownList('attribute[id][]', '', Attribute::model()->dropDownWithGroup(), array('class' => 'form-control', 'placeholder' => 'Type option value name', 'id' => 'fds')) ?></div>
<script>
    function appendAttributeBox() {
        var dropdown = $("#attributeGroupList").html().replace(/(\r\n|\n|\r)/gm, "");

        var item = '<tr><td>' + dropdown + '</td><td><?php echo CHtml::textField('attribute[text][]', '', array('class' => 'form-control')) ?></td><td><div class="btn btn-danger del-item" title="Delete"><i class="fa fa-minus"></i></div></td></tr>';
        $('#attributeItemBox').append(item);
    }
    $('body').on('click', '#addMoreItem', function () {
        appendAttributeBox();
    });

    $('body').on('click', '.del-item', function () {
        $(this).parent().parent().remove();
    });

    $('body').on('click', '.del-item-db', function () {
        $this = $(this);
        if (confirm('Are you sure to detele?')) {
            var dataId = $this.attr('data-id');
            if (dataId.trim() !== '') {

                $.post("<?php echo Yii::app()->createUrl('//admin/option/delItems') ?>", {delId: dataId}, function (data) {
                    if (data == '1') {
                        $this.parent().parent().remove();
                    }
                });
            }
        }

    });
</script>
<!-- End For Attriute -->