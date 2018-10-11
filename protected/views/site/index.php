



<?php



//$etkinlik=Etkinlik::model()->findAll();
$dataProvider=new CActiveDataProvider('Etkinlik', array(
	'criteria'=>array(
			'condition'=>'Tarih >= DATE(NOW())' ,
		),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

?>
