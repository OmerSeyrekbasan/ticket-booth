<?php
$this->breadcrumbs=array(
	'Yerler'=>array('index'),
	'AlanEkle',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Alan Ekle</h1>

<?php echo $this->renderPartial('_alanekle', array('model'=>$model)); ?>
