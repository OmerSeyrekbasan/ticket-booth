<?php

/*$sql="SELECT * FROM Etkinlik
//WHERE adi=GD";
   /*
$model=Etkinlik::model()->findAll('user=:user', array('user'=>$id));
$model=Etkinlik::model()->findAll('user=:user', array('user'=>$id));
$model=Etkinlik::model()->findAll('user=:user', array('user'=>$id));
$model=Etkinlik::model()->findAll('user=:user', array('user'=>$id));
$model=Etkinlik::model()->findAll('user=:user', array('user'=>$id));
$model=Etkinlik::model()->findAll('user=:user', array('user'=>$id));
$model=Etkinlik::model()->findAll('user=:user', array('user'=>$id));*/
//$posts=Bilet::model()->findAllByAttributes('user',$id,);
//print_r ($model);
//$model=Bilet::model()->findByAttributes('user'=>$id);

//$list= Yii::app()->db->createCommand($sql)->queryAll();

//$list=Etkinlik::model()->findAll('adi=:adi', array('adi'=>$model->username));

$say=$list5=$list6=$list7=0;

if ($list=Etkinlik::model()->findAllByAttributes(array('adi'=>$model->username)));
   if ($list3=Etkinlik::model()->findAllByAttributes(array('Tarih'=>$model->username)));
     if ($list4=Etkinlik::model()->findAllByAttributes(array('fiyat'=>$model->username)));
    //Organizator tablosu olmalıydı!!!
         if ($list2=User::model()->findAllByAttributes(array('username'=>$model->username)))
          foreach ($list2 as $list2)
          $list5=Etkinlik::model()->findAll('organizator=:organizator', array('organizator'=>$list2->id));
             if ($list2=Yerler::model()->findAllByAttributes(array('Adres'=>$model->username)))
              foreach ($list2 as $list2)
              $list6=Etkinlik::model()->findAll('yer=:yer', array('yer'=>$list2->ID));
                 if ($list2=Etkinliktip::model()->findAllByAttributes(array('tip'=>$model->username))){
                  foreach ($list2 as $list2)
                  $list7=Etkinlik::model()->findAll('Tip=:Tip', array('Tip'=>$list2->ID));
                }
      if(!$list AND !$list3 AND !$list4 AND !$list5 AND !$list6 AND !$list7) {
        $message="Aradığınız Kritere Uygun Bir Etkinlik Yoktur!";

        Yii::app()->user->setFlash('error',$message);
        $this->redirect(array('etkinlikarahata'),$message);
      }





foreach ($list as $list) {
  $data=Etkinliktip::model()->find("ID=:ID", array('ID'=>$list->Tip));
  $data2=Yerler::model()->find("ID=:ID", array('ID'=>$list->Yer));
  $data3=User::model()->find("ID=:ID", array('ID'=>$list->organizator));
  $date=date("Y-m-d");

  if($list->Tarih>=$date) {
    $say=1;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$list,
	'attributes'=>array(
		'adi',
    'Tarih',
    'fiyat',
    array(        'label'=>'Etkinlik Tipi',
									'value'=>$data->tip,
								),
    array(        'label'=>'Adres',
            			'value'=>$data2->Adres,
            		),
                array(        'label'=>'Organizator',
                        			'value'=>$data3->username,
                        		),
                array(
                    'type'=>'raw',
                    'value'=>CHtml::link('Görüntüle', 'index.php?r=site/view&ID='.$list->ID),
                ),
	),
));
}}


foreach ($list3 as $list) {
  $data=Etkinliktip::model()->find("ID=:ID", array('ID'=>$list->Tip));
  $data2=Yerler::model()->find("ID=:ID", array('ID'=>$list->Yer));
  $data3=User::model()->find("ID=:ID", array('ID'=>$list->organizator));
  $date=date("Y-m-d");

  if($list->Tarih>=$date) {
    $say=1;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$list,
	'attributes'=>array(
		'adi',
    'Tarih',
    'fiyat',
    array(        'label'=>'Etkinlik Tipi',
									'value'=>$data->tip,
								),
    array(        'label'=>'Adres',
            			'value'=>$data2->Adres,
            		),
                array(        'label'=>'Organizator',
                        			'value'=>$data3->username,
                        		),
                array(
                    'type'=>'raw',
                    'value'=>CHtml::link('Görüntüle', 'index.php?r=site/view&ID='.$list->ID),
                ),
	),
));
}}

