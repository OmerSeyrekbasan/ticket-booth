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
				<?php echo CHtml::submitButton('Bilet Rezerve Et');?></a><br/><br/> </div>

<?php
/*
echo CHtml::image(Yii::app()->request->baseUrl.'/images/mulk/'.$model->resim,
	'this is alt tag of image',
	array('width'=>'300px','height'=>'300px','title'=>'image title here'));
*/
?>
