<div class="table-responsive">
    <table class="table table-hover table-striped custom-data-table">
        <thead>
            <tr>
                <th style="width:20px;">Sl</th>
                <th>Image</th>
                <th>Product Name</th>
                <th style="text-align: right">Grand Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($model) < 1) { ?>
                <tr class="odd">
                    <td colspan="4">No data found...</td>
                </tr>
            <?php } else {
                $i=0;
                foreach($model as $data):
                    $i++;
                    $pinfo = Products::model()->findByPk($data->product_id);
                    $image = Yii::app()->easycode->showimage($pinfo->image,100,100);
                    $price = Products::model()->getProductPrice($data->product_id);
                    $url = Products::model()->makeLink($data->product_id);
            ?>
                <tr class="<?php echo ($i%2)?'odd':'even';?>">
                    <td><?php echo $i?></td>
                    <td><a href="<?php echo $url?>"><?php echo $image?></a></td>
                    <td><a href="<?php echo $url?>"><?php echo $pinfo->name?></a></td>
                    <td style="text-align: right"><?php echo number_format($price,2)?></td>
                </tr>
            <?php endforeach; } ?>
        </tbody>
    </table>
</div>