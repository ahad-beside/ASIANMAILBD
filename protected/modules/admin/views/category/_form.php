<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>



<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'category-form',
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

<div class="form-group">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'name'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'description'); ?>
    <?php echo $form->textArea($model, 'description', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'description'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'metatag_title'); ?>
    <?php echo $form->textField($model, 'metatag_title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'metatag_title'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'metatag_description'); ?>
    <?php echo $form->textField($model, 'metatag_description', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'metatag_description'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'metatag_keywords'); ?>
    <?php echo $form->textField($model, 'metatag_keywords', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'metatag_keywords'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'parent'); ?>
    <?php echo $form->dropDownList($model, 'parent', Category::model()->dropDown(), array('class' => 'form-control chosen-select', 'empty' => 'Select Parent')); ?>
    <?php echo $form->error($model, 'parent'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'image'); ?>
    <?php echo $form->fileField($model, 'image', array('class' => '')); ?>
    
    <?php echo Yii::app()->easycode->showImage($model->image, 120, 100);?>
    <?php echo $form->error($model, 'image'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'top'); ?>
    <?php echo $form->checkBox($model, 'top', array('value' => '1')); ?>
    <?php echo $form->error($model, 'top'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'sort_order'); ?>
    <?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'sort_order'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'status'); ?>
    <?php echo $form->dropdownList($model, 'status', Yii::app()->easycode->getStatusOptions(), array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'status'); ?>
</div>



<div class="form-group buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->