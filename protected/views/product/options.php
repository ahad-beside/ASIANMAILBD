<?php $optionDetails = Option::model()->findByPk($options->option_id);?>
<div class="option">
    <div class="opname"><?php echo $optionDetails->name?></div>
    <?php if($optionDetails->type=='image'){?>
    
        <?php
        $uOptionId = uniqid();
        $optionsItem = ProductsOptionItem::model()->findAll('product_option_id=:id',array(':id'=>$options->id));
        foreach ($optionsItem as $items):
            $itemsDetails = OptionItem::model()->findByPk($items->option_item_id);
        ?>
    <img src="<?php echo Yii::app()->easycode->showImage($itemsDetails->image,40,40,false);?>" data-value="<?php echo $items->option_item_id?>" onclick="updateOption('option-<?php echo $uOptionId;?>',$(this))" title="<?php echo $itemsDetails->name?>" class="img-option" />
        <?php endforeach;?>
    
    <input type="hidden" name="option[<?php echo $options->id?>]" class="option-product <?php if($options->isrequired=='Yes')echo 'required';?>" id="option-<?php echo $uOptionId;?>" data-type="image" value="">
    <div class="error" style="display:none; margin-top: 10px;">Please choose <?php echo $optionDetails->name?></div>
    
    <?php }else if($optionDetails->type=='select'){?>
    <select name="option[<?php echo $options->id?>]" class="option-product <?php if($options->isrequired=='Yes')echo 'required';?>" data-type="select">
        <?php
        echo "<option value=''>Select Any</option>";
        
        $optionsItem = ProductsOptionItem::model()->findAll('product_option_id=:id',array(':id'=>$options->id));
        foreach ($optionsItem as $items):
            $itemsDetails = OptionItem::model()->findByPk($items->option_item_id);
        ?>
        <option value="<?php echo $items->option_item_id?>" data-price="<?php echo $items->price?>" data-pricecal="<?php echo $items->price_prefix?>"><?php echo $itemsDetails->name?></option>
        <?php endforeach;?>
    </select>
    <div class="error" style="display:none; margin-top: 10px;">Please choose <?php echo $optionDetails->name?></div>
    <?php }else{?>
        <?php
        $uOptionId = uniqid();
        $optionsItem = ProductsOptionItem::model()->findAll('product_option_id=:id',array(':id'=>$options->id));
        foreach ($optionsItem as $items):
            $itemsDetails = OptionItem::model()->findByPk($items->option_item_id);
        ?>
    <input type="radio" name="radio-<?php echo $options->id?>" data-value="<?php echo $items->option_item_id?>" onclick="updateOption('option-<?php echo $uOptionId;?>',$(this))"/> <?php echo $itemsDetails->name?> &nbsp;
    
        <!--<input type="radio" name="option[<?php //echo $options->id?>]" value="<?php //echo $items->option_item_id?>" class="option-product required" data-price="<?php //echo $items->price?>" data-pricecal="<?php //echo $items->price_prefix?>" <?php //echo "data-required='".$options->isrequired."'";?>/> <?php //echo $itemsDetails->name?> &nbsp;-->
        <?php endforeach;?>
        
        <input type="hidden" name="option[<?php echo $options->id?>]" class="option-product <?php if($options->isrequired=='Yes')echo 'required';?>" id="option-<?php echo $uOptionId;?>" data-type="radio" value="">
        <div class="error" style="display:none; margin-top: 10px;">Please choose <?php echo $optionDetails->name?></div>
        
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
<script>
    function updateOption(val,$this){
        $('#'+val).val($this.attr('data-value'));
    }
    $('.img-option').click(function(){
        $('.img-option').removeClass('option-active');
        $(this).addClass('option-active');
    });
</script>
