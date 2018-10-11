<?php

$model=User::model()->findAll('role=:role', array('role'=>'organizer'));
//$posts=Bilet::model()->findAllByAttributes('user',$id,);
//print_r ($model);
//$model=Bilet::model()->findByAttributes('user'=>$id);

foreach ($model as $model) {
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'email',
	),
));
}

?>
