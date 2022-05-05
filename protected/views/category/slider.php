<?php
$sliderCond='type="'.$sliderType.'" ';
if($sliderId!=0)
    $sliderCond .= ' and id="'.$sliderId.'" ';
if($additionalId!=0)
    $sliderCond .= ' and additional_id="'.$additionalId.'" ';
    
$getSliderInfo = Slideshow::model()->find($sliderCond);

$slider = SlideshowItems::model()->findAll('slideshow_id=:id', array(':id' => $getSliderInfo->id));
if (count($slider) > 0):
    ?>

    <script type="text/javascript">
    $(document).ready(function(){
        var timerId = null, timerEnabled=true, tabsArray = $(".banner-tab"), currentTab = 0, numOfTabs = tabsArray.length;
        var tabs = $(".big-banner").tabs({clickDisabled:false, fadeDuration:400}).data("tabs_instance");
        $(".big-banner").bind("tabChange", function(ev, tab){
            var $img = $("#"+tab.id+"-content").find("img");
            $img.attr("data-url") && $img.attr("src", $img.attr("data-url")).removeAttr("data-url");
        });
        $(".banner-tab").bind("mouseenter", function() {
            tabs.changeTab(this);
            timerId && clearTimeout(timerId) && (timerEnabled=false);
        });
            function cycleTabs() {
                if(timerEnabled){
                  currentTab++;
                  timerId = setTimeout(function(){
                      tabs.changeTab(tabsArray[currentTab%numOfTabs]);
                      cycleTabs();
                  }, 5000);
                }
            }
            function lazyfetch() {
               $(".big-banner").find("img[data-url]").each(function(){
                   $(this).attr("src",$(this).attr("data-url")).removeAttr("data-url");
               }).first().on("load", cycleTabs);
            }
            addWindowOnload(lazyfetch);
    });
    </script>


    <div class="fifth-slot-enabled big-banner fk-position-relative newvd">
        <div class="line big-banner-image">
            <?php
            $i=0;
            foreach ($slider as $slide):
                ?>
                <div class="banner-image tab-content <?php echo ($i!=0)?'fk-hidden':'';?>" id="b-tab<?php echo $i?>-content">
                    <a href="<?php echo ($slide->link!='')?$slide->link:'#';?>" data-tracking-id="banner_<?php echo $i?>_image">
                        <?php echo Yii::app()->easycode->showImage($slide->image,730,300)?>
                    </a>
                    <div class="banner-link fk-font-15"> </div>
                </div>
                <?php
                $i++;
            endforeach;
            ?>
        </div>
        <div class="line banner-tabs">
            <ul>
                <?php
                $i=0;
                foreach ($slider as $slide):
                ?>
                <li class="nav-list unit size1of<?php echo count($slider)?>">
                    <a href="#" id="b-tab<?php echo $i?>" class="banner-tab tab <?php echo ($i==0)?'first-tab selected':'';?>" data-tracking-id="banner_tab_<?php echo $i?>">
                        <span class="first-line fk-uppercase" title="<?php echo $slide->title?>"><?php echo $slide->title?></span>
                        <span class="second-line" title="<?php echo $slide->tag_line?>"><?php echo $slide->tag_line?></span>
                    </a>
                </li>
                <?php
                $i++;
                endforeach;
                ?>
            </ul>
        </div>
    </div>
<?php endif; ?>