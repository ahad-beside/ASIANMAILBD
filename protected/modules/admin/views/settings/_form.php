<?php
/* @var $this ManufacturerController */
/* @var $model Manufacturer */
/* @var $form CActiveForm */
?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/filemanager/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/ckfinder/ckfinder.js"></script>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'settings-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo Yii::app()->easycode->showNotification(); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'footer_text'); ?>
        <?php echo $form->textArea($model, 'footer_text', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'footer_text'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'footer_mtext'); ?>
        <?php echo $form->textArea($model, 'footer_mtext', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'footer_mtext'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'notification_email'); ?>
        <?php echo $form->textField($model, 'notification_email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'notification_email'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'email_alert'); ?>
        <?php echo $form->checkBox($model, 'email_alert', array(1 => 'Yes',0 => 'No'), array('separator'=>'  ')); ?>
        <?php echo $form->error($model, 'email_alert'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'sms_alert'); ?>
        <?php echo $form->checkBox($model, 'sms_alert', array(1 => 'Yes', 0 => 'No'), array('separator'=>'  ')); ?>
        <?php echo $form->error($model, 'sms_alert'); ?>
    </div>
    
    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    var editor = CKEDITOR.replace('Settings_footer_text');
    CKFinder.setupCKEditor(editor, '<?php echo Yii::app()->request->baseUrl ?>/ckfinder/');
    
    var editor2 = CKEDITOR.replace('Settings_footer_mtext');
    CKFinder.setupCKEditor(editor2, '<?php echo Yii::app()->request->baseUrl ?>/ckfinder/');

    var finder = new CKFinder();
    finder.basePath = '<?php echo Yii::app()->request->baseUrl ?>/ckfinder/';
</script>