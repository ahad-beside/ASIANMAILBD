<div class="container" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width: 100%;">
    <div class="col-md-12" style="text-align:center; padding-bottom:8px; border-bottom:2px solid #CCC; margin-top:15px; margin-bottom:12px;">
        <div style="margin-bottom:12px;"><img src="<?php echo Yii::app()->params->SERVER_HOST . Yii::app()->request->baseUrl ?>/images/mail/wristbands-logo.png" /></div>
        <?php echo Yii::app()->params->AddressPhoneEmailWeb?>
    </div>
    <div class="col-md-12">
    <strong>Dear <?php echo $orderInfo->full_name?>,</strong>
    <p>You have unread message regarding your submitted complaint.</p>

    <p>You can view your complaint status from following link</p>
    <a href="<?php echo $complainLink?>">Click Here To View</a>
    </div>
</div>