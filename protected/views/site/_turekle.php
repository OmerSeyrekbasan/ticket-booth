<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'ID'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Etkinlik Turu'); ?>
<?php echo $form->textField($model,'tip',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'tip'); ?>
	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
