<?php
include ('lib/ini.php');
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
		<?php
		$resultUpload = uploadFile();
		if ($resultUpload['error'])
    		echo $resultUpload['text']."<br>";

		?>
		<div class="flex_container" >
			<?php
				echo getImagesList('img', $isLogined);
			?>
			
		</div>
		<?php
		if ($isLogined){
			?>
				<div class="button">
					<form enctype="multipart/form-data" action="" method="POST">
						Загрузить изображение: <input name="userfile" type="file" />
						<input class="button" type="submit" value="Загрузить" />
					</form>
				</div>
			<?php
		} else {
			include ('loginForm.php');
		}

		?>
	<footer>
		
	</footer>
	</section>
</body>

</html>