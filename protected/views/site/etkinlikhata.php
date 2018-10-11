<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
echo '<div class="flash-' . $key . '">' . $message . "</div>\n";}?>
<div class="registerLink"><a class="submitButon" href="index.php?r=site/etkinlikekle">
				<?php echo CHtml::submitButton("Geri Dön");?></a><br/><br/> </div>
