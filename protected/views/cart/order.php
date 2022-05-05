<div class="page-title">Make Order</div>

<?php
if(!isset($_GET['order'])){
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'order-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array('class'=>'inner-form'),
));
?>

<!-- Start Customer Info and Shipping Info -->
<div class="box-header">Delivery Information</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'delivery_info'); ?>
    <?php echo $form->textArea($model, 'delivery_info', array('class' => 'form-control','style'=>'width:100%')); ?>
    <?php echo $form->error($model, 'delivery_info'); ?>
</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<!-- End Customer Info and Shipping Info ->

<!-- start order summary -->
<div class="box-header">Order Summary</div>
<?php
$session = Yii::app()->session;
$cartItems = count($session['cart']);
if($cartItems==0){
    ?>
<div style="width: 100%; border: solid 1px white; font-size: 16px; font-weight: bold;">You have no items in cart.</div>
<?php
}else{
    ?>
<table class="checkout-table gu12" border="1">
    <thead>
        <tr>
            <th>Sl.</th>
            <th>Image</th>
            <th class="name">Product Name</th>
            <th class="price">Price</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        $total=0;
        foreach($session['cart'] as $k=>$v):
            ?>
        <tr>
            <td class="sl"><?php echo $i++;?></td>
            <td class="image"><?php echo Yii::app()->easycode->showImage($v['image'],80,80)?></td>
            <td>
                <?php echo $v['name']?>
                <?php
                if(count($v['option'])>0):
                    echo '<br><br><strong>Options:</strong><br>';
                    foreach($v['option'] as $k2=>$option):
                        echo $k2.' : '.$option['name'].' ('.$option['price_prefix'].  number_format($option['price'],2).')'.'<br>';
                    endforeach;
                endif;
                ?>
            </td>
            <td class="price"><?php echo number_format($v['price'],2)?></td>
            <td><a class="btn btn-danger btn-sm rmitem" href="<?php echo Yii::app()->createUrl('//cart/dell/'.$k.'?return=order');?>">X</a></td>
        </tr>
        <?php
        $total += $v['price'];
        endforeach;
        ?>
        <tr>
            <th></th>
            <th></th>
            <th class="price">Total:</th>
            <th class="price"><?php echo number_format($total,2)?></th>
            <th>&nbsp;</th>
        </tr>
    </tbody>
</table>


<script type="text/javascript">
$('.rmitem').click(function(){
    if(confirm('Are you sure to delete?')==true){
        return true;
    }else{
        return false;
    }
});
</script>
<?php }?>
<?php echo $form->error($model, 'total'); ?>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<!-- end order summary -->

<!-- Start Customer Info and Shipping Info -->
<div class="box-header">Payment Method</div>
<div class="form-group radio-inline">
    <?php echo $form->labelEx($model, 'payment_method'); ?>
    <?php echo $form->radioButtonList($model, 'payment_method', array('1'=>Yii::app()->params->bankName,'2'=>'Cash On Delivery'), array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'payment_method'); ?>
</div>
<!-- End Customer Info and Shipping Info -->
<div class="clearfix">&nbsp;</div>
<div style="text-align: center; width: 100%; margin-top: 10px;">
    <a class="btn continue-shopping" style="background-color: #CCC; font-size: 14px; color: black;" href="<?php echo Yii::app()->request->baseUrl?>">Continue Shopping?</a>
    <button type="submit" class="btn" style="background-color: #fdd922; font-size: 14px; color: black;">Order Now</button>
</div>
<?php $this->endWidget(); }else{?>

<div style="text-align: center; width: 100%">
    <h2 style="font-size:15px;">Thank Your For Your Order # <?php echo $data['orderInfo']->order_number?></h2>
    <strong>Please pay <?php echo Yii::app()->params->currencySymbol?> <?php echo number_format($data['orderInfo']->grand_total,2)?> to confirm your order</strong><br><br>
    
    <strong>Bank Name: <?php echo Yii::app()->params->bankName?></strong><br>
    <strong>A/C#: <?php echo Yii::app()->params->bankAccountNumber?></strong>
</div>

<div class="clearfix">&nbsp;</div>
<div style="text-align: center; width: 100%; margin-top: 10px;">
    <a class="btn continue-shopping" style="background-color: #CCC; font-size: 14px; color: black;" href="<?php echo Yii::app()->request->baseUrl?>">Continue Shopping?</a>
</div>

<?php } ?>

