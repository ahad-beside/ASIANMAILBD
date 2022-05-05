<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/bootstrap.css" rel="stylesheet">
        <style>
            .form-control{color:black}
        </style>
    </head>
    <body>

        <div class="container-future">
            <?php echo $content ?>
        </div>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery-ui.min.js" type="text/javascript"></script>
    </body>
</html>