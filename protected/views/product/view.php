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

                        <div class="carouselContainer leftDisabled"> <span class="leftArrow arrow"><<</span> <span class="rightArrow arrow">>></span>
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
                    <div class="title-wrap line fk-font-family-museo section omniture-field">
                        <h1 class="title" itemprop="name"><?php echo $model->name ?></h1>
                    </div>

                    <!-- start rating and review-->
                    <div class="toolbar-wrap line section">
                        <div class="ratings-reviews-wrap">
                            <div class="ratings-reviews line omniture-field">
                                <div class="ratings">
                                    <div title="<?php echo $data['rating']->rating_score ?> stars" class="fk-stars">
                                        <span class="unfilled">★★★★★</span>
                                        <span style="width:<?php echo $data['rating_percent'] ?>%" class="rating filled">
                                            ★★★★★
                                        </span>
                                    </div>

                                    <div class="count">
                                        <span itemprop="ratingCount"><?php echo $data['rating']->rating_score ?></span>
                                    </div>
                                </div>

                                <div class="reviews">
                                    <a href="#" class="review">
                                        <span itemprop="reviewCount"><?php echo ($data['rating']->id > 0) ? $data['rating']->id : 0 ?></span>
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
                                        <a data-product-id="<?php echo $model->id ?>" data-ref-url="<?php echo $this->createUrl('//product/rating/' . $model->id) ?>" href="<?php echo $this->createUrl('//product/rating/' . $model->id) ?>" class="write-review <?php echo (Yii::app()->user->isGuest) ? 'guest-user' : 'logged-user'; ?>">
                                            Write a REVIEW
                                        </a>
                                    </li>

                                    <li class="add-to-wishlists size1of3 fk-position-relative">
                                        <span style="font-size:16px;color:black; float: left;padding-top:8px"><i class="fa fa-heart"></i></span>
                                        <a data-product-id="<?php echo $model->id ?>" data-ref-url="<?php echo $model->makeLink($model->id) ?>" href="#" class="add-to-wishlist <?php echo (Yii::app()->user->isGuest) ? 'guest-user' : 'logged-user'; ?>">
                                            Add to WISHLIST
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End rating and review -->


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
<!----------------------------------------------new product scroll start---------------------------------------------->
<script type="text/javascript+fk-onload">
    require_module.js("carousel", function () {
    $(".require-nav-carousel").each(function () {
    var $this = $(this);
    var params = {
    content: $('.ccarousel', $this),
    buttonOverlap: true
    };
    var parsed_params = $this.data();
    $.extend(params, parsed_params);

    var navCarousel = new FKART.ui.Carousel(params);

    navCarousel.init();
    $this.removeClass("require-nav-carousel");
    });
    });
</script>


<?php $this->renderPartial('productAlsoViewed',array('data'=>$data));?>


<!----------------------------------------------new product scroll end---------------------------------------------->
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


