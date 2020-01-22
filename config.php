<?php
$config = array(
	'url' => 'http://localhost/tools/',
	'db'  => 'sipapat',
	'host' => 'localhost',
	'user_db' => 'root',
	'pass_db' => 'toor'
);

$db = mysqli_connect($config['host'],$config['user_db'], $config['pass_db'], $config['db']);


include 'function.php';