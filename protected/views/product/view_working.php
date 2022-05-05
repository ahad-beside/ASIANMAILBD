<!----------------------------------------------products details start---------------------------------------------->
<div class="gd-row">
    <div class="gd-col gu16 top-section">

        <div class="product_add_success" style="width: 98%; padding:10px; margin:10px 0; float:left; background-color: lightgreen; font-size: 16px; text-align: center; display: none;"></div>

        <div class="left-col-wrap unit">
            <div class="left-col">
                <div class="productImages" data-ctrl="ProductImagesController">
                    <div class="innerPanel">
                        <div class="mainImage">
                            <div class="imgWrapper">
                                <?php if ($model->image != '') { ?>
                                    <img src="<?php echo Yii::app()->easycode->showimage($model->image, 400, 355, false) ?>" class="productImage  current" data-imageId="IMG<?php echo $rand = rand(1, 10) ?>" data-src="<?php echo Yii::app()->easycode->showimage($model->image, 400, 355, false) ?>" data-zoomImage="<?php echo Yii::app()->easycode->showimage($model->image, 800, 600, false, false) ?>"/>
                                <?php } ?>
                                <?php
                                $getMoreImg = ProductsImage::model()->findAll('product_id=:id', array(':id' => $model->id));
                                if (count($getMoreImg) > 0) {
                                    foreach ($getMoreImg as $exImg):
                                        ?>
                                        <img src="<?php echo Yii::app()->easycode->showimage($exImg->image, 400, 355, false) ?>" class="productImage " data-imageId="<?php echo 'IMG' . $exImg->id ?>" data-src="<?php echo Yii::app()->easycode->showimage($exImg->image, 400, 355, false) ?>" data-zoomImage="<?php echo Yii::app()->easycode->showimage($exImg->image, 800, 600, false, false) ?>"/>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </div>
                        </div>

                        <div class="carouselContainer rightDisabled"> <span class="leftArrow arrow"><<</span> <span class="rightArrow arrow">>></span>
                            <ul class="carousel rightDisabled">
                                <?php if ($model->image != '') { ?>
                                    <li>
                                        <div class="thumbContainer">
                                            <div class="thumb" style="background-image:url(<?php echo Yii::app()->easycode->showimage($model->image, 100, 100, false) ?>)" data-imageId="<?php echo 'IMG' . $rand ?>"> </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php
                                if (count($getMoreImg) > 0) {
                                    foreach ($getMoreImg as $exImg):
                                        ?>
                                        <li>
                                            <div class="thumbContainer">
                                                <div class="thumb" style="background-image:url(<?php echo Yii::app()->easycode->showimage($exImg->image, 100, 100, false) ?>)" data-imageId="<?php echo 'IMG' . $exImg->id ?>"> </div>
                                            </div>
                                        </li>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="productImageZoom"></div>
                </div>
            </div>
        </div>
        <div class="right-col-wrap lastUnit">
            <div class="right-col lpadding20 line">
                <div itemscope class="product-details line">
                    <!-- show product name-->
                    <div class="title-wrap line fk-font-family-museo section omniture-field">
                        <h1 class="title" itemprop="name"><?php echo $model->name ?></h1>
                    </div>
                    <!-- end product name -->
                    
                    <!-- start rating and review-->
                    <div class="toolbar-wrap line section">
                        <div class="ratings-reviews-wrap">
                            <div class="ratings-reviews line omniture-field">
                                <div class="ratings">
                                    <div title="3.6 stars" class="fk-stars">
                                        <span class="unfilled">★★★★★</span>
                                        <span style="width:72.2%" class="rating filled">
                                            ★★★★★
                                        </span>
                                    </div>

                                    <div class="count">
                                        <span itemprop="ratingCount">187</span>
                                    </div>
                                </div>

                                <div class="reviews">
                                    <a href="#" class="review">
                                        <span itemprop="reviewCount">72</span>
                                        Reviews
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ratings-reviews-actions-wrap">
                            <div class="rating-reviews-actions line">
                                <ul class="rating-reviews-action">
                                    <li class="write-reviews size1of3 fk-position-relative">
                                        <span style="font-size:16px;color:black; float: left;padding-top:8px"><i class="fa fa-edit"></i></span>
                                        <a href="<?php echo $this->createUrl('rating')?>" class="write-review">
                                             Write a REVIEW
                                        </a>
                                    </li>

                                    <li class="add-to-wishlists size1of3 fk-position-relative">
                                        <span style="font-size:16px;color:black; float: left;padding-top:8px"><i class="fa fa-heart"></i></span>
                                        <a data-product-id="#" href="#" class="add-to-wishlist">
                                           Add to WISHLIST
                                        </a>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End rating and review -->

                    <!--<div class="toolbar-wrap line section" data-ctrl="ActionBarController">
                        <div class="ratings-reviews-wrap"> </div>
                        <div class="ratings-reviews-actions-wrap">
                            <div class="rating-reviews-actions line">
                                <ul class="rating-reviews-action">
                                    <li class="write-reviews size1of3 fk-position-relative"> <a class="write-review" href="/lotto-antares-iii-running-shoes/write-review/itmdv9x7debwrgfk?pid=SHODV9UQCB2FH6WN"> <span class="write-a-review-text">Write a REVIEW</span> </a> </li>
                                    <li class="add-to-wishlists size1of3 fk-position-relative"> <a class="add-to-wishlist fk-js-addToWishlist login-required" href="javascript:void(0);"
                                                                                                   data-product-id="SHODV9UQCB2FH6WN"
                                                                                                   data-product-csrf="V26f9482c42b7bd74d9709eaefb320c336s2e32P2BpPz8/RX0/fz9sPz8/D9cJXc5x1V0V3aDKjoARMkyQiNlTollwT+V5Fy0Xbf9D97hG8NGKBPyORLb9njuw9/IHJYZu8PABmc+TIND4EeLEKPfzmFFuLFlqgFtCFaaDDswAh4eEwt16IkQmtOt6ddzFb7nFLPUZiNoytVvx0gaNL2uUIuHIzwXKE2qHdUjINIjbSGINYT2QV52pLYS65yaPb1wsna4TQB3/cygTaYe8lzxFB4AcV183JOPSF7ry8VCQu9V8Vx+hf3Xf9cJO4A=="
                                                                                                   onclick="FKART.Wishlist.add('SHODV9UQCB2FH6WN', this, 'prod', 'V26f9482c42b7bd74d9709eaefb320c336s2e32PwA/Pz9VPz8/P2A/P3E/P0aNTsFvt003MvgVJMrM2+cDHNS0SAHp9VMnsWu7/nUl2Ug4jD43HIMQvAclbc8hsJJbarYtmRnB1OgF4IzV0HzwOpSlWkpu3InW94AqFO5Ngll+qPAc7hviViDSrHQajFqnD7uEFOeiY2GgMtaCKg2nNOAC2z+REn6BSJaOkPW/f1W/KF44gs4n1FsOyowGRqzGskeoYDOywqYBekx4WWJ75qdeVW1y9S7a1GELvpLxwPhRIHXaEks4FdSuqgU3Cw==');"> <span class="add-to-wishlist-text">Add to WISHLIST</span> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="multiSelectionWrapper section line" data-ctrl="MultiSelectionController">
                        <div class="multiSelectionWidget unit size1of3">
                            <div class="multiSelectionWidget-title"> Select Color </div>
                            <div class="multiSelectionWidget-selectors-wrap"> <a href="/lotto-antares-iii-running-shoes/p/itmdv9x7vneb8htd?pid=SHODV9UQHGKJX2XP&&colorSelected=true" class="multiSelectionWidget-selector-link">
                                    <div class="multiSelectionWidget-selector selector-type-paletteImage selector-attr-color
                                         "
                                         title="Deep, Blue, Silver">
                                        <div class="selector-paletteImage"
                                             style="background-image:url(http://img.fkcdn.com/image/shoe/s/8/k/deep-blue-silver-antares-iii-lotto-10-20x20-imadvxg6swgd7d4k.jpeg);"

                                             data-image="http://img6a.flixcart.com/image/shoe/s/8/k/deep-blue-silver-antares-iii-lotto-10-400x400-imady4f4fupukydc.jpeg"
                                             data-selectorValue="Deep, Blue, Silver"> <span>Deep, Blue, Silver</span> </div>
                                    </div>
                                </a> <a href="/lotto-antares-iii-running-shoes/p/itmdwxrwacpqaaqk?pid=SHODWXRVKEGYRZ5S&&colorSelected=true" class="multiSelectionWidget-selector-link">
                                    <div class="multiSelectionWidget-selector selector-type-paletteImage selector-attr-color
                                         "
                                         title="Metallic Silver, Black">
                                        <div class="selector-paletteImage"
                                             style="background-image:url(http://img.fkcdn.com/image/shoe/j/d/g/met-silver-black-antares-iii-lotto-10-20x20-imadxzjtrygbbkda.jpeg);"

                                             data-image="http://img6a.flixcart.com/image/shoe/j/d/g/met-silver-black-antares-iii-lotto-10-400x400-imadxzjtggzwvthy.jpeg"
                                             data-selectorValue="Metallic Silver, Black"> <span>Metallic Silver, Black</span> </div>
                                    </div>
                                </a>
                                <div class="multiSelectionWidget-selector selector-type-paletteImage selector-attr-color
                                     current selected"
                                     title="White, Deusche Blue">
                                    <div class="selector-paletteImage"
                                         style="background-image:url(http://img.fkcdn.com/image/shoe/f/t/b/white-deusche-blue-antares-iii-lotto-9-20x20-imadvxg6hanj97mv.jpeg);"

                                         data-image="http://img6a.flixcart.com/image/shoe/f/t/b/white-deusche-blue-antares-iii-lotto-9-400x400-imadvxg8wjar4kjj.jpeg"
                                         data-selectorValue="White, Deusche Blue"> <span>White, Deusche Blue</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="multiSelectionWidget unit size1of3">
                            <div class="multiSelectionWidget-title"> Select Size
                                &nbsp;(UK/India) </div>
                            <div class="multiSelectionWidget-selectors-wrap">
                                <div class="multiSelectionWidget-selector selector-type-boxes selector-disabled">
                                    <div class="selector-boxes"
                                         data-selectorValue="6"> <span>6</span> </div>
                                </div>
                                <div class="multiSelectionWidget-selector selector-type-boxes selector-attr-size
                                     current selected"
                                     >
                                    <div class="selector-boxes"
                                         data-selectorValue="7"> <span>7</span> </div>
                                </div>
                                <a href="/lotto-antares-iii-running-shoes/p/itmdv9x7debwrgfk?pid=SHODV9UQHPUSKFTB&&sizeSelected=true" class="multiSelectionWidget-selector-link">
                                    <div class="multiSelectionWidget-selector selector-type-boxes selector-attr-size
                                         "
                                         >
                                        <div class="selector-boxes"
                                             data-selectorValue="8"> <span>8</span> </div>
                                    </div>
                                    <div class="fk-hidden product-sizes">
                                        <table class="tooltip-sizes">
                                            <tr>
                                                <td>US</td>
                                                <td>9</td>
                                            </tr>
                                            <tr>
                                                <td>EURO</td>
                                                <td>42</td>
                                            </tr>
                                            <tr>
                                                <td>LENGTH (IN CMS)</td>
                                                <td>26.5</td>
                                            </tr>
                                            <tr class="pop-title">
                                                <td>UK/INDIA</td>
                                                <td>8</td>
                                            </tr>
                                        </table>
                                    </div>
                                </a> <a href="/lotto-antares-iii-running-shoes/p/itmdv9x7debwrgfk?pid=SHODV9UQFGSZPTXJ&&sizeSelected=true" class="multiSelectionWidget-selector-link">
                                    <div class="multiSelectionWidget-selector selector-type-boxes selector-attr-size
                                         "
                                         >
                                        <div class="selector-boxes"
                                             data-selectorValue="9"> <span>9</span> </div>
                                    </div>
                                    <div class="fk-hidden product-sizes">
                                        <table class="tooltip-sizes">
                                            <tr>
                                                <td>US</td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>EURO</td>
                                                <td>43</td>
                                            </tr>
                                            <tr>
                                                <td>LENGTH (IN CMS)</td>
                                                <td>27.5</td>
                                            </tr>
                                            <tr class="pop-title">
                                                <td>UK/INDIA</td>
                                                <td>9</td>
                                            </tr>
                                        </table>
                                    </div>
                                </a> <a href="/lotto-antares-iii-running-shoes/p/itmdv9x7debwrgfk?pid=SHODV9UQAMG9ZRCX&&sizeSelected=true" class="multiSelectionWidget-selector-link">
                                    <div class="multiSelectionWidget-selector selector-type-boxes selector-attr-size
                                         "
                                         >
                                        <div class="selector-boxes"
                                             data-selectorValue="10"> <span>10</span> </div>
                                    </div>
                                    <div class="fk-hidden product-sizes">
                                        <table class="tooltip-sizes">
                                            <tr>
                                                <td>US</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>EURO</td>
                                                <td>44</td>
                                            </tr>
                                            <tr>
                                                <td>LENGTH (IN CMS)</td>
                                                <td>28</td>
                                            </tr>
                                            <tr class="pop-title">
                                                <td>UK/INDIA</td>
                                                <td>10</td>
                                            </tr>
                                        </table>
                                    </div>
                                </a> <a href="/lotto-antares-iii-running-shoes/p/itmdv9x7debwrgfk?pid=SHODV9UQRHTSNSUF&&sizeSelected=true" class="multiSelectionWidget-selector-link">
                                    <div class="multiSelectionWidget-selector selector-type-boxes selector-attr-size
                                         "
                                         >
                                        <div class="selector-boxes"
                                             data-selectorValue="11"> <span>11</span> </div>
                                    </div>
                                    <div class="fk-hidden product-sizes">
                                        <table class="tooltip-sizes">
                                            <tr>
                                                <td>US</td>
                                                <td>12</td>
                                            </tr>
                                            <tr>
                                                <td>EURO</td>
                                                <td>45</td>
                                            </tr>
                                            <tr>
                                                <td>LENGTH (IN CMS)</td>
                                                <td>29</td>
                                            </tr>
                                            <tr class="pop-title">
                                                <td>UK/INDIA</td>
                                                <td>11</td>
                                            </tr>
                                        </table>
                                    </div>
                                </a> </div>
                            <div class="multiSelectionWidget-assistanceLink"> <a href="javascript: void(0);" class="fk-js-multiSelection sizechart-link" data-action="show-size-chart" title="See Size Chart"><span class="scale"></span>Size Chart</a> </div>
                        </div>
                        <div class="fk-chartLarge hidden sc-header" id="size-chart-header">
                            <div class="sc-prod-title"> Size Chart for Shoe </div>
                            <ul class="sc-tabs">
                                <li class="selected" data-target="sc-chart-table">Size Options</li>
                                <li data-target="sc-chart-guidelines">Measurement Guides</li>
                            </ul>
                        </div>
                        <div class="line hidden" id="size-chart-body-newpp">
                            <div class="unit sc-chart-body" style="width:570px;">
                                <div class="sc-content">
                                    <div class="sc-content-pane" id="sc-chart-table">
                                        <table class="sc-table">
                                            <tr class="title">
                                                <td width="50%">UK/India</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>US</td>
                                                <td> 7 </td>
                                                <td> 8 </td>
                                                <td> 9 </td>
                                                <td> 10 </td>
                                                <td> 11 </td>
                                                <td> 12 </td>
                                            </tr>
                                            <tr>
                                                <td>Euro</td>
                                                <td> 40 </td>
                                                <td> 41 </td>
                                                <td> 42 </td>
                                                <td> 43 </td>
                                                <td> 44 </td>
                                                <td> 45 </td>
                                            </tr>
                                            <tr>
                                                <td>Length (in cms)</td>
                                                <td> 25 </td>
                                                <td> 26 </td>
                                                <td> 26.5 </td>
                                                <td> 27.5 </td>
                                                <td> 28 </td>
                                                <td> 29 </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="guidelines sc-content-pane" id="sc-chart-guidelines" style="display:none;">
                                        <table>
                                            <tr>
                                                <td class='padding5'><strong>.</strong></td>
                                                <td class='padding5'>.</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="unit sc-image" style="width:280px;">
                                <div class="sc-silhouette"> <img src="http://img5a.flixcart.com/www/prod/images/sizechart/shoe-8ec9e675.jpg" width="280" onerror="$(this).closest('.sc-image').remove();$('.sc-chart-body').css('width', '850px');" /> </div>
                            </div>
                        </div>
                        <script type="text/javascript+fk-onload">
                            FKART.sizeChart = function(){
                            window.chart_dialog && window.chart_dialog.destroy();
                            window.chart_dialog = new FKART.ui.Dialog({
                            width: '870px',
                            body:$("#size-chart-body-newpp"),
                            header:$("#size-chart-header"),
                            showFooter: false,
                            cssClass:"size-chart-dialog"
                            });
                            $(".sc-tabs li").click(function() {
                            if(typeof $(this).attr('data-target') != "undefined") {
                            $('.sc-content-pane').hide();
                            $("#"+$(this).attr('data-target')).show();
                            $('.sc-tabs li').removeClass('selected');
                            $(this).addClass('selected');
                            }
                            });
                            return {

                            show:function(){
                            window.chart_dialog.show();
                            FKART.omni.customEvent("Size Chart", {'events':'event55'});
                            },
                            dialog:window.chart_dialog,
                            changeMeasurementUnit: function(unit) {
                            $(".sc-meas-cm, .sc-meas-inches").hide();
                            $(".sc-meas-"+unit).show();
                            }
                            }
                            }();
                            $(window.QW).bind('beforeShow', function() {
                            FKART.sizeChart.dialog.destroy();
                            });

                            (function(){
                            var tooltip;
                            $("#multiselection").on("mouseenter",".section-boxes a",function(){
                            var $this = $(this);
                            if($this.find(".product-sizes").length){
                            tooltip = new FKART.ui.Tooltip({
                            message: $this.find(".product-sizes").clone(),
                            showCloseIcon:false,
                            cssClass:"product-sizes qv-show-over dark-bottom",
                            nearElement:$this
                            });
                            tooltip.show();
                            }
                            }).on("mouseleave click",".section-boxes a",function(){
                            if($(this).find(".product-sizes").length){
                            tooltip.destroy();
                            }
                            });
                            })();
                        </script> 
                    </div>-->
                    <form action="#" id="addtocart">
                        <div class="shop-section-wrap" data-ctrl="ShopSectionController">
                            <div class="shop-section">
                                <div class="section-wrap line section">
                                    <div class="left-section-wrap size2of5 unit">
                                        <div class="left-section line">
                                            <div class="price-wrap">
                                                <div class="pricing line">
                                                    <div class="prices" itemprop="offers">
                                                        <?php
                                                        if ($data['discount']->price != '') {
                                                            $discount = $data['discount']->price;
                                                            $price = $discount;
                                                        } else {
                                                            $discount = 0;
                                                            $price = $model->price;
                                                        }
                                                        echo Products::model()->getPrice($model->price, $discount);
                                                        ?>
                                                        <input type="hidden" name="product-id" value="<?php echo $model->id ?>"/>
                                                        <input type="hidden" name="product-price" value="<?php echo $price ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="buy-now-wrap tmargin20">
                                                <div class="express-checkout-enabled">
                                                    <?php if ($model->outofstock_status == 'In Stock') { ?>
                                                        <div class="add-to-cart-container buy-now-hack-wrap omniture-field" data-omnifield="eVar14" data-eVar14="In Stock">
                                                            <input type="submit" class="btn-buy-now btn-big current" data-pid="<?php echo $model->id ?>" id="addtocartbutton" value="Add to Cart"/>
                                                        </div>
                                                        <div class="tmargin10 omniture-field" data-omnifield="eVar14" data-eVar14="In Stock">
                                                            <input type="submit" data-pid="<?php echo $model->id ?>" class="btn-express-checkout btn-big current" id="buynowbutton" value="Buy Now"/>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="tmargin10 omniture-field" data-omnifield="eVar14" data-eVar14="In Stock">
                                                            <span class="btn-big btn-express-checkout" style="padding:5px;">Out Of Stock</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="pp-trust-markers tmargin20">
                                                <div class="line">
                                                    <div class="trust-marker tpadding5 bpadding5"> <span class="logo returns fk-float-left"></span> <span class="text returns fk-font-13">Easy Returns</span> </div>
                                                    <div class="trust-marker tpadding5 bpadding5"> <span class="logo new fk-float-left"></span> <span class="text new fk-font-13">Brand New</span> </div>
                                                    <div class="trust-marker tpadding5 bpadding5"> <span class="logo original fk-float-left"></span> <span class="text original fk-font-13">100% Original</span> </div>
                                                    <div class="trust-marker tpadding5 bpadding5 logo"> <span class="logo secure fk-float-left"></span> <span class="text secure fk-font-13">Pay Securely</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-section-wrap size3of5 unit">
                                        <div class="right-section lpadding20 ">
                                            <?php
                                            if (count($data['options']) > 0) {
                                                foreach ($data['options'] as $options):
                                                    $this->renderPartial('options', array(
                                                        'options' => $options,
                                                    ));
                                                endforeach;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>






                    <span class="omniture-field" data-omnifield="eVar18" data-eVar18="WSR_Single_WSRetail_WSR-Active" data-omnievents="event59"></span> <span class="omniture-field omniture-ndd-sdd-tracking-status" data-omniField="eVar46" data-eVar46="Product"></span> <span class="omniture-field" data-omniField="eVar56" data-eVar56="Delivered in 2-3 business days."></span> </div>
            </div>
        </div>
    </div>
</div>
<!----------------------------------------------products details end---------------------------------------------->
<div class="clearfix">&nbsp;</div>
<div class="gd-row">
    <div class="gd-col gu12">
        <h2 style="padding:5px; width: 99%; background-color: #f2f2f2;">Description:</h2>
        <div class="clearfix">&nbsp;</div>
        <?php echo $model->description ?>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<?php if (count($data['attributes']) > 0) { ?>
    <div class="gd-row">
        <div class="gd-col gu12">
            <?php
            foreach ($data['attributes'] as $k => $attributes):
                ?>
                <table cellspacing="0" class="specTable">
                    <tr>
                        <th class="groupHead" colspan="2"><?php echo AttributeGroup::model()->findByPk($k)->name ?></th>
                    </tr>
                    <?php foreach ($attributes as $kk => $attr): ?>
                        <tr>
                            <td class="specsKey">
                                <?php echo $attr['attrName'] ?>
                            </td>
                            <td class="specsKey lasttd">
                                <?php echo $attr['attrText'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php
            endforeach;
            ?>
        </div>
    </div>
    <?php }
?>

<script>
    $('#addtocartbutton').click(function (e) {
        e.preventDefault();
        //var pid = $('input[name="product-id"]').val();
        $.post('<?php echo Yii::app()->createUrl('//cart/add'); ?>', $('#addtocart').serialize(), function (data) {
            if (data == '1') {
                $('.product_add_success').html('Product successfully added into cart');
                $('.product_add_success').show();
                $.post("<?php echo Yii::app()->createUrl('//cart/countItems') ?>", {}, function (data) {
                    $("#item_count_in_cart_top_displayed").html(data);
                });
            }
        });
    });
    $('#buynowbutton').click(function (e) {
        e.preventDefault();
        //var pid = $('input[name="product-id"]').val();
        $.post('<?php echo Yii::app()->createUrl('//cart/add'); ?>', $('#addtocart').serialize(), function (data) {
            if (data == '1') {
                $('.product_add_success').html('Product successfully added into cart');
                $('.product_add_success').show();
                window.location = '<?php echo $this->createUrl('//cart/order'); ?>';
            }
        });
    });

</script>