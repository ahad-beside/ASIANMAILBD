<div class="gd-row">
    <div class="gd-col gu4">
        <div data-removeonerror="true" data-autoload="true" data-animatedload="false" data-buttonsonside="false" data-columnsperslide="1" data-columns="1" class="fk-ui-ccarousel-supercontainer same-vreco-section reco-carousel-border-top">
            <span class="fk-ui-ccarousel-title section-title fk-uppercase fk-font-15 fk-bold" style="margin-top: 2px">YOU RECENTLY VIEWED</span>
            <div class="bpadding5 fk-ui-ccarousel-border">
                <div class="fk-ui-ccarousel-container ">
                    <div class="ccarousel-clip">
                        <div class="ccarousel-wrapper" style="width: 234px;">
                            <ul class="ccarousel">
                                <li data-category="" class="ccarousel-item" style="width: 234px;">
                                    <?php
                                    if (is_array($data['recentViewed']) && count($data['recentViewed']) > 0) {
                                        foreach ($data['recentViewed'] as $pid):
                                            $productInfo = Products::model()->findByPk($pid);
                                            $name = $productInfo->name;
                                            $url = Products::model()->makeLink($pid);
                                            $image = Yii::app()->easycode->showimage($productInfo->image, 42, 75);
                                            $rating = Products::model()->getProductRating($pid);
                                            $ratingPercent = number_format(($rating->rating_score / 5) * 100);
                                            $discountPrice = ProductsDiscount::model()->find('product_id=:id and now() between from_date and to_date', array(':id' => (int) $pid));
                                            if ($discountPrice->price != '') {
                                                $discount = $discountPrice->price;
                                                $price = $discount;
                                            } else {
                                                $discount = 0;
                                                $price = $model->price;
                                            }
                                            $productPrice = Products::model()->getPrice($productInfo->price, $discount);
                                            ?>
                                            <div class=" item-pp-carousel carousel-item">
                                                <div class="module-item line recom-mini-item">
                                                    <div class="unit fks-list-image fksks-list-image rposition small">
                                                        <a title="<?php echo $name ?>" href="<?php echo $url ?>" class="image-wrapper urlTracker">
                                                            <?php echo $image ?>
                                                        </a>
                                                    </div>
                                                    <div class="lastUnit">
                                                        <div class="fk-extramargin">
                                                            <a title="<?php echo $name ?>" class="urlTracker" href="<?php echo $url ?>">
                                                                <div class="fk-two-line-title fks-bs-title"><?php echo $name ?></div>
                                                            </a>
                                                            <div class="fks-add-details">
                                                                <div class="line">
                                                                    <div class="unit fks-subadd tpadding4">
                                                                        <div class="line">
                                                                            <div title="0 stars" class="fk-stars-small">
                                                                                <div class="ratings">
                                                                                    <div class="fk-stars" title="<?php echo $rating->rating_score ?> stars">
                                                                                        <span class="unfilled">★★★★★</span>
                                                                                        <span class="rating filled" style="width:<?php echo $ratingPercent ?>%">★★★★★</span>
                                                                                    </div>
                                                                                    <div class="count">
                                                                                        <span itemprop="ratingCount"><?php echo $rating->rating_score ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fk-price line rpadding3">
                                                                            <?php echo $productPrice ?>
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endforeach;
                                    }
                                    ?>
                                </li> 	
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gd-col gu12">
        <div class="fk-ui-ccarousel-supercontainer same-vreco-section reco-carousel-border-top">
            <span class="fk-ui-ccarousel-title section-title fk-uppercase fk-font-15 fk-bold" style="margin-top: 2px">RECOMMENDATIONS BASED ON YOUR BROWSING HISTORY</span>
            <div class="fk-ui-ccarousel-container ">
                <div class="require-nav-carousel" data-columns="5" data-buttonsonside="false">
                    <ul class="ccarousel nojs">
                        <?php
                        if (is_array($data['recommendedProducts']) && count($data['recommendedProducts']) > 0) {
                            foreach ($data['recommendedProducts'] as $pid):
                                $productInfo = Products::model()->findByPk($pid);
                                $name = $productInfo->name;
                                $url = Products::model()->makeLink($pid);
                                $image = Yii::app()->easycode->showimage($productInfo->image, 120, 80);
                                $rating = Products::model()->getProductRating($pid);
                                $ratingPercent = number_format(($rating->rating_score / 5) * 100);

                                $discountPrice = ProductsDiscount::model()->find('product_id=:id and now() between from_date and to_date', array(':id' => (int) $pid));
                                if ($discountPrice->price != '') {
                                    $discount = $discountPrice->price;
                                    $price = $discount;
                                } else {
                                    $discount = 0;
                                    $price = $model->price;
                                }
                                $productPrice = Products::model()->getPrice($productInfo->price, $discount);
                                ?>
                                <li class="ccarousel-item ">
                                    <div class="product-unit unit-4  browse-product">
                                        <div class="pu-visual-section"> <a data-tracking-id="prd_img" class="pu-image fk-product-thumb" href="<?php echo $url ?>" style="margin-left: 0px"> <?php echo $image ?> </a> </div>
                                        <div class="pu-details lastUnit">
                                            <div class="pu-title fk-font-13"><a class="fk-display-block" href="<?php echo $url ?>" title="<?php echo $productInfo->name ?>"> <?php echo $productInfo->name ?></a></div>
                                            <div class="pu-extra fk-font-12">
                                                <div class="line">
                                                    <div title="0 stars" class="fk-stars-small">
                                                        <div class="ratings">
                                                            <div class="fk-stars" title="<?php echo $rating->rating_score ?> stars">
                                                                <span class="unfilled">★★★★★</span>
                                                                <span class="rating filled" style="width:<?php echo $ratingPercent ?>%">★★★★★</span>
                                                            </div>
                                                            <div class="count">
                                                                <span itemprop="ratingCount"><?php echo $rating->rating_score ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pu-price"><?php echo $productPrice ?></div>
                                        </div>
                                    </div>
                                </li>
    <?php endforeach;
} ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>