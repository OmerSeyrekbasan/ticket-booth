<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode("EtkinlikMAX"); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
        <div id="logo"><img src=".\images\logo.png"> </div>
    </div><!-- header -->

	<div id="mainmenu">
		<?php
		if (Yii::app()->user->isGuest) {
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Anasayfa', 'url'=>array('/site/index')),
				array('label'=>'Hakkımızda', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Iletisim', 'url'=>array('/site/contact')),
				array('label'=>'Etkinlik Ara', 'url'=>array('/site/etkinlikara')),
				array('label'=>'Giris/Kayıt Ol', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Cikis ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); } else if (Yii::app()->user->role=='organizer') {
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Anasayfa', 'url'=>array('/site/index')),
					array('label'=>'Hakkımızda', 'url'=>array('/site/page', 'view'=>'about')),
					array('label'=>'Iletisim', 'url'=>array('/site/contact')),
					array('label'=>'Yeni Etkinlik Ekle', 'url'=>array('/site/etkinlikekle')),
					array('label'=>'Cikis ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			));

		} else if (Yii::app()->user->role=='customer') {
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Anasayfa', 'url'=>array('/site/index')),
					array('label'=>'Hakkımızda', 'url'=>array('/site/page', 'view'=>'about')),
					array('label'=>'Iletisim', 'url'=>array('/site/contact')),
					array('label'=>'Biletlerim', 'url'=>array('/site/biletlerim')),
					array('label'=>'Etkinlik Ara', 'url'=>array('/site/etkinlikara')),
					array('label'=>'Cikis ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			));
		} else if (Yii::app()->user->role=='admin') {
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Anasayfa', 'url'=>array('/site/index')),
					array('label'=>'Iletisim', 'url'=>array('/site/contact')),
					array('label'=>'Alanlarim', 'url'=>array('/site/alanlarim')),
					array('label'=>'Yeni Alan Ekle', 'url'=>array('/site/alanekle')),
					array('label'=>'Yeni Organizator Ekle', 'url'=>array('/site/organizatorekle')),
					array('label'=>'Organizatorler', 'url'=>array('/site/organizatorler')),
					array('label'=>'Yeni Etkinlik Türü Ekle', 'url'=>array('/site/turekle')),
					array('label'=>'Etkinlik Türlerim', 'url'=>array('/site/turlar')),
					array('label'=>'Cikis ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			));
		}
		?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by OS Yazilim.<br/>
		All Rights Reserved 2017.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
