<?php /*?><div class="top_head">
	<div class="container">
    	<div class="">
    	
        <div class="col-md-5">
        			<div style="padding-top:6px; float:right;">
					<?= Yii::app()->easycode->ShowBanglaDate(date('l, d F Y')) ?>
                        <?php
                            Yii::import('application.vendors.EasyBanglaDate.*');
                            use EasyBanglaDate\Types\BnDateTime;
                            use EasyBanglaDate\Types\DateTime;
                            require_once 'autoload.php';
                            $bndate = new BnDateTime('now', new DateTimeZone('Asia/Dhaka'));
                            echo $bndate->format('l, jS F Y');
                        ?>
                        </div>
                        
        </div>
        
       
       </div> 
    </div>
</div><?php */?>
<div class="logo_bg">
<div class="container">
    <div class=""> 
            <div class="col-sm-3">
                <div class="logo" style="padding-top:8px;">
                    <a href="<?= Yii::app()->homeUrl ?>"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/logo.png" alt="asianmailbd" height="110"></a>
                </div>
                
                <div class="online_news">Online Newspaper</div>
                
            </div>
            <div class="col-sm-5">
            	<div style="text-align:center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/asian_mail.png" alt="asianmailbd"></div>
               <?php /*?><div class="head_ad"><img src="<?php echo Yii::app()->baseUrl ?>/images/head_ad.jpg" /><?= Advertisement::model()->getAdvertisement('Header F', 1)?></div><?php */?>
            </div>
            
            <div class="col-md-4">
            	
                <div id="clock1"></div>
               
                
                <div class="date">
                	<div style="padding-top:6px; float:right; color:#FFF; font-size:14px;">
					<?= Yii::app()->easycode->ShowBanglaDate(date('l, d F Y')) ?>
                        <?php
                            Yii::import('application.vendors.EasyBanglaDate.*');
                            use EasyBanglaDate\Types\BnDateTime;
                            use EasyBanglaDate\Types\DateTime;
                            require_once 'autoload.php';
                            $bndate = new BnDateTime('now', new DateTimeZone('Asia/Dhaka'));
                            echo $bndate->format('l, jS F Y');
                        ?>
                        </div>
                </div>
                
                <div class="domain">
                	asianmailbd.com
                </div>
                
                
            </div>
            
    </div>
</div>
</div>

<div class="menu_bg">
	<div class="container">
    	
   

 <?php
    $topMenu = Menu::model()->findAll("position='Top' and parent is Null and status='1' order by sort_order limit 20");
    if (count($topMenu) > 0):
        ?>
        <div class="">
        	<div class="col-md-12">
            	<div class="unhide">
            <nav class="navbar navbar-default">
                <div class="">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--<a class="navbar-brand" href="#">Brand</a>-->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav">
                            <li><a href="<?= Yii::app()->homeUrl ?>"><i class="fa fa-home"></i></a></li>
                            <?php
                            foreach ($topMenu as $parent):
                                $child = Menu::model()->findAll("position='Top' and parent='" . $parent->id . "' and status='1' order by sort_order");
                                $childNav = '';
                                if (count($child) > 0) {
                                    $caret = ' <span class="caret"></span>';
                                    $xtraAttr = 'class="dropdown-toggle"';
                                    $childNav .= '<ul class="dropdown-menu" role="menu">';
                                    foreach ($child as $childItems):
                                        $childNav .= '<li><a href="' . Menu::model()->makeLink($childItems->id) . '">' . $childItems->name . ' </a></li>';
                                    
                                    
                                    endforeach;
                                    $childNav .= '</ul>';
                                }else {
                                    $caret = '';
                                    $xtraAttr = '';
                                }
                                ?>
                                <li class="dropdown">
                                    <a href="<?= Menu::model()->makeLink($parent->id) ?>" <?= $xtraAttr ?>><?= $parent->name . $caret ?> </a>
                                    <?= $childNav ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div>

<div class="news_scroll" style="margin-top:0px;">
	<div class="container">
    	<div class="col-md-12">
        	<?php include_once 'newsTicker.php'; ?>
        </div>
    </div>
</div>