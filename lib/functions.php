<?php
function getImagesList(string $dir = 'img', bool $isLogined = false): string
{
	$listFiles = scandir($dir);
	$count = count($listFiles);
	$return = '';
	$tpl = getImageTpl($isLogined);
	$tpl = parseTpl($tpl, 'folder', $dir);
	for($i=0; $i<$count; $i++){
		if (is_file($dir."/".$listFiles[$i]) && is_file($dir."/thumbs/".$listFiles[$i])){
			$return .= parseTpl($tpl, 'file_name', $listFiles[$i]);

		}
	}
	return $return;
}

function getImageTpl(bool $isLogined = false): string
{
	if ($isLogined){
		$tpl = '<div class="services" >
					<a href="__folder__/__file_name__" target="_blank" >
						<img src="__folder__/thumbs/__file_name__">
					</a>
				</div>';
	} else {
		$tpl = '<div class="services" >
					<img src="__folder__/thumbs/__file_name__">
				</div>';
	}
	return $tpl;
}

function parseTpl(string $tpl, string $key, string $value): string
{
	return str_replace('__'.$key.'__', $value, $tpl);
}

function uploadFile(): array
{
	$return = [];
	$return['error'] = 0;
	if (isset($_FILES) && $_FILES){
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
	}
	return $return;
}

function login(object $db, string $user_name, string $password): array
{
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

function loginByToken(object $db, string $token): array
{
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

function loginByToken_Bind(object $db, string $token): array
{
	$sql = "SELECT id, login, admin, token
			FROM users
			WHERE token = ?
			LIMIT 1";
	$result = $db->fetchBind($sql, 's', ['id', 'login', 'admin', 'token'], [$token]);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function login_Bind(object $db, string $user_name, string $password): array
{
	$user_name = strtolower($user_name); 
	$sql = "SELECT id, login, admin, token
			FROM users
			WHERE login = ? AND `password` = MD5(?)
			LIMIT 1";
	$result = $db->fetchBind($sql, 'ss', ['id', 'login', 'admin', 'token'], [$user_name, $password]);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function setToken(object $db, int $user_id): string
{
	$token = uniqid(); 
	$sql = "UPDATE `users`
        SET `token` = '".$db->escape_string($token)."'
        WHERE `id` = '".(int)$user_id."'
        LIMIT 1
        ";
    $db->query($sql);
    return $token;
}

function setToken_Bind(object $db, int $user_id): string
{
	$token = uniqid(); 
	$sql = "UPDATE users
        SET token = ?
        WHERE id = ?
        LIMIT 1
        ";
    $db->updateBind($sql, 'is', [$token, $user_id]);
    return $token;
}


?>