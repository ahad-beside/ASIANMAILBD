<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
        <script type="text/javascript">
            /*$(document).ready(function () {
             var menu = $('.unhide');
             var origOffsetY = menu.offset().top;
             function scroll() {
             if ($(window).scrollTop() >= origOffsetY) {
             $('.unhide').addClass('sticky');
             //$('.content').addClass('menu-padding');
             } else {
             $('.unhide').removeClass('sticky');
             //$('.content').removeClass('menu-padding');
             }
             }
             document.onscroll = scroll;
             });*/
        </script>
    </head>
    <body>
        <!-- Go to www.addthis.com/dashboard to customize your tools 
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52dbf5ed2c5f04ed" async="async"></script>-->

        <!-- For FB Comments & Like Box -->
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_IN/sdk.js#xfbml=1&version=v2.5&appId=188029888212922";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>



        <!-- For Google Analytics Comments -->
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-61022022-1', 'auto');
            ga('send', 'pageview');
        </script>

        <?php //include_once 'navigationTop.php';  ?>
        <?php include_once 'navigationMain.php'; ?>

        <!--        <div class="container-future">-->
        <div class="container" style="padding: 10px; clear: both">
           
            <div class="row">   
                <div class="col-md-12">

                    <div class="col-md-9"><?php echo $content ?></div>
                    <div class="col-md-3" style='padding-top:15px'> <?php include 'entertainmentSidebar.php';?> </div>
                </div> </div>
            <!--        </div>-->
            <!-- four row Start -->
            <?php include_once 'footer.php'; ?>
            <!-- four row exit -->
            <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/bootstrap.min.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery-ui.min.js" type="text/javascript"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/custom.js" type="text/javascript"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/superfish.js" type="text/javascript"></script>
    </body>
</html>