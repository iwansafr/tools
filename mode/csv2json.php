<?php
if(!empty($_POST))
{
	echo '<div class="output" style="padding: 10px; margin-top: 10px;background: black; color: white;">';
		$a = explode(',',$_POST['code']);
		$number = 0;
		$title = array();
		foreach ($a as $key => $value) 
		{
			if(preg_match('~[\r\n]~',$value))
			{
				$value = preg_replace('~[\r\n]~', '', $value);
				unset($a[$key]);
				$title[] = $value;
				break;
			}
			if(!empty($value))
			{
				$title[] = $value;
			}
			unset($a[$key]);
			$number++;
		}

		$data = array();
		$i = 0;
		$j = 0;
		foreach ($a as $key => $value) 
		{
			$data[$j][$title[$i]] = $value;
			$i++;
			if($number == $i){
				$i = 0;
				$j++;
			}
		}
		$data = json_encode($data);
		pr($data);
	echo '</div>';
}