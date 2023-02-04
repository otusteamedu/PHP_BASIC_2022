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
	$tpl = '<div class="services" >
			<a href="'.$folder.'/'.$filName.'" target="_blank" >
				<img src="'.$folder.'/thumbs/'.$filName.'">
			</a>
			</div>';
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


?>