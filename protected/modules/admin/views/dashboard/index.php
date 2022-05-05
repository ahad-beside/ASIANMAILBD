<!--<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
    }</style>-->

<h2>Dashboard</h2>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> 
                            <?php
                            echo Post::model()->count(array(
                                'condition' => 'entry_time like :dateT',
                                'params' => array(':dateT' => date("Y-m-d") . '%'))
                            );
                            ?>
                        </div>
                        <div>Today Post</div>
                    </div>
                </div>
            </div>
            <!--            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>-->
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> 
                            <?php
                            echo Post::model()->count(array(
                                'condition' => 'entry_time BETWEEN :dateT7 AND :dateT',
                                'params' => array(':dateT7' => (date("Y-m-d 00:00:00", strtotime('-7 Days'))), ':dateT' => date("Y-m-d 23:59:59")))
                            );
                            ?>
                        </div>
                        <div>Last 7 Days</div>
                    </div>
                </div>
            </div>
            <!--            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>-->
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php
                            echo Post::model()->count(array(
                                'condition' => 'entry_time BETWEEN :dateM AND :dateM1',
                                'params' => array(':dateM' => (date("Y-m-01 00:00:00")), ':dateM1' => date("Y-m-d 23:59:59")))
                            );
                            ?>

                        </div>
                        <div>Current Month</div>
                    </div>
                </div>
            </div>
            <!--                            <a href="#">
                                            <div class="panel-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>-->
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php
                            echo Post::model()->count(); //returns AR objects
                            ?>
                        </div>
                        <div>Total Post</div>
                    </div>
                </div>
            </div>
            <!--                            <a href="#">
                                            <div class="panel-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>-->
        </div>
    </div>
</div>
<?php
//echo $Tdate=date(d)-1;
//echo date("Y-m-d 00:00:00", strtotime('-$Tdate Days')); 
//echo date("Y-m-01 00:00:00");
?>

<?php if(Yii::app()->user->roles=='Admin'):?>
<div class="row">
<!--############## start today Post#####################-->
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Today's Post</div>
            <div class="panel-body">
                <table  class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Total Post</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userList = User::model()->findAll(array(
                            'condition'=>'active=1'
                        ));
                        foreach ($userList as $us):
                            ?>
                            <tr class="odd">
                                <td><?php echo $us->email; ?></td>

                                <td>
                                    <?php
//                                    echo Post::model()->count(array(
//                                        'condition' => 'entry_by=:uid',
//                                        'params' => array(':uid' => $us->id)
//                                    ));
                                    echo Post::model()->count(array(
                                        'condition' => 'entry_by=:uid AND entry_time like :dateT',
                                        'params' => array(':uid' => $us->id, ':dateT' => date("Y-m-d") . '%')
                                    ));
                                    ?>
                                </td>
                            </tr> 
                            <?php
                        endforeach;
                        ?> 
                    </tbody>

                </table>
            </div>
        </div>
    </div>

<!--############## END today Post#####################-->




<!--############## start Last 7 Days Post#####################-->

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Last 7 Day's Post</div>
            <div class="panel-body">
                <table  class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Total Post</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userList = User::model()->findAll(array(
                            'condition'=>'active=1'
                        ));
                        foreach ($userList as $us):
                            ?>
                            <tr class="odd">
                                <td><?php echo $us->email; ?></td>

                                <td>
                                    <?php
//                                    echo Post::model()->count(array(
//                                        'condition' => 'entry_by=:uid',
//                                        'params' => array(':uid' => $us->id)
//                                    ));
                                    echo Post::model()->count(array(
                                        'condition' => 'entry_by=:uid AND entry_time BETWEEN :dateT7 AND :dateT',
                                        'params' => array(':uid' => $us->id, ':dateT7' => date("Y-m-d 00:00:00", strtotime('-7 Days')), ':dateT' => date("Y-m-d 23:59:59"))));
                                    
                                    
                                    ?>
                                </td>
                            </tr> 
                            <?php
                        endforeach;
                        ?> 
                    </tbody>

                </table>
            </div>
        </div>
    </div>
<!--############## END 7 days Post#####################-->


<!--############## Start Current Month Post#####################-->
<div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Current Month Post</div>
            <div class="panel-body">
                <table  class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Total Post</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userList = User::model()->findAll(array(
                            'condition'=>'active=1'
                        ));
                        foreach ($userList as $us):
                            ?>
                            <tr class="odd">
                                <td><?php echo $us->email; ?></td>

                                <td>
                                    <?php
//                                    echo Post::model()->count(array(
//                                        'condition' => 'entry_by=:uid',
//                                        'params' => array(':uid' => $us->id)
//                                    ));
                                    echo Post::model()->count(array(
                                        'condition' => 'entry_by=:uid AND entry_time BETWEEN :dateM AND :dateM1',
                                        'params' => array(':uid' => $us->id, ':dateM' => (date("Y-m-01 00:00:00")), ':dateM1' => date("Y-m-d 23:59:59"))));
                                    
//                                    echo Post::model()->count(array(
//                                'condition' => 'entry_time BETWEEN :dateM AND :dateM1',
//                                'params' => array(':dateM' => (date("Y-m-01 00:00:00")), ':dateM1' => date("Y-m-d 23:59:59")))
                            //);
                                    ?>
                                </td>
                            </tr> 
                            <?php
                        endforeach;
                        ?> 
                    </tbody>

                </table>
            </div>
        </div>
    </div>

<!--############## END Current Month Post#####################-->



<!--############## START Total Post#####################-->
<div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">All Post</div>
            <div class="panel-body">
                <table  class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Total Post</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userList = User::model()->findAll(array(
                            'condition'=>'active=1'
                        ));
                        foreach ($userList as $us):
                            ?>
                            <tr class="odd">
                                <td><?php echo $us->email; ?></td>

                                <td>
                                    <?php
                                    echo Post::model()->count(array(
                                        'condition' => 'entry_by=:uid',
                                        'params' => array(':uid' => $us->id)
                                    ));
//                                    echo Post::model()->count(array(
//                                        'condition' => 'entry_by=:uid AND entry_time BETWEEN :dateT7 AND :dateT',
//                                        'params' => array(':uid' => $us->id, ':dateT7' => date("Y-m-d 00:00:00", strtotime('-7 Days')), ':dateT' => date("Y-m-d 23:59:59"))));
                                    
                                    
                                    ?>
                                </td>
                            </tr> 
                            <?php
                        endforeach;
                        ?> 
                    </tbody>

                </table>
            </div>
        </div>
    </div>
<!--############## END Total Post#####################-->

</div>
<?php endif;?>