<!----------------------------------------------star product scroll start---------------------------------------------->
<div class="gd-row">
    <div class="gd-col gu16">
        <div data-pid="KTAEFJBUPGBGCYJH" class="reviewSection">
            <h3 class="sectionTitle">Reviews of <?php echo $model->name ?></h3>
            <div class="gd-row">
                <div class="gd-col gu6">
                    <div class="ratingHistogram">
                        <div class="avgWrapper">
                            <div class="bigStar"><?php echo ($data['rating']->rating_score != '') ? $data['rating']->rating_score : 0; ?></div>
                            <p class="subText">Average Rating</p>
                            <p class="subText">
                                Based on <?php echo ($data['rating']->id > 0) ? $data['rating']->id : 0 ?>&nbsp;
                                ratings
                            </p>
                        </div>
                        <div class="ratingDistributionWrapper">
                            <ul class="ratingsDistribution">
                                <li>
                                    <a title="Read 5 star reviews" href="#">
                                        <span>5 star</span>
                                        <div class="bar">
                                            <?php echo Products::model()->getIndividualRating($model->id, 5) ?>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a title="Read 4 star reviews" href="#">
                                        <span>4 star</span>
                                        <div class="bar">
                                            <?php echo Products::model()->getIndividualRating($model->id, 4) ?>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a title="Read 3 star reviews" href="#">
                                        <span>3 star</span>
                                        <div class="bar">
                                            <?php echo Products::model()->getIndividualRating($model->id, 3) ?>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a title="Read 2 star reviews" href="#">
                                        <span>2 star</span>
                                        <div class="bar">
                                            <?php echo Products::model()->getIndividualRating($model->id, 2) ?>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a title="Read 1 star reviews" href="#">
                                        <span>1 star</span>
                                        <div class="bar">
                                            <?php echo Products::model()->getIndividualRating($model->id, 1) ?>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearFloat"></div>
                    </div>
                </div>
                <div class="gd-col gu6">&nbsp;</div>
                <div class="gd-col gu4">
                    <div class="askReview">
                        <p class="askRatingMessage">Have you used this product?</p>
                        <p class="subText">Rate it now.</p>
                        <div class="ratingInputWrapper"><div class="ratingInput">
                                <ul data-rating-location="ProductPage" stars="0" data-rating-count="2" class="fk-give-star">
                                    <li style="width:0%" class="user-rating"></li>
                                    <input type="hidden" class="rating" name="rating" value="0">
                                    <li><a class="star-1 login-required" title="Rate this 1 star out of 5">1</a></li>
                                    <li><a class="stars-2 login-required" title="Rate this 2 stars out of 5">2</a></li>
                                    <li><a class="stars-3 login-required" title="Rate this 3 stars out of 5">3</a></li>
                                    <li><a class="stars-4 login-required" title="Rate this 4 stars out of 5">4</a></li>
                                    <li><a class="stars-5 login-required" title="Rate this 5 stars out of 5">5</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="ratings">
                            <div title="<?php echo $data['rating']->rating_score ?> stars" class="fk-stars" style="font-size:25px">
                                <span class="unfilled">★★★★★</span>
                                <span style="width:<?php echo $data['rating_percent'] ?>%" class="rating filled">★★★★★</span>
                            </div>
                        </div>

                        <div class="reviews">
                            <a data-product-id="<?php echo $model->id ?>" data-ref-url="<?php echo $this->createUrl('//product/rating/' . $model->id) ?>" href="<?php echo $this->createUrl('//product/rating/' . $model->id) ?>" class="write-review <?php echo (Yii::app()->user->isGuest) ? 'guest-user' : 'logged-user'; ?>">
                                <span itemprop="reviewCount"><?php echo ($data['rating']->id > 0) ? $data['rating']->id : 0 ?></span> Reviews, Write a Review
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reviewsList"></div>
        </div>

    </div>
</div>
<!----------------------------------------------star product scroll start---------------------------------------------->

<!-----------------new bottom product scroll start------------------>
<?php $this->renderPartial('recent_view_n_recommendation',array('data'=>$data,'model'=>$model))?>
<!-----------------new bottom product scroll end-------------------->

<script>
    $('.add-to-wishlist').click(function (e) {
        e.preventDefault();
        if ($(this).hasClass('guest-user')) {
            var refurl = $(this).attr('data-ref-url');
            $('input[name="ref_url"]').val(refurl);
            $('.login-click').trigger('click');
        } else {
            var productId = $(this).attr('data-product-id');
            $.post("<?php echo $this->createUrl('addToWishList') ?>", {id: productId}, function (data) {
                data = JSON.parse(data);
                alert(data.msg);
                //alert(data);
            });
        }
    });

    $('.write-review').click(function () {
        if ($(this).hasClass('guest-user')) {
            var refurl = $(this).attr('data-ref-url');
            $('input[name="ref_url"]').val(refurl);
            $('.login-click').trigger('click');
            return false;
        } else {
            return true;
        }
    });

    $('#addtocartbutton').click(function (e) {
        e.preventDefault();
        //var pid = $('input[name="product-id"]').val();
        var errors = false;
        $('.option-product').each(function(){
            if($(this).hasClass('required') && $(this).val().trim()==''){
                errors = true;
                $(this).next('.error').show();
            }
        });
        
        if(errors===false){
            $.post('<?php echo Yii::app()->createUrl('//cart/add'); ?>', $('#addtocart').serialize(), function (data) {
                if (data == '1') {
                    $('.product_add_success').html('Product successfully added into cart');
                    $('.product_add_success').show();
                    $.post("<?php echo Yii::app()->createUrl('//cart/countItems') ?>", {}, function (data) {
                        $("#item_count_in_cart_top_displayed").html(data);
                    });
                }
            });
        }
        
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