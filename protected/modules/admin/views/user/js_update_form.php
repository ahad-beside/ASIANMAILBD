<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo Yii::app()->easycode->showNotification(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= Yii::app()->easycode->showImage($data['profilePhoto']->image, 180, 150); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo Chtml::textField('emailTest', $model->email, array('size' => 50, 'maxlength' => 50, 'class' => 'form-control', 'disabled' => 'disabled')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'active'); ?>
                <?php echo $form->dropDownList($model, 'active', array('1' => 'Active', '0' => 'Inactive'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'active'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'name'); ?>
                <?php echo $form->textField($data['profileModel'], 'name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'name'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'date_of_birth'); ?>
                <?php
                $this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
                    'model' => $data['profileModel'],
                    'attribute' => 'date_of_birth',
                    'options' => array(
                        'format' => 'd-m-Y',
                    ), //DateTimePicker options
                    'htmlOptions' => array('class' => 'form-control', 'value' => ($data['profileModel']->date_of_birth != '') ? date('d-m-Y', strtotime($data['profileModel']->date_of_birth)) : ''),
                ));
                ?>
                <?php echo $form->error($data['profileModel'], 'date_of_birth'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'current_location'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'current_location', Chtml::listData(City::model()->findAll(), id, name), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'current_location'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'preffered_location'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'preffered_location', Chtml::listData(City::model()->findAll(), id, name), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'preffered_location'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'industry'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'industry', Chtml::listData(Industry::model()->findAll(), id, name), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'industry'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'functional_area'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'functional_area', Chtml::listData(FunctionalArea::model()->findAll(), id, name), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'functional_area'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'role'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'role', Chtml::listData(Role::model()->findAll(), id, name), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'role'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'gender'); ?>
                <?php echo $form->dropDownList($data['profileModel'], 'gender', array('Male' => 'Male', 'Female' => 'Female'), array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'gender'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'mobile'); ?>
                <?php echo $form->textField($data['profileModel'], 'mobile', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'mobile'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'land_line'); ?>
                <?php echo $form->textField($data['profileModel'], 'land_line', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'land_line'); ?>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'city'); ?>
                <?php echo $form->textField($data['profileModel'], 'city', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'city'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($data['profileModel'], 'marital_status'); ?>
            <?php echo $form->dropDownList($data['profileModel'], 'marital_status', array('Single/Unmarried' => 'Single/Unmarried', 'Married' => 'Married', 'Widowed' => 'Widowed', 'Divorced' => 'Divorced', 'Separated' => 'Separated', 'Other' => 'Other'), array('class' => 'form-control')); ?>
            <?php echo $form->error($data['profileModel'], 'marital_status'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'profile_summary'); ?>
                <?php echo $form->textArea($data['profileModel'], 'profile_summary', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'profile_summary'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($data['profileModel'], 'permanent_address'); ?>
                <?php echo $form->textArea($data['profileModel'], 'permanent_address', array('class' => 'form-control')); ?>
                <?php echo $form->error($data['profileModel'], 'permanent_address'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($data['profileModel'], 'resume_headline'); ?>
            <?php echo $form->textField($data['profileModel'], 'resume_headline', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($data['profileModel'], 'resume_headline'); ?>
        </div>
    </div>
    
    <div class="clearfix">&nbsp;</div>


    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->