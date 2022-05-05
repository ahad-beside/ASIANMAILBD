<?php include_once 'header.php'; ?>

<body>
    <div id="wrapper">
        <?php include_once 'navigation.php'; ?>
        <div id="page-wrapper" >
            <?php echo $content ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript 
    <script src="<?php //echo Yii::app()->theme->baseUrl ?>/assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl ?>/assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl ?>/assets/js/plugins/morris/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/sb-admin-2.js"></script>
    <?php
    $this->widget('ext.chosen.EChosenWidget', array(
        // the select selector
        'selector' => '.chosen-select',
        // Chosen options
        'options' => array(
            'no_results_text' => 'Not found',
        ),
    ));
    ?>
</body>
</html>