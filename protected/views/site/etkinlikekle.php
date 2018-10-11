<?php
$this->breadcrumbs=array(
	'Etkinlik'=>array('index'),
	'EtkinlikEkle',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Etkinlik Ekle</h1>

<?php echo $this->renderPartial('_etkinlikekle', array('model'=>$model)); ?>
