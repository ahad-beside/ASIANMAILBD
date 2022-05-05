<?php
/* @var $this SettingsController */
/* @var $data Settings */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_amount')); ?>:</b>
	<?php echo CHtml::encode($data->first_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_lable')); ?>:</b>
	<?php echo CHtml::encode($data->first_lable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_banner')); ?>:</b>
	<?php echo CHtml::encode($data->first_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_account')); ?>:</b>
	<?php echo CHtml::encode($data->bank_account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />


</div>