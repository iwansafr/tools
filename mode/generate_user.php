<?php
if(!empty($_POST))
{
	echo '<div class="output" style="padding: 10px; margin-top: 10px;background: black; color: white;">';
		$a = $_POST['code'];
		$a = explode("\n", $a);
		foreach($a AS $b => $c)
		{
			$c = strtolower($c);
			$c = str_replace("'", '', $c);
			$c = str_replace("  ", ' ', $c);
			$c = str_replace(' ', '_', $c);
			if(!empty($_POST['separator']))
			{
				$c = str_replace(' ', $_POST['separator'], $c);
			}
			if(!empty($_POST['front_add']))
			{
				$c = $_POST['front_add'].$c;
			}
			if(!empty($_POST['end_add']))
			{
				$c .= $_POST['end_add'];
			}
			echo $c;
			echo '<br>';
		}
	echo '</div>';
}