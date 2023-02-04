<?php
function getImagesList(string $dir = 'img'): array
{
	$listFiles = scandir($dir);
	$count = count($listFiles);
	$return = [];
	for($i=0; $i<$count; $i++){
		if (is_file($dir."/".$listFiles[$i])){
			$return[] = "/img/".$listFiles[$i];
		}
	}
	return $return;
}

function parseTpl(string $key, string $value): string
{
	$tpl = '<div class="services" >
			<a href="__file_name__" target="_blank" >
				<img src="__file_name__">
			</a>
			</div>';
	return str_replace('__'.$key.'__', $value, $tpl);
}



?>