<div class="form">
<?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'gir'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>
    </div>

    <div class="row submit">
     <?php echo CHtml::submitButton('Ara'); ?>

 </div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
