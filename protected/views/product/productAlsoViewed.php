<?php if(count($data['alsoViewedProducts']) > 0):?>
<div class="gd-row">
    <h3 class="sectionTitle">CUSTOMERS WHO VIEWED THIS PRODUCT ALSO VIEWED</h3>
    <div class="clear">&nbsp;</div>
    <div class="require-nav-carousel" data-columns="5" data-buttonsonside="true">
        <ul class="ccarousel nojs">
            <?php 
            foreach($data['alsoViewedProducts'] as $viewProduct):
                $url = Products::model()->makeLink($viewProduct['id']);
                $image = Yii::app()->easycode->showimage($viewProduct['image'],200,150);
                $price = Products::model()->getPrice($viewProduct['price'], $viewProduct['discount_price']);
                $rating = Products::model()->getProductRating($viewProduct['id']);
                $ratingPercent = number_format(($rating->rating_score / 5) * 100);
            ?>
            <li class="ccarousel-item ">
                <div class="product-unit unit-4  browse-product">
                    <div class="pu-visual-section"> <a data-tracking-id="prd_img" class="pu-image fk-product-thumb" href="<?php echo $url?>" style="margin-left: 0px"> <?php echo $image;?> </a> </div>
                    <div class="pu-details lastUnit">
                        <div class="pu-title fk-font-13"> <a class="fk-display-block" href="<?php echo $url?>" title="#"> <?php echo $viewProduct['name']?> </a> </div>
                        <div class="pu-extra fk-font-13">
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
                        <div class="pu-price">
                            <?php echo $price?>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<?php   endif;?>