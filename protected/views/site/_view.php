<?php
/* @var $this MulkController */
/* @var $data Mulk */
?>




<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Etkinlik Adi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->adi), array('view', 'ID'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Etkinlik Turu')); ?>:</b>
	<?php
	$EtkinlikTipi = Etkinliktip::model()->findByPk($data->Tip);
	echo CHtml::encode($EtkinlikTipi->tip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fiyat')); ?>:</b>
	<?php echo CHtml::encode($data->fiyat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Organizator')); ?>:</b>
	<?php
	$organizator = User::model()->findByPk($data->organizator);
	echo CHtml::encode($organizator->username);
	?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('Adres')); ?>:</b>
	<?php
	$yer = Yerler::model()->findByPk($data->Yer);
	echo CHtml::encode($yer->Adres);
	?>


	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarih')); ?>:</b>
	<?php echo CHtml::encode($data->Tarih); ?>
	<br />






	<?php
	/*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fiyat')); ?>:</b>
	<?php echo CHtml::encode($data->fiyat); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('resim')); ?>:</b>
	<?php echo CHtml::encode($data->resim); ?>
	<br />

	*/ ?>

</div>
