<?php include('header.php'); ?>
<body>
 
    

    <div class="iphone-web">
        <div class="masthead col-xs-18 pdng-stn1">
            <!-- start navigation-->
            <?php
            //include('navigation.php');
            ?>
            <!-- end navigation-->

            <div class="phone-box wrap push">
             
                <div class="menu-notify">
                    <?php //include('navigationIcon.php'); ?>
                    <?php //include('logo.php'); ?>
                    <?php //include('homeIcon.php'); ?>
                    <?php include('headerTab.php'); ?>
                    <?php //include('body.php'); 
                    echo $content;
                    ?>
                </div>
                
               

            </div>
            <!--//first-->


            <?php include('footer.php'); ?>
        </div>

        <div class="clearfix"></div>
    </div>

<script>
    $(document).ready(function(){
       $('img').each(function(){
          if($(this).hasClass('img-responsive')){
              
          } else{
              $(this).addClass('img-responsive');
              $(this).removeAttr('height');
              $(this).removeAttr('style');
          }
       });
    });
</script>
</body>
</html>