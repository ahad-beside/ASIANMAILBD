<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Menu</h2></div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Menu
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $this->renderPartial('_form', array('model' => $model)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Menu
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Sl.</td>
                                    <td>Name</td>
                                    <td>Position</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        $menus = Menu::model()->findAll("parent is Null and status='1' order by sort_order");
                        $i=0;
                        foreach($menus as $menu): $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $menu->name?></td>
                                    <td><?php echo $menu->position?></td>
                                    <td>
                                        <a href="<?php echo Yii::app()->createUrl('//admin/menu/del',array('id'=>$menu->id))?>"><i class="fa fa-minus-circle"></i></a>
                                        <a href="<?php echo Yii::app()->createUrl('//admin/menu/update',array('id'=>$menu->id))?>"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php
                                echo Menu::model()->showChildMenu($menu->id,1);
                        endforeach;
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>