foreach ($list4 as $list) {
  $data=Etkinliktip::model()->find("ID=:ID", array('ID'=>$list->Tip));
  $data2=Yerler::model()->find("ID=:ID", array('ID'=>$list->Yer));
  $data3=User::model()->find("ID=:ID", array('ID'=>$list->organizator));
  $date=date("Y-m-d");

  if($list->Tarih>=$date) {
    $say=1;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$list,
	'attributes'=>array(
		'adi',
    'Tarih',
    'fiyat',
    array(        'label'=>'Etkinlik Tipi',
									'value'=>$data->tip,
								),
    array(        'label'=>'Adres',
            			'value'=>$data2->Adres,
            		),
                array(        'label'=>'Organizator',
                        			'value'=>$data3->username,
                        		),
                array(
                    'type'=>'raw',
                    'value'=>CHtml::link('Görüntüle', 'index.php?r=site/view&ID='.$list->ID),
                ),
	),
));
}}

if($list5) {
foreach ($list5 as $list) {
  $data=Etkinliktip::model()->find("ID=:ID", array('ID'=>$list->Tip));
  $data2=Yerler::model()->find("ID=:ID", array('ID'=>$list->Yer));
  $data3=User::model()->find("ID=:ID", array('ID'=>$list->organizator));
  $date=date("Y-m-d");

  if($list->Tarih>=$date) {
    $say=1;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$list,
	'attributes'=>array(
		'adi',
    'Tarih',
    'fiyat',
    array(        'label'=>'Etkinlik Tipi',
									'value'=>$data->tip,
								),
    array(        'label'=>'Adres',
            			'value'=>$data2->Adres,
            		),
                array(        'label'=>'Organizator',
                        			'value'=>$data3->username,
                        		),
                array(
                    'type'=>'raw',
                    'value'=>CHtml::link('Görüntüle', 'index.php?r=site/view&ID='.$list->ID),
                ),
	),
));
}}}



if ($list6) {
foreach ($list6 as $list) {
  $data=Etkinliktip::model()->find("ID=:ID", array('ID'=>$list->Tip));
  $data2=Yerler::model()->find("ID=:ID", array('ID'=>$list->Yer));
  $data3=User::model()->find("ID=:ID", array('ID'=>$list->organizator));
  $date=date("Y-m-d");

  if($list->Tarih>=$date) {
    $say=1;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$list,
	'attributes'=>array(
		'adi',
    'Tarih',
    'fiyat',
    array(        'label'=>'Etkinlik Tipi',
									'value'=>$data->tip,
								),
    array(        'label'=>'Adres',
            			'value'=>$data2->Adres,
            		),
                array(        'label'=>'Organizator',
                        			'value'=>$data3->username,
                        		),
                array(
                    'type'=>'raw',
                    'value'=>CHtml::link('Görüntüle', 'index.php?r=site/view&ID='.$list->ID),
                ),
	),
));
}}
}

if($list7) {
foreach ($list7 as $list) {
  $data=Etkinliktip::model()->find("ID=:ID", array('ID'=>$list->Tip));
  $data2=Yerler::model()->find("ID=:ID", array('ID'=>$list->Yer));
  $data3=User::model()->find("ID=:ID", array('ID'=>$list->organizator));
  $date=date("Y-m-d");

  if($list->Tarih>=$date) {
    $say=1;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$list,
	'attributes'=>array(
		'adi',
    'Tarih',
    'fiyat',
    array(        'label'=>'Etkinlik Tipi',
									'value'=>$data->tip,
								),
    array(        'label'=>'Adres',
            			'value'=>$data2->Adres,
            		),
                array(        'label'=>'Organizator',
                        			'value'=>$data3->username,
                        		),
                array(
                    'type'=>'raw',
                    'value'=>CHtml::link('Görüntüle', 'index.php?r=site/view&ID='.$list->ID),
                ),
	),
));
}}}















if($say==0) {
$message="Aradığınız Kritere Uygun Etkinlik Yoktur!";
Yii::app()->user->setFlash('error',$message);
$this->redirect(array('etkinlikarahata'),$message);
}

?>
