<div class="container" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width: 100%;">
    <div class="col-md-12" style="text-align:center; padding-bottom:8px; border-bottom:2px solid #CCC; margin-top:15px; margin-bottom:12px;">
        <div style="margin-bottom:12px;"><img src="<?php echo Yii::app()->params->SERVER_HOST ?>/images/logo.png" /></div>
    </div>
    <div class="col-md-12">
    <strong>Dear User,</strong>
    <p>Your are successfully registered with us. Please click below link to verified your account.</p>
    
    <a target="_blank" href="<?php echo Yii::app()->params->SITE_URL.Yii::app()->createUrl('//site/emailverification/',array('verification_code'=>$code))?>"><?php echo Yii::app()->params->SITE_URL.Yii::app()->createUrl('//site/emailverification/',array('verification_code'=>$code))?></a>

    </div>
</div>