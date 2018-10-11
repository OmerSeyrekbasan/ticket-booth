<?php

$id=Yii::app()->User->id;
$model=Bilet::model()->findAll('user=:user', array('user'=>$id));
$say=0;


foreach ($model as $model) {
	if ($model && $say==0) {
		$say=1;
		echo '<h2 > ALINMIŞ BİLETLERİM</h2>';
	}
	$data=Etkinlik::model()->findByPk($model->etkinlik);
	if($model->rezervdurumu=='SATILMIS' AND $data->Tarih>=date("Y-m-d")) {

	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
										'label'=>'Etkinlik',
										'value'=>$data->adi,
									),
									array(
																'label'=>'Tarih',
																'value'=>$data->Tarih,
															),

		),
	));
	}
} if ($say==0) {
	echo '<h3 > ALINMIŞ BİLETİNİZ YOKTUR</h3>';
}
$say=0;

$model=Bilet::model()->findAll('user=:user', array('user'=>$id));

foreach ($model as $model) {

$data=Etkinlik::model()->findByPk($model->etkinlik);
	if($model->rezervdurumu=='REZERVE' AND $data->Tarih>date("Y-m-d") ) {
		if ($model && $say==0) {
			$say=1;
			echo '<h2 > REZERVE BİLETLERİM</h2>';
		}
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
										'label'=>'Etkinlik',
										'value'=>$data->adi,
									),
									array(
																'label'=>'Tarih',
																'value'=>$data->Tarih,
															),
	    array(
	        'type'=>'raw',
	        'value'=>CHtml::link('Bileti Iptal Et', 'index.php?r=site/biletIptal&ID='.$model->ID),
	    ),
		),
	));
	}
}


$model=Bilet::model()->findAll('user=:user', array('user'=>$id));

foreach ($model as $model) {
	if ($model) {

		$data=Etkinlik::model()->findByPk($model->etkinlik);
		if($data->Tarih<date("Y-m-d")) {
			echo '<h2 > GEÇMİŞ BİLETLERİM</h2>';
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				array(
											'label'=>'Etkinlik',
											'value'=>$data->adi,
										),
										array(
																	'label'=>'Tarih',
																	'value'=>$data->Tarih,
																),

			),
		));
		}
	}

}

?>
