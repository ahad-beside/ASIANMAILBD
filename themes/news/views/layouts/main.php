<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
        
    </head>
    <body>
       
            <?php //include_once 'navigationTop.php';  ?>
            <?php include_once 'navigationMain.php'; ?>
        <div class="container-future">
        <?php echo $content ?>
            
        </div>
        <!-- four row Start -->
<?php include_once 'footer.php'; ?>
        <!-- four row exit -->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/custom.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/superfish.js" type="text/javascript"></script>
    </body>
</html>