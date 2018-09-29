<?php
function site_url()
{
	global $config;
	$url = $config['url'];
	return $url;
}

function encrypt($string = '')
{
	$key = '';
	if(!empty($string))
	{
		$key = password_hash($string, PASSWORD_DEFAULT);
	}
	return $key;
}