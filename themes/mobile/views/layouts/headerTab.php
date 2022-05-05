<div class="headerbg">
    <div class="container">
        <div class="logo">
            <a href="<?= Yii::app()->createUrl('//mobile') ?>"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/logo.png" class="img-logo" alt="Eibela.com" ></a>
        </div>
        <div class="weather">
            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/weather.jpg">
            <div id="weather"></div>

        </div>
    </div>
</div>

<div class="menubg" style="background-color:#be241b;">
    <div class="container"  style="background-color:#be241b;">
        <div class="datetime">
            <?= Yii::app()->easycode->ShowBanglaDate(date('l d F, Y')) ?>
        </div>

        <div class="topmenu menua"  data-toggle="collapse" data-target=".nav-collapse">
            <a class="coderbtn">
                Menu<i aria-hidden="true" class="fa fa-bars"></i>
            </a>
            <!-- /.nav-collapse -->
        </div>
    </div><!-- /.container -->
</div>

<div class="nav-collapse collapse">
    <?php
    $topMenu = Menu::model()->findAll("position='Mobile' and parent is Null and status='1' order by sort_order limit 20");
    if (count($topMenu) > 0):
        ?>
        <div id='cssmenu'>
            <ul>
                <?php
                foreach ($topMenu as $parent):
                    $child = Menu::model()->findAll("position='Mobile' and parent='" . $parent->id . "' and status='1' order by sort_order");
                    $childNav = '';
                    if (count($child) > 0) {
                        $caret = ' <span class="caret"></span>';
                        $xtraAttr = 'class="dropdown-toggle"';
                        $childNav .= '<ul>';
                        foreach ($child as $childItems):
                            $childNav .= '<li><a href="' . Menu::model()->makemobileLink($childItems->id) . '">' . $childItems->name . ' </a></li>';


                        endforeach;
                        $childNav .= '</ul>';

                        echo "<li class='has-sub'>";
                    }else {
//                                    $caret = '';
//                                    $xtraAttr = '';
                        echo "<li>";
                    }
                    ?>

                    <a href="<?= Menu::model()->makemobileLink($parent->id) ?>"><?php echo $parent->name ?> </a>
                    <?= $childNav ?>
                    </li>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </ul>
        </div>
    <?php endif; ?>
</div>



<div class="nav nav-tabs menu-bar" role="tablist">
    <ul>
        <li <?php if ($_GET['id'] != 11 and $_GET['id'] != 206) echo "class='active'" ?>   role="presentation"><a href="<?php echo Yii::app()->createUrl("/mobile/default/index"); ?>" aria-controls="home" >সর্বশেষ</a></li>
        <li <?php if ($_GET['id'] == 206) echo "class='active'" ?>   role="presentation"><a href="<?php echo Yii::app()->createUrl("/mobile/category/206/Top News"); ?>" aria-controls="home" >Top News</a></li>
        <li  <?php if ($_GET['id'] == 11) echo "class='active'" ?>  role="presentation"><a href="<?= Category::model()->makemobileLink(11) ?>" aria-controls="messages"   >স্পেশাল</a></li>
        
    </ul>
    <div class="clearfix"></div>
</div>