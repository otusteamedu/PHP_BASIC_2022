<?php

include ('lib/ini.php');

if(isset($_POST['act'])){
	$act = $_POST['act'];
} else {
    echo 'Ошибка';
}
switch($act){
    case 'remove_book':
    	$id = (int)$_POST['id'];
    	if (deleteBook_Bind($db, $id, $isAdmin)){
    		echo $id;
    	}
    break;
	default:
        echo "Ошибка";
    break;
}
?>