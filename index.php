<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet">
<title>Галерея фотографий</title>
</head>
<body>
<h1>Галерея фотографий</h1>
<form>

	<form method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<input type="submit" value="Загрузить файл!" />
	<br> <br>
	
<?php

	$dir = "img";
	$files = scandir($dir);
	
	foreach($files as $f){
		if(!($f == '.' || $f == '..')){
		echo "<a href='img/$f' target= 'blank'>";
		echo "<img src='img/$f' width='100' height='70' />";
		echo "<a/>";
		}
	}
	
?>	
	
	</form>
	</body>
	</html>
	