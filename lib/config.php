<?php
function getConfigBD(string $key): string 
{
	$config = [];
	$config['host'] = 'localhost';
	$config['user'] = 'root';
	$config['password'] = '';
	$config['bd_name'] = 'otus';

	if (isset($config[$key])){
		return $config[$key];
	}
	return '';
}

?>