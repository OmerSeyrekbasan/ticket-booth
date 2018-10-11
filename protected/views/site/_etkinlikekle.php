<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'ID'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Adi'); ?>
<?php echo $form->textField($model,'adi',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'adi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tarih '); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'model'=>$model,
		'attribute'=>'Tarih',

    // additional javascript options for the date picker plugin
    'options'=>array(
			'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'fold',
				'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'Tarih'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fiyat'); ?>
	<?php echo $form->textField($model,'fiyat',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'fiyat'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Kontenjan'); ?>
	<?php echo $form->textField($model,'kontenjan',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'kontenjan'); ?>
	</div>



  <div class="row">
		<?php echo $form->labelEx($model,'Yer'); ?>
<?php
$models = Yerler::model()->findAll();

                 $list = CHtml::listData($models,
                                 'ID', 'Adres');

echo $form->dropDownList($model,'Yer',
																 CHtml::listData(Yerler::model()->findAll(array('order' => 'Adres')), 'ID','Adres'),
																 array('empty'=> 'Lutfen Seciniz')); ?>
	<?php echo $form->error($model,'Yer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Etkinlik Tipi'); ?>
<?php
$models = Etkinliktip::model()->findAll();

                 $list = CHtml::listData($models,
                                 'ID', 'tip');

echo $form->dropDownList($model,'Tip',
																 CHtml::listData(Etkinliktip::model()->findAll(array('order' => 'tip')), 'ID','tip'),
																 array('empty'=> 'Lutfen Seciniz')); ?>
	<?php echo $form->error($model,'Tip'); ?>
</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
