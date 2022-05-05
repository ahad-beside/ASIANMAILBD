<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'poll-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo Yii::app()->easycode->showNotification(); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 50, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('1'=>'Active','0'=>'Inactive'), array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>


    <div class="form-group">
        <label>Poll Options:</label>
        <table class="table table-striped poll-options-container">
            <tbody>
                <?php if(isset($data['options']) && count($data['options'])>0):
                    foreach ($data['options'] as $opt):
                    ?>
                <tr>
                    <td><?php echo $form->textField($modelOptions, 'option[]', array('class' => 'form-control pollopt', 'placeholder' => 'Type a option','value'=>$opt->option)); ?></td>
                    <td><?php echo $form->textField($modelOptions, 'sort_order[]', array('class' => 'form-control pollopt', 'placeholder' => 'Type Sort Order','value'=>$opt->sort_order)); ?></td>
                    <td style="vertical-align: middle"><button type="button" class="btn btn-xs btn-danger btndel"><i class="fa fa-times-circle"></i></button></td>
                </tr>
                <?php
                    endforeach;
                else:?>
                <tr>
                    <td><?php echo $form->textField($modelOptions, 'option[]', array('class' => 'form-control pollopt', 'placeholder' => 'Type a option')); ?></td>
                    <td><?php echo $form->textField($modelOptions, 'sort_order[]', array('class' => 'form-control pollopt', 'placeholder' => 'Type Sort Order')); ?></td>
                    <td style="vertical-align: middle"><button type="button" class="btn btn-xs btn-danger btndel"><i class="fa fa-times-circle"></i></button></td>
                </tr>
                <?php endif;?>
                
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button type="button" class="addmore">Add More Option</button>  
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

    <div style="display: none">
        <div id="option-copied">

        </div>
    </div>
    <script type="text/javascript">
        $('.addmore').click(function (e) {
            e.preventDefault();
            var tr = $('.poll-options-container tbody tr').first().clone().find("input").val("").end();
            $('.poll-options-container tbody').append(tr);
            showHideDelButton();
        });
        
        $('body').on('click', '.btndel', function (e) {
            if(confirm('Are you sure to remove?')){
                $(this).parent().parent().remove();
                showHideDelButton();
            }else
                return false;
        });
        
        function showHideDelButton(){
            if(parseInt($('.btndel').length) > 2)
                $('.btndel').show();
            else
                $('.btndel').hide();
        }
        showHideDelButton();
    </script>

</div><!-- form -->