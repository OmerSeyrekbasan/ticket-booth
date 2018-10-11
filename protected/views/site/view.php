<?php
/* @var $this EtkinlikController */
/* @var $model  Etkinlik*/


?>



<?php
$yer = yerler::model()->findByPk($model->Yer);
$etkinlikTipi = etkinliktip::model()->findByPk($model->Tip);
$organizator=User::model()->findByPk($model->ID);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'adi',
		'fiyat',
		'Tarih',
	),
));


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$etkinlikTipi,
	'attributes'=>array(

		'tip',

	),
));


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$yer,
	'attributes'=>array(
		'Adres'
	),
));
$id=$_GET['ID'];


?>
<div class="registerLink"><a class="submitButon" href="index.php?r=site/biletAl&ID=<?php echo $id ?>">
		<?php echo CHtml::submitButton('Bilet Al');?></a><br/><br/> </div>
<div class="registerLink"><a class="submitButon" href="index.php?r=site/biletRezerv&ID=<?php echo $id ?>">
				<?php if ($model->Tarih!=date("Y-m-d"))

				echo CHtml::submitButton('Bilet Rezerve Et');?></a><br/><br/> </div>

<?php

?>
