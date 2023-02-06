<?php
include ('lib/ini.php');
$USER = [];

if(!empty($_POST['user']) && !empty($_POST['password'])) {
	$USER = login_Bind($db, $_POST['user'], $_POST['password']);
    if($USER) {
        $_SESSION['token'] = setToken_Bind($db, $USER['id']);
		header('Location: /hw4.php');
    }
}

if(!$USER){
	include ('loginForm.php');
}
?>