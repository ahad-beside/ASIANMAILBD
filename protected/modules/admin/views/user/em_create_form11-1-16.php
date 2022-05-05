<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo Yii::app()->easycode->showNotification(); ?>
    
    <div class="clearfix">&nbsp;</div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>
<!--        <div class="col-md-6">
            <div class="form-group">
                <?php //echo $form->labelEx($model, 'active'); ?>
                <?php //echo $form->dropDownList($model, 'active', array('1'=>'Active','0'=>'Inactive'), array('class' => 'form-control')); ?>
                <?php //echo $form->error($model, 'active'); ?>
            </div>
        </div>-->
    </div>
    <div class="row">
<!--        <div class="col-md-6">
            <div class="form-group">
                <?php //echo $form->labelEx($model, 'password'); ?>
                <?php //echo $form->textField($model, 'password', array('class' => 'form-control')); ?>
                <?php //echo $form->error($model, 'password'); ?>
            </div>
        </div>-->
<!--        <div class="col-md-6">
            <div class="form-group">
                <?php //echo $form->labelEx($model, 'repeatpassword'); ?>
                <?php //echo $form->textField($model, 'repeatpassword', array('class' => 'form-control')); ?>
                <?php //echo $form->error($model, 'repeatpassword'); ?>
            </div>
        </div>-->
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'fullname'); ?>
                <?php echo $form->textField($data['profileModel'], 'fullname', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'fullname'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'company_name'); ?>
                <?php echo $form->textField($data['profileModel'], 'company_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'company_name'); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'designation'); ?>
                <?php echo $form->textField($data['profileModel'], 'designation', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'designation'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'mobile'); ?>
                <?php echo $form->textField($data['profileModel'], 'mobile', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'mobile'); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'company_type'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'company_type', array('Company'=>'Company','Consultant'=>'Consultant'), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'company_type'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'industry'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'industry', Chtml::listData(Industry::model()->findAll(),id,name), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'industry'); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'city'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'city', Chtml::listData(City::model()->findAll(),id,name), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'city'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'address'); ?>
                <?php echo $form->textArea($data['profileModel'], 'address', array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'address'); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'contact_person'); ?>
                <?php echo $form->textField($data['profileModel'],'contact_person', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'contact_person'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'contact_number'); ?>
                <?php echo $form->textField($data['profileModel'], 'contact_number', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'contact_number'); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'role_in_hiring'); ?>
                <?php echo $form->dropDownList($data['profileModel'],'role_in_hiring', array('For My Company'=>'For My Company','Others'=>'Others'),array('class'=>'form-control'))?>
                <?php echo $form->error($data['profileModel'], 'role_in_hiring'); ?>
            </div>
        </div>
<!--        <div class="col-md-6">
            <?= Yii::app()->easycode->showImage($data['profilePhoto']->image,180,150);?>
            <?php //echo $form->fileField($data['profilePhoto'], 'image', array()); ?><br>
            <i>Upload your photo (jpg, gif, png format)</i>
        </div>-->
    </div>
    
    <div class="row">
        <div class="col-md-6">
            
        </div>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->