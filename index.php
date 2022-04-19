<?php

define('ROOT', dirname(__FILE__));

$file_system = ROOT . '/fyb-system/router.php';
if (file_exists($file_system))
	require_once($file_system);
else
	die('Что-то пошло не так...');

$router = new System();
$router->run();