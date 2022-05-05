<div class="container" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width: 100%;">
    <div class="col-md-12" style="text-align:center; padding-bottom:8px; border-bottom:2px solid #CCC; margin-top:15px; margin-bottom:12px;">
        <div style="margin-bottom:12px;"><img src="<?php echo Yii::app()->params->SERVER_HOST ?>/images/logo.png" /></div>
    </div>
    <div class="col-md-12">
    <strong>Dear <?php echo $name?>,</strong>
    <p>Please click below link to reset your password</p>
    <a href="<?php echo Yii::app()->params->SITE_URL.Yii::app()->createUrl('//user/forgotPassword?link='.$email)?>" target="_blank"><?php echo Yii::app()->params->SITE_URL.Yii::app()->createUrl('//user/forgotPassword?link='.$email)?></a>
    </div>
</div>