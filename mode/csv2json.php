<?php
if(!empty($_POST))
{
	echo '<div class="output" style="padding: 10px; margin-top: 10px;background: black; color: white;">';
		$b = $_POST['code'];
		$b = ','.$b;
		$b = preg_replace('~[\n]~', ',', $b);
		$b = str_replace(',,', ',', $b);
		$a = explode(',',$b);
		$number = 0;
		$title = array();
		foreach ($a as $key => $value) 
		{
			if(preg_match('~[\r\n]~',$value))
			{
				$value = explode("\n", $value);
				$value = $value[0];
				$value = preg_replace('~[\r\n]~', '', $value);
				$value = str_replace("'", '', $value);
				unset($a[$key]);
				$title[] = $value;
				break;
			}
			$value = str_replace("'", '', $value);
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
		$new_a = array();
		foreach ($a as $key => $value) 
		{
			$value = str_replace("\r", '', $value);
			$new_a[$key] = str_replace("'",'',$value);
		}
		foreach ($new_a as $key => $value) 
		{
			$data[$j][$title[$i]] = $value;
			$i++;
			if($number == $i){
				$i = 0;
				$j++;
			}
		}
		$data = json_encode($data);
		echo $data;
	echo '</div>';
}