<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$all=User::model()->findAll();
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			foreach ($all as $all)
					if(($all->username==$model->username) OR ($all->email==$model->email)) {
						$message = "Email Veya Kullanici Adı Mevcut";
										Yii::app()->user->setFlash('error',$message);
										$this->redirect(array('createhata'),$message);
					}

			$model->role='customer';
			if($model->save()) {
			$message = "Başarıyla Kayıt Oldunuz. Lütfen Giriş Yapınız.";
							Yii::app()->user->setFlash('success',$message);
							$this->redirect(array('etkinlikeklesuccess'),$message);
		}

		$this->render('create',array('model'=>$model,
		));
	}
	$this->render('create',array('model'=>$model,
	));
}

	public function actionView()
		{
			$id=$_GET['ID'];
			$this->render('view',array(
				'model'=>$this->LoadModel($id),
			));
		}

		public function LoadModel()
	{
		$id=$_GET['ID'];
		$model=etkinlik::model()->findByPk($id);
		//if($model===null)
		//	throw new CHttpException(400,'The requested page does not exist.');
		return $model;
	}

	public function actionBiletAl()
	{
		if (Yii::app()->user->isGuest)
			throw new CHttpException(400,'Bilet Almak Icin Lutfen Giris Yapiniz.');
		if (Yii::app()->User->role!='customer')
			throw new CHttpException(400,'The requested page does not exist.');
		$etkinlikID=$_GET['ID'];
		$etkinlik=Etkinlik::model()->findByPk($etkinlikID);
		if ($etkinlik->kontenjan<=0) {
			$message = "Etkinlikte Yer Kalmamıştır.";
						Yii::app()->user->setFlash('error',$message);
						$this->redirect(array('etkinlikeklesuccess'),$message);
					}
			else {
		$id=Yii::app()->User->id;
		$bilet=new Bilet;
		$bilet->user=$id;
		$bilet->etkinlik=$etkinlikID;
		$bilet->rezervdurumu='SATILMIS';
		$etkinlik->kontenjan--;


		if($bilet->save() AND $etkinlik->save()) {
			$message = "Bilet Başarıyla Alindi.";
							Yii::app()->user->setFlash('success',$message);
							$this->render('biletal');

		}
}
			}


	public function actionBiletRezerv()
	{
		if (Yii::app()->user->isGuest)
			throw new CHttpException(400,'Bilet Almak Icin Lutfen Giris Yapiniz.');
		if (Yii::app()->User->role!='customer')
			throw new CHttpException(400,'Bilet Almak Icin Lutfen Giris Kullanici Girisi Yapiniz.');
		$etkinlikID=$_GET['ID'];
		$etkinlik=Etkinlik::model()->findByPk($etkinlikID);
		if ($etkinlik->kontenjan<0) {
			$message = "Etkinlikte Yer Kalmamıştır.";
						Yii::app()->user->setFlash('error',$message);
						$this->redirect(array('etkinlikeklesuccess'),$message);
		}
			else {


		$id=Yii::app()->User->id;
		$bilet=new Bilet;
		$bilet->user=$id;
		$bilet->etkinlik=$etkinlikID;
		$bilet->rezervdurumu='REZERVE';
		$etkinlik->kontenjan--;



		if($bilet->save() AND $etkinlik->save()) {
			$message = "Bilet Başarıyla Rezerve Edildi.";
							Yii::app()->user->setFlash('success',$message);
							$this->render('biletal');
		}
	}
	}

	public function actionBiletlerim() {
		if (Yii::app()->user->isGuest)
			throw new CHttpException(400,'Lutfen Giris Yapiniz.');
		if (Yii::app()->User->role!='customer')
			throw new CHttpException(400,'Biletleri Gorebilmek Icin Lutfen Kullanici Girisi Yapiniz.');
		$this->render('biletlerim');

	}

	public function actionBiletIptal() {
		if (Yii::app()->user->isGuest)
			throw new CHttpException(400,'Lutfen Giris Yapiniz.');
		if (Yii::app()->User->role!='customer')
			throw new CHttpException(400,'Bilet Iptal Etmek Icin Lutfen Kullanici Girisi Yapiniz.');

			$BiletID=$_GET['ID'];
			$model=Bilet::model()->findByPK($BiletID);
			$etkinlik=Etkinlik::model()->findByPk($model->etkinlik);
			$etkinlik->kontenjan++;
			if($model->rezervdurumu=='REZERVE')
				if($model->delete() AND $etkinlik->save()) {
					$message = "Bilet Başarıyla İptal Edildi.";
									Yii::app()->user->setFlash('success',$message);
									$this->render('biletal');

				}

			else throw new CHttpException(400,'Rezerve Olmayan Biletler Iptal Edilemez!');

			}

			public function actionOrganizatorEkle()
			{
				if (Yii::app()->user->isGuest)
					throw new CHttpException(400,'Lutfen Giris Yapiniz.');
				if (Yii::app()->User->role!='admin')
					throw new CHttpException(400,'Yetkiniz Yoktur');
				$model=new User;

				// Uncomment the following line if AJAX validation is needed
				// $this->performAjaxValidation($model);
				$all=User::model()->findAll();
				if(isset($_POST['User']))
				{
					$model->attributes=$_POST['User'];
					$model->role='organizer';
					foreach ($all as $all)
							if(($all->username==$model->username) OR ($all->email==$model->email)) {
								$message = "Bu Organizatör Zaten Mevcut";
												Yii::app()->user->setFlash('error',$message);
												$this->redirect(array('createhata'),$message);
							}

					if($model->save()) {
					$message = "Organizator Başarıyla Eklendi.";
									Yii::app()->user->setFlash('success',$message);
									$this->redirect(array('etkinlikeklesuccess'),$message);
				} else {
					$message = "Organizator Eklenemedi.";
									Yii::app()->user->setFlash('error',$message);
									$this->redirect(array('etkinlikeklesuccess'),$message);
				}
}
				$this->render('organizatorekle',array(
					'model'=>$model,
				));
			}

			public function actionOrganizatorler() {

				if (Yii::app()->user->isGuest)
					throw new CHttpException(400,'Lutfen Giris Yapiniz.');
				if (Yii::app()->User->role!='admin')
					throw new CHttpException(400,'Yetkiniz Yoktur');

				$this->render('organizatorler');

			}

			public function actionAlanlarim() {
				if (Yii::app()->user->isGuest)
					throw new CHttpException(400,'Lutfen Giris Yapiniz.');
				if (Yii::app()->User->role!='admin')
					throw new CHttpException(400,'Yetkiniz Yoktur');
				$this->render('alanlar');

			}

			public function actionalanEkle()
			{
				if (Yii::app()->user->isGuest)
					throw new CHttpException(400,'Lutfen Giris Yapiniz.');
				if (Yii::app()->User->role!='admin')
					throw new CHttpException(400,'Yetkiniz Yoktur');
				$model=new Yerler;
				$all=Yerler::model()->findAll();
				// Uncomment the following line if AJAX validation is needed
				// $this->performAjaxValidation($model);

				if(isset($_POST['Yerler']))
				{
					$model->attributes=$_POST['Yerler'];
					foreach ($all as $all)
							if(($all->Adres==$model->Adres)) {
								$message = "Bu Alan Zaten Mevcut";
												Yii::app()->user->setFlash('error',$message);
												$this->redirect(array('createhata'),$message);
							}
					if($model->save())
					$message = "Alan Başarıyla Eklendi";
									Yii::app()->user->setFlash('success',$message);
									$this->redirect(array('etkinlikeklesuccess'),$message);
						$this->redirect(array('index'));
				}

				$this->render('alanekle',array(
					'model'=>$model,
				));
			}

			public function actionetkinlikEkle()
			{
				if (Yii::app()->user->isGuest)
					throw new CHttpException(401,'Lutfen Giris Yapiniz.');
				if (Yii::app()->User->role!='organizer')
					throw new CHttpException(402,'Yetkiniz Yoktur');
				$model=new Etkinlik;
				$all=Etkinlik::model()->findAll();

				// Uncomment the following line if AJAX validation is needed
				// $this->performAjaxValidation($model);

				if(isset($_POST['Etkinlik']))
				{
					$model->attributes=$_POST['Etkinlik'];
					foreach ($all as $all) {
							if(($all->Tarih==$model->Tarih) AND ($all->Yer==$model->Yer)) {
								$message = "İstediğniz Alan Başkası Tarafından Kullanılmaktadır.";
												Yii::app()->user->setFlash('error',$message);
												$this->redirect(array('etkinlikhata'),$message);
							}

									//throw new CHttpException(100,'Alan Başkası Tarafından Kullanılıyor.');
					}
					$model->organizator=Yii::app()->User->ID;
					if($model->save())
					$message = "Etkinlik Başarıyla Eklendi!";
									Yii::app()->user->setFlash('success',$message);
									$this->redirect(array('etkinlikeklesuccess'),$message);
				}

				$this->render('etkinlikekle',array(
					'model'=>$model,
				));
			}


			public function actionEtkinlikAra()
			{
				$model=new User;

				// Uncomment the following line if AJAX validation is needed
				// $this->performAjaxValidation($model);

				if(isset($_POST['User'])) {

						$model->attributes=$_POST['User'];
						$this->render('ara',array('model'=>$model));
				} else {
					$this->render('etkinlikara',array(
						'model'=>$model,
					));

				}





			}

			public function actionAra()
			{
				$this->render('ara');
			}

			public function actionTurEkle()
			{

				if (Yii::app()->user->isGuest)
					throw new CHttpException(400,'Lutfen Giris Yapiniz.');
				if (Yii::app()->User->role!='admin')
					throw new CHttpException(400,'Yetkiniz Yoktur');
				$model=new Etkinliktip;
				$all=Etkinliktip::model()->findAll();
				// Uncomment the following line if AJAX validation is needed
				// $this->performAjaxValidation($model);

				if(isset($_POST['Etkinliktip']))
				{
					$model->attributes=$_POST['Etkinliktip'];
					foreach ($all as $all)
							if(($all->tip==$model->tip) OR ($all->tip==$model->tip)) {
								$message = "Bu Entkinlik Türü Zaten Mevcut";
												Yii::app()->user->setFlash('error',$message);
												$this->redirect(array('createhata'),$message);
							}

					if($model->save()) {
						$message = "Etkinlik Türü Başarıyla Eklendi.";
										Yii::app()->user->setFlash('success',$message);
										$this->redirect(array('etkinlikeklesuccess'),$message);
					}
				}

				$this->render('turekle',array(
					'model'=>$model,
				));

			}

			public function actionTurlar() {
				if (Yii::app()->user->isGuest)
					throw new CHttpException(400,'Lutfen Giris Yapiniz.');
				if (Yii::app()->User->role!='admin')
					throw new CHttpException(400,'Yetkiniz Yoktur');
				$this->render('turlar');

			}

			public function actionEtkinlikEkleSuccess() {
				$this->render('etkinlikeklesuccess');
			}

			public function actionEtkinlikHata() {
				$this->render('etkinlikhata');
			}

			public function actionCreateHata() {
				$this->render('createhata');
			}

			public function actionEtkinlikAraHata() {
				$this->render('etkinlikarahata');
			}






}
