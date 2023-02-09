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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
</head>
<body>
	<section class="main">
		<?php
		if ($isLogined){
			$resultUpload = uploadFile((int)$_POST['book_id']);
			if ($resultUpload['error'])
	    		echo $resultUpload['text']."<br>";

			?>
			<div class="flex_container" >
				<?php
					echo getImagesList('img', (int)$_GET['id']);
				?>
				
			</div>
			<div>
				<a class="button" href="/hw8.php" >назад к списку</a>
			</div>
			<?php
			if ($isAdmin)
			{
			?>
				<div class="button">
					<form enctype="multipart/form-data" action="" method="POST">
						<input type="hidden" name="book_id" value="<?=$_GET['id']?>">
						Загрузить изображение: <input name="userfile" type="file" />
						<input class="button" type="submit" value="Загрузить" />
					</form>
				</div>
			<?php
			}
		} else {
			include ('loginForm.php');
		}

		?>
	<footer>
		
	</footer>
	</section>

<script type="text/javascript">
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });

</script>
</body>

</html>