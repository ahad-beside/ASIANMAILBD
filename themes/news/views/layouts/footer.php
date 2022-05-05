<div class="clearfix">&nbsp;</div>
<div style="width:100%; background-color:#19232d;">
<div class="container">
    <div class="row">
        <div class="footerbg">
		<!--<?php
        $settings = Settings::model()->find();
        echo $settings->footer_text;
        ?>-->
      
      	
        <div class="container" style="padding:15px 0px; font-size:20px;">
        
        <div class="col-md-3" style="text-align:center">
        <br />
        	সম্পাদক<br />
            সুমন আহমেদ
                 
                 
                 
            
        </div>
        	
        
        	<div class="col-md-6" style="text-align:center;">
            	 
					<strong>Asian Mail BD</strong><br />                    
                    ডি # ৫, ১২/১৩, রাজিয়া সুলতানা রোড়, মোহাম্মদপুর, ঢাকা<br />
                     Phone: +88 01814919780 <br />
					 Website: http://www.asianmailbd.com 
            </div>
            
            <div class="col-md-3" style="text-align:center;">
            	 
<p class="emailid" style="font-size:20px;">
                 	Email<br />
                    news@asianmailbd.com<br />info@asianmailbd.com<br />sumonahmed@asianmailbd.com
                 </p>

            </div>
            
            
        </div>
        
        </div>    
    </div>
    <!-- bottom-menu html Exit -->
</div>

<div class="footerbtm">
	<div class="container">
    	<div> 
        	<div class="col-md-12" style="text-align: center; font-size: 12px; padding: 5px 0; font-family:arial, sans-serif;">
            Copyright &copy; <?= date('Y') ?> Asian Mail <br> <a href="http://www.coder71.com/"target="_blank">Developed by: <img src="<?= Yii::app()->request->baseUrl . '/images/coder71.png' ?>" alt="coder71" width="auto" height="auto"></a>
        </div>
        </div>
    </div>
</div>

</div>
<!-- Google custom search modal -->
<div id="modal-gcs" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <gcse:searchresults></gcse:searchresults>
        </div>
    </div>
</div>
<!-- Google custom search modal -->

<?php /*if(!isset(Yii::app()->request->cookies['fblike'])):
    $cookie = new CHttpCookie('fblike', 1);
    $cookie->expire = time() + (60*60*48); // 48 hours
    Yii::app()->request->cookies['fblike'] = $cookie;
    echo Yii::app()->request->cookies['fblike'];
    ?>
<!-- inline popup fb like -->
<div style="width: 350px; height: 250px;" id="inlineFb">
    <div class="fb-page" data-href="https://www.facebook.com/asianmailbd" data-width="350" data-height="250" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/asianmailbd"><a href="https://www.facebook.com/asianmailbd">asianmailbd.com</a></blockquote></div></div>
</div>
<script type="text/javascript">
    //$('.clickfblike').trigger('click');
    $('#inlineFb').trigger('click');
</script>
<!-- inline popup fb like -->
<?php endif;*/?>

<style>
	.footerbg div{
		background:none!important;
	}
</style>