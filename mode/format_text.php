<?php
if(!empty($_POST))
{
	echo '<div class="output" style="padding: 10px; margin-top: 10px;background: black; color: white;">';
		$a = $_POST['code'];

		$a = explode("\n", $a);
		foreach($a AS $b => $c)
		{
			$c = strtolower($c);
		    $c = ucfirst($c);
			echo $c;
		  echo '<br>';
		}
	echo '</div>';
}