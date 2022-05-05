<div id="menu" class="panel" role="navigation">


    <div id="Date" class="date"></div>

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