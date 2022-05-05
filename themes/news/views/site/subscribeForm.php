<style>
    .subscribe_section{
        background-color: #efefef; margin-top: 10px;
    }
    .subscribe_section h3{
        font-size: 18px;
        font-weight: bold;
        margin: 0;
        background-color: #656565;
        color: white;
        padding: 5px;
    }
    .subscribe_section div.text{
        padding: 5px;
        font-size: 12px;
    }
    .subscribe_section #subscriber-list-form{
        text-align: center;
    }
    .ajax-error {
        border: 1px solid red !important;
        color: red !important;
    }
</style>
<div class="xoxo subscribe_section">
    <h3>Subscribe Here</h3>
    <div class="text">Sign up to get latest news and interviews before anyone else!</div>
    <?php
    $model = new SubscriberList;
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'subscriber-list-form',
        'action' => '#',
        'enableAjaxValidation' => false,
            //'enableClientValidation' => true,
    ));
    ?>
    <div class="clearfix">&nbsp;</div>
    <div class="col-md-12">
        <?= $form->textField($model, 'email', array('placeholder' => 'Type your email address', 'class' => 'form-control')); ?>
        <?= $form->error($model, 'email'); ?>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="col-md-12" >
            <?= CHtml::ajaxSubmitButton("Subscribe", Yii::app()->createUrl("//site/addSubscribtion"), array('beforeSend' => 'function (data){
                                    $("#subscribetion-btn").attr("disabled","disabled");
                                }
                                ', 'success' => 'function(data) {
                                data = JSON.parse(data);
                                //alert(JSON.stringify(data));
                                if(data.res=="0"){
                                    $.each(data.error,function(k,v){
                                        $("#SubscriberList_"+k).addClass("ajax-error");
                                        alert(v);
                                    });
                                    $("#subscribetion-btn").removeAttr("disabled");
                                }else{
                                    $(".subscribe").find(".text").hide();
                                   
                                   $("#subscriber-list-form").html("<i class=\"fa fa-check\" style=\"font-size:130px\"></i><br><span style=\"font-size:15px\">Thank you. Your Email has been successfully subscribed for newsletter</span>");
                                   $("#subscribetion-btn").removeAttr("disabled");
                                }
                                }'), array('class' => 'btn btn-primary', 'id' => 'subscribetion-btn')); ?>
    </div>
    <div class="clearfix">&nbsp;</div>

    <?php $this->endWidget(); ?>
</div>