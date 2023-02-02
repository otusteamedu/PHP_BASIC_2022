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
		if (isset($_FILES["userfile"]["type"])){
		    if(strstr($_FILES["userfile"]["type"], 'image')){
		    	include('lib/resize.php');
				$tmp_name = $_FILES["userfile"]["tmp_name"];
				$salt = uniqid();
		    	$name = "img/".$salt."_".$_FILES["userfile"]["name"];
		    	move_uploaded_file($tmp_name, $name);
		    	imagepng(resize_image($name, 100, 100), "img/thumbs/".$salt."_".$_FILES["userfile"]["name"]);
		    } else {
		    	echo "Не допустимый формат файла.";
		    }
		}

		?>

		<div class="flex_container" >
			<?php
				$listFiles = scandir('img');

				$count = count($listFiles);
				for($i=0; $i<$count; $i++){
					if (is_file("img/".$listFiles[$i]) && is_file("img/thumbs/".$listFiles[$i])){
						?>
						<div class="services" >
							<a href="/img/<?=$listFiles[$i]?>" target="_blank" >
								<img src="/img/thumbs/<?=$listFiles[$i]?>">
							</a>
						</div>
						<?
					}
				}
			?>
			
		</div>

		<div class="button">
			<form enctype="multipart/form-data" action="" method="POST">
				Загрузить изображение: <input name="userfile" type="file" />
				<input class="button" type="submit" value="Загрузить" />
			</form>
		</div>
	<footer>
		
	</footer>
	</section>
</body>

</html>