<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
    </head>
    <body>
        <!-- For Google Analytics Comments -->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
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
        <div class="container-future">
            <?php echo $content ?>
        </div>
        <!-- four row Start -->
        <?php //include_once 'footer.php'; ?>
        <!-- four row exit -->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/custom.js" type="text/javascript"></script>
    </body>
</html>