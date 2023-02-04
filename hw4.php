<?php
include ('lib/functions.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatable" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section class="main">

		<div class="flex_container" >
			<?php
				$listFoto = getImagesList('img');
				foreach ($listFoto as $fileName) {
				    echo parseTpl('file_name', $fileName);
				}
			?>
			
		</div>

		<div class="button">
			<form enctype="multipart/form-data" action="upload.php" method="POST">
				Загрузить изображение: <input name="userfile" type="file" />
				<input class="button" type="submit" value="Загрузить" />
			</form>
		</div>
	<footer>
		
	</footer>
	</section>
</body>

</html>