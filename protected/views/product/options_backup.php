<?php $optionDetails = Option::model()->findByPk($options->option_id);?>
<div class="option">
    <div class="opname"><?php echo $optionDetails->name?></div>
    <?php if($optionDetails->type=='radio'){?>
    <select name="option[<?php echo $options->id?>]" class="option-product" data-type="select" <?php echo "data-required='".$options->isrequired."'";?>>
        <?php
        echo "<option value=''>Select Any</option>";
        
        $optionsItem = ProductsOptionItem::model()->findAll('product_option_id=:id',array(':id'=>$options->id));
        foreach ($optionsItem as $items):
            $itemsDetails = OptionItem::model()->findByPk($items->option_item_id);
        ?>
        <option value="<?php echo $items->option_item_id?>" data-price="<?php echo $items->price?>" data-pricecal="<?php echo $items->price_prefix?>"><?php echo $itemsDetails->name?></option>
        <?php endforeach;?>
    </select>
    <?php }else{?>
        <?php
        $optionsItem = ProductsOptionItem::model()->findAll('product_option_id=:id',array(':id'=>$options->id));
        foreach ($optionsItem as $items):
            $itemsDetails = OptionItem::model()->findByPk($items->option_item_id);
        ?>
    <input type="radio" name="option[<?php echo $options->id?>]" value="<?php echo $items->option_item_id?>" data-price="<?php echo $items->price?>" data-pricecal="<?php echo $items->price_prefix?>"/> <?php echo $itemsDetails->name?> &nbsp;
        <?php endforeach;?>
    <?php }?>
</div><br>

<style>
    .option{
        width: 100%;
    }
    .option .opname{
        font-weight: bold;
        font-size: 13px;
        padding: 5px 5px;
        //border-bottom: solid 1px black;
        margin-bottom: 5px;
        background-color: #ccc;
    }
    .option select{
        width: 100%;
    }
</style>
