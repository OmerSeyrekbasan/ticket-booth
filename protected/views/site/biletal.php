
<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
echo '<div class="flash-' . $key . '">' . $message . "</div>\n";}?>
<div class="registerLink"><a class="submitButon" href="index.php?r=site/index">
				<?php echo CHtml::submitButton("Anasayfa'ya Don");?></a><br/><br/> </div>
