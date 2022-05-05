<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Users</h2></div>
        <div class="col-md-6 action-button">
            <?php
            echo CHtml::link('<i class="fa fa-plus"></i>', $this->createUrl('user/create'), array('class' => 'btn btn-default btn-circle', 'title' => 'New Employer'));
            echo CHtml::link('<i class="fa fa-list"></i>', $this->createUrl('user/index'), array('class' => 'btn btn-default btn-circle', 'title' => 'All User'));
            ?>
        </div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Users</div>
            <div class="panel-body">
                <?php
//                echo CHtml::ajaxLink("<i class='fa fa-mail-reply'></i> Send verification link", Yii::app()->createUrl('//admin/user/sentVerificationLink'), array(
//                    'cache' => true,
//                    'type' => 'POST',
//                    'data' => 'js:{value : $.fn.yiiGridView.getChecked("user-grid","actionCheck[]")}',
//                    "beforeSend" => 'js:function(){
//                        var ask = confirm("Are you sure to send?");
//                        if(ask==false){
//                            return false;
//                        }
//                    }',
//                    'success' => 'js:function(data){
//                        $.fn.yiiGridView.update("user-grid");
//                        //$.fn.yiiGridView({ "ajaxUpdate":["temp-orders-grid"]  });
//                        data = $.parseJSON (data);
//                        if(data.msg=="success"){
//                            alert(data.totalOrders + " verification mail sent to users.");
//                        }else if(data.msg=="error"){
//                            alert("Error occured !!!");
//                        }
//                    }',
//                    'error' => 'js:function(data){
//                        $("#showoverlay").removeClass("overlay");
//                        alert("Problem occured !!!");
//                        //alert(JSON.stringify(data));
//                        //alert("e"+data.msg);
//                    }',
//                    ), array('class' => 'btn btn-sm', 'style' => 'background-color:lightblue; color:black; font-weight:normal;', 'id' => 'sentverificationlink' . uniqid()));
//                echo '&nbsp;';
                
                
                
//                echo CHtml::ajaxLink("<i class='fa fa-ban'></i> Block", Yii::app()->createUrl('//admin/user/block'), array(
//                    'cache' => true,
//                    'type' => 'POST',
//                    'data' => 'js:{value : $.fn.yiiGridView.getChecked("user-grid","actionCheck[]")}',
//                    "beforeSend" => 'js:function(){
//                        var ask = confirm("Are you sure to block?");
//                        if(ask==false){
//                            return false;
//                        }
//                    }',
//                    'success' => 'js:function(data){
//                        $.fn.yiiGridView.update("user-grid");
//                        data = $.parseJSON (data);
//                        if(data.msg=="success"){
//                            alert(data.totalOrders + " users blocked.");
//                        }else if(data.msg=="error"){
//                            alert("1Error occured !!!");
//                        }
//                    }',
//                    'error' => 'js:function(data){
//                        //data = $.parseJSON (data);
//                        
//                        alert("Problem occured !!!");
//                        alert(JSON.stringify(data));
//                        //alert("e"+data.msg);
//                    }',
//                    ), array('class' => 'btn btn-sm', 'style' => 'background-color:red; color:white; font-weight:normal;', 'id' => 'block' . uniqid()));
//                echo '&nbsp;';
                
                
                
//                echo CHtml::ajaxLink("<i class='fa fa-check-circle'></i> Active", Yii::app()->createUrl('//admin/user/active'), array(
//                    'cache' => true,
//                    'type' => 'POST',
//                    'data' => 'js:{value : $.fn.yiiGridView.getChecked("user-grid","actionCheck[]")}',
//                    "beforeSend" => 'js:function(){
//                        var ask = confirm("Are you sure to active?");
//                        if(ask==false){
//                            return false;
//                        }
//                    }',
//                    'success' => 'js:function(data){
//                        $.fn.yiiGridView.update("user-grid");
//                        data = $.parseJSON (data);
//                        if(data.msg=="success"){
//                            alert(data.totalOrders + " users activated.");
//                        }else if(data.msg=="error"){
//                            alert("1Error occured !!!");
//                        }
//                    }',
//                    'error' => 'js:function(data){
//                        //data = $.parseJSON (data);
//                        
//                        alert("Problem occured !!!");
//                        alert(JSON.stringify(data));
//                        //alert("e"+data.msg);
//                    }',
//                    ), array('class' => 'btn btn-sm', 'style' => 'background-color:green; color:white; font-weight:normal;', 'id' => 'active' . uniqid()));
//                ?>
<!--                <br><br>-->
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'user-grid',
                    'htmlOptions' => array('class' => 'table-responsive'),
                    'itemsCssClass' => 'table table-hover',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'value' => '$data->id',
                            'selectableRows' => '2',
                            'id' => 'actionCheck'
                        ),
                        array(
                            'class' => 'IndexColumn',
                            'header' => 'Sl',
                            'headerHtmlOptions' => array('style' => 'width:20px;'),
                        ),
                        
                        array(
                            'name' => 'first_name',
                        ),
                        
                        array(
                            'name' => 'last_name',
                        ),
                        
                        array(
                            'name' => 'email',
                        ),
                        array(
                            'name' => 'role',
                            'filter' => Chtml::dropDownList("User[role]", $model->role, array('1' => 'Admin', '2' => 'Sub Editor'), array('empty' => 'Select Any')),
                            'value' => 'Roles::model()->findByPk($data->role)->name',
                        ),
//                        array(
//                            'name' => 'email_verified',
//                            'filter' => Chtml::dropDownList("User[email_verified]", $model->email_verified, array('0' => 'No', '1' => 'Yes'), array('empty' => 'Verificaion Status')),
//                            'value' => '($data->email_verified=="0")?"No":"Yes"',
//                        ),
                        array(
                            'name' => 'active',
                            'filter' => Chtml::dropDownList("User[active]", $model->active, array('1' => 'Active', '2' => 'In Active'), array('empty' => 'Select Any')),
                            'value' => '($data->active=="2")?"In Active":"Active"',
                        ),
                        
                         array(
                            'name' => 'lastLogin',
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{update}',
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>
