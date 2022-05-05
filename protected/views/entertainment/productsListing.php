<?php
//print_r($data['products']);
$displayCount = 0;
for($i=0; $i < count($data['products']); $i++):
    $displayCount++;
    
    $productId = $data['products'][$i]['id'];
    $image = Yii::app()->easycode->showimage($data['products'][$i]['image'],125,125);
    $name = $data['products'][$i]['name'];
    $url = Products::model()->makeLink($productId);
    $price = Products::model()->getPrice($data['products'][$i]['price'], $data['products'][$i]['discount_price']);
    
    if($displayCount == 1)
        echo '<div class="gd-col gu12 gd-row">';
?>
    <div class="gd-col gu3">
        <div data-size="store-grid-new-4"  data-pid="" class=" product-unit unit-4 browse-product ">
            <div class="pu-visual-section"> 
                <a href="<?php echo $url?>" class="pu-image fk-product-thumb " data-tracking-id="prd_img"> <?php echo $image?> </a>
            </div>
            <div class="pu-details lastUnit">
                <div class="pu-title fk-font-13"> <a title="<?php echo $name?>" href="<?php echo $url?>" data-tracking-id="prd_title" class="fk-display-block"> <?php echo $name?> </a> </div>
                <div class="pu-price">
                    <div class="pu-border-top">
                        <div class="pu-final"> <?php echo $price?></div>
                        <div class="pu-personal"> </div>
                        <ul class="pu-offers">
                        </ul>
                    </div>
                </div>
                <div class="pu-border-top">
                    <?php ProductsAttribute::model()->showProductsAttributesText($productId,4)?>
                    
                </div>
                <!--<div class="pu-compare pu-border-top">
                    <input type="checkbox" vertical_url_map="/mobiles" vertical="mobile" display_vertical="Mobiles" id="MOBE25R6A2EPFGKM" data-uniqid="5695b7dc-9f36-4a66-8fd0-dfbc551d4d11" class="compare-checkbox">
                    <label class="compare-label" for="MOBE25R6A2EPFGKM">Add to compare</label>
                </div>-->
            </div>
        </div>
    <?php if($displayCount == 4)echo '</div>';?>
    <?php if($displayCount == 4){echo '<div class="fclear"></div>'; $displayCount=0;}?>
</div>

<?php endfor;?>
