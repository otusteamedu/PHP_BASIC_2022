<?php
function getImagesList(string $dir = 'img'): array
{
	$listFiles = scandir($dir);
	$count = count($listFiles);
	$return = [];
	for($i=0; $i<$count; $i++){
		if (is_file($dir."/".$listFiles[$i]) && is_file($dir."/thumbs/".$listFiles[$i])){
			$return[] = $listFiles[$i];
		}
	}
	return $return;
}

function getImageTpl(string $filName, string $folder = 'img'): string
{
	global $USER;
	$tpl = '<div class="services" >';
	if ($USER) $tpl .= '<a href="'.$folder.'/'.$filName.'" target="_blank" >';
	$tpl .= '<img src="'.$folder.'/thumbs/'.$filName.'">';
	if ($USER) $tpl .= '</a>';			
	$tpl .= '</div>';
	return $tpl;
}

function uploadFile(): array
{
	$return = [];
	$return['error'] = 0;
	if (isset($_FILES["userfile"]["type"])){
	    if(strstr($_FILES["userfile"]["type"], 'image')){
			include('lib/resize.php');
			$tmp_name = $_FILES["userfile"]["tmp_name"];
			$salt = uniqid();
			$name = "img/".$salt."_".$_FILES["userfile"]["name"];
			if (move_uploaded_file($tmp_name, $name)) {
				if (!imagepng(resize_image($name, 100, 100), "img/thumbs/".$salt."_".$_FILES["userfile"]["name"])){
					$return['error'] = 1;
					$return['text'] = 'Ошибка создания миниатюры';
				}
			} else {
				$return['error'] = 1;
				$return['text'] = 'Ошибка загрузки';
			}
		} else {
			$return['error'] = 1;
			$return['text'] = 'Не допустимый формат файла';
		}
	} else {
		$return['error'] = 1;
		$return['text'] = 'Ошибка загрузки';
	}
	return $return;
}

function login(string $user_name, string $password): array
{
	global $db;
	$user_name = strtolower($user_name); 
	$sql = "SELECT *
			FROM `users`
			WHERE `login` = '".$db->escape_string($user_name)."' 
					AND `password` = MD5('".$db->escape_string($password)."')
			LIMIT 1";
	$result = $db->fetchAll($sql);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function loginByToken(string $token): array
{
	global $db;
	$user_name = strtolower($user_name); 
	$sql = "SELECT *
			FROM `users`
			WHERE `token` = '".$db->escape_string($token)."' 
			LIMIT 1";
	$result = $db->fetchAll($sql);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function setToken(string $user_id): string
{
	global $db;
	$token = uniqid(); 
	$sql = "UPDATE `users`
        SET `token` = '".$db->escape_string($token)."'
        WHERE `id` = '".(int)$user_id."'
        LIMIT 1
        ";
    $db->query($sql);
    return $token;
}


?>