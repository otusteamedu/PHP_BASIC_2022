<?php
include "lib/class.db.php";
$db = new servise_db();

include "lib/functions.php";

session_start();
$USER = [];

if (!empty($_SESSION['token'])){
	$USER = loginByToken($_SESSION['token']);
}


?>