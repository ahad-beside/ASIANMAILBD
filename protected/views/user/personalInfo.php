<h2 class="page-title">Personal Information</h2>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form2',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array('class'=>'inner-form'),
));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo Yii::app()->easycode->showNotification(); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'first_name'); ?>
    <?php echo $form->textField($model, 'first_name', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'first_name'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'last_name'); ?>
    <?php echo $form->textField($model, 'last_name', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'last_name'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'phone'); ?>
    <?php echo $form->textField($model, 'phone', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'phone'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'gender'); ?>
    <?php echo $form->dropDownList($model, 'gender', array('Male'=>'Male','Female'=>'Female'),array('empty'=>'Select','class' => 'form-control')); ?>
    <?php echo $form->error($model, 'gender'); ?>
</div>

<div class="form-group buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>