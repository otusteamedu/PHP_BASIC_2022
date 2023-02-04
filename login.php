<?php
include ('lib/ini.php');
$USER = [];

if(!empty($_POST['user']) && !empty($_POST['password'])) {
	$USER = login($_POST['user'], $_POST['password']);
    if($USER) {
        $_SESSION['token'] = setToken($USER['id']);
		header('Location: /hw4.php');
    }
}

if(!$USER){
	include ('loginForm.php');
}
?>