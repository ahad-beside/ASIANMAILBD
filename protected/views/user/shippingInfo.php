<h2 class="page-title">Shipping Info</h2>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'shipping-info-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array('class'=>'inner-form'),
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
    <?php echo $form->labelEx($model, 'street_address'); ?>
    <?php echo $form->textArea($model, 'street_address', array('class' => 'form-control','style'=>'width:300px;')); ?>
    <?php echo $form->error($model, 'street_address'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'landmark'); ?>
    <?php echo $form->textField($model, 'landmark', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'landmark'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'city'); ?>
    <?php echo $form->dropDownList($model, 'city', CHtml::listData(City::model()->findAll(),id,name),array('empty'=>'Select','class' => 'form-control')); ?>
    <?php echo $form->error($model, 'city'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'pincode'); ?>
    <?php echo $form->textField($model, 'pincode', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'pincode'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'phone'); ?>
    <?php echo $form->textField($model, 'phone', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'phone'); ?>
</div>

<div class="form-group buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>