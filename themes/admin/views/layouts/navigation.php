<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('//admin/')?>"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.png" height="40"/></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo Yii::app()->createUrl('//admin/user/changePassword') ?>"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo Yii::app()->createUrl('//site/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            <?php
            $this->widget('zii.widgets.CMenu', array(
                'htmlOptions' => array(
                    'class' => 'nav',
                ),
                'activeCssClass' => 'active',
                'encodeLabel' => false,
                'id' => 'side-menu',
                'items' => array(
                    array('label' => '<i class="fa fa-dashboard fa-fw"></i> Dashboard', 'url' => array('//admin/dashboard/index'), 'active' => Yii::app()->easycode->isActive(array('dashboard/'), $this->module, $this->id, $this->action->id)),
                    
                    array('label' => '<i class="fa fa-puzzle-piece fa-fw"></i> Post '.Post::model()->countInactivePost(), 'url' => array('//admin/post/index'), 'active' => Yii::app()->easycode->isActive(array('post/'), $this->module, $this->id, $this->action->id)),
                    
                    array('label' => '<i class="fa fa-bar-chart-o fa-fw"></i> Slider<span class="fa arrow">', 'url' => array('#'), 'items' => array(
                            array('label' => 'Image Slider', 'url' => array('//admin/slideshow/adminImageSlide')),
                            array('label' => 'Photo Gallary', 'url' => array('//admin/slideshow/adminCategorySlide')),
                        ),
                        'visible'=>(Yii::app()->user->roles=='Admin')?true:false,
                        'submenuOptions' => array('class' => 'nav nav-second-level')),
                    
                    array('label' => '<i class="fa fa-puzzle-piece fa-fw"></i> Advertisement', 'url' => array('//admin/advertisement/index'), 'active' => Yii::app()->easycode->isActive(array('advertisement/'), $this->module, $this->id, $this->action->id), 'visible'=>(Yii::app()->user->roles=='Admin')?true:false,),
                    
                    array('label' => '<i class="fa fa-puzzle-piece fa-fw"></i> Page', 'url' => array('//admin/page/index'), 'active' => Yii::app()->easycode->isActive(array('page/'), $this->module, $this->id, $this->action->id), 'visible'=>(Yii::app()->user->roles=='Admin')?true:false,),
                    
                    array('label' => '<i class="fa fa-puzzle-piece fa-fw"></i> Poll', 'url' => array('//admin/poll/index'), 'active' => Yii::app()->easycode->isActive(array('poll/'), $this->module, $this->id, $this->action->id), 'visible'=>(Yii::app()->user->roles=='Admin')?true:false,),
                    
                    array('label' => '<i class="fa fa-cogs fa-fw"></i> Settings<span class="fa arrow">', 'url' => array('#'), 'items' => array(
                        array('label' => '<i class="fa fa-puzzle-piece fa-fw"></i> Site', 'url' => array('//admin/settings/index'), 'active' => Yii::app()->easycode->isActive(array('settings/'), $this->module, $this->id, $this->action->id)),
                            array('label' => '<i class="fa fa-puzzle-piece fa-fw"></i> Users', 'url' => array('//admin/user/index'), 'active' => Yii::app()->easycode->isActive(array('user/'), $this->module, $this->id, $this->action->id)),
                            array('label' => '<i class="fa fa-puzzle-piece fa-fw"></i> Menu', 'url' => array('//admin/menu/index'), 'active' => Yii::app()->easycode->isActive(array('menu/'), $this->module, $this->id, $this->action->id)),
                            array('label' => '<i class="fa fa-bars fa-fw"></i> Category', 'url' => array('//admin/category/index'), 'active' => Yii::app()->easycode->isActive(array('category/'), $this->module, $this->id, $this->action->id)),
                        ), 
                        'submenuOptions' => array('class' => 'nav nav-second-level'), 'visible'=>(Yii::app()->user->roles=='Admin')?true:false,),                   
                ),
            ));
            ?>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>