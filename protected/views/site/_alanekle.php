<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'ID'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Adres'); ?>
<?php echo $form->textField($model,'Adres',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'Adres'); ?>
	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
