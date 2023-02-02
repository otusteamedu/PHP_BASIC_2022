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
				$listFiles = scandir('img');

				$count = count($listFiles);
				for($i=0; $i<$count; $i++){
					if (is_file("img/".$listFiles[$i])){
						?>
						<div class="services" >
							<a href="/img/<?=$listFiles[$i]?>" target="_blank" >
								<img src="/img/<?=$listFiles[$i]?>">
							</a>
						</div>
						<?
					}
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