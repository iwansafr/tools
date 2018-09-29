<?php
if(!empty($_POST))
{
	echo '<div class="output" style="padding: 10px; margin-top: 10px;background: black; color: white;">';
		$a = $_POST['code'][0];
		$b = $_POST['code'][1];
		$i_a = $_POST['index'][0];
		$i_b = $_POST['index'][1];
		if(!empty($a))
		{
			$i_a = explode(',', $i_a);
			pr($i_a);
			$a = str_replace("'", '', $a);
			$a_n = explode("\n", $a);
			$newa = array();
			foreach ($a_n as $key => $value)
			{
				$newa[] = explode("\t", $value);
			}
		}
		if(!empty($b))
		{
			$i_b = explode(',', $i_b);
			pr($i_b);
			$b = str_replace("'", '', $b);
			$b_n = explode("\n", $b);
			$newb = array();
			foreach ($b_n as $key => $value)
			{
				$newb[] = explode("\t", $value);
			}
		}
		$data = array();
		foreach ($newa as $akey => $avalue)
		{
			foreach ($newb as $bkey => $bvalue) {
				if(strtolower($avalue[0]) == strtolower($bvalue[0]))
				{
					$fielda = array();
					$fieldb = array();
					if(!empty($i_a))
					{
						foreach ($i_a as $iakey => $iavalue)
						{
							$fielda[] = $avalue[$iavalue];
						}
					}
					if(!empty($i_b))
					{
						foreach ($i_b as $ibkey => $ibvalue)
						{
							$fieldb[] = $bvalue[$ibvalue];
						}
					}
					$new_field = array_merge($fieldb,$fielda);
					$data[] = $new_field;
				}
			}
		}
		if(!empty($data))
		{
			$i = count($data[0]);
			foreach ($data as $key => $value)
			{
				for($j=0;$j<$i;$j++){
					echo $value[$j]."\t";
				}
				echo '<br>';
			}
		}
		pr($data);
	echo '</div>';
}