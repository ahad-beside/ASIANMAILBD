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
                <?php echo $form->labelEx($model, 'first_name'); ?>
                <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'first_name'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'last_name'); ?>
                <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'last_name'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->textField($model, 'password', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'role'); ?>
                <?php //echo $form->dropDownList($model, 'role', array('1' => 'Admin', '2' => 'Sub Editor'), array('empty' => 'Select Any'));
                
                echo $form->dropDownList($model, 'role', CHtml::listData(Roles::model()->findall(),'id','name') ,array('empty'=>'Select Any')); 
                ?>
                <?php echo $form->error($model, 'role'); ?>
            </div>
        </div>
    </div>
    
   
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'active'); ?>
                <?php echo $form->dropDownList($model, 'active', array('1' => 'Active', '2' => 'In Active'), array('empty' => 'Select Any'));
                ?>
                <?php echo $form->error($model, 'active'); ?>
            </div>
        </div>
    </div>


<div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->