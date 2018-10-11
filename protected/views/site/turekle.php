<?php
$this->breadcrumbs=array(
	'Etkinliktip'=>array('index'),
	'TurEkle',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Tür Ekle</h1>

<?php echo $this->renderPartial('_turekle', array('model'=>$model)); ?>
