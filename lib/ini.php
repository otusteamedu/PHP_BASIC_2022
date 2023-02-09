<?php
session_start();
include "lib/config.php";
include "lib/class.db.php";
$db = new servise_db();

include "lib/functions.php";

$USER = [];
$isLogined = false;

if (!empty($_SESSION['token'])){
	$USER = loginByToken_Bind($db, $_SESSION['token']);
	if ($USER){
		$isLogined = true;
		$isAdmin = $USER['admin'] ? true : false;
	}
}


?>