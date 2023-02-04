<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

<main>

<?php
include $root."lib/ini.php";
$db = new servise_db();
$searchString = '';
if (isset($_POST['start']) && isset($_POST['search']) && $_POST['search'] != ''){
	$searchString = $_POST['search'];
}

$listBooks = getBooks($searchString);

?>
<table class="table table-striped" >
	<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">название</th>
			<th scope="col">автор</th>
			<th scope="col">кол-во страниц</th>
			<th scope="col">жанр</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($listBooks as $k => $book){
			echo showBookTpl($book);
		}
		?>
	</tbody>
</table>
<form method="POST" action="">
	<div class="form-group">
		ПОИСК: <input  class="form-control" type="text" name="search" value="<?=$searchString?>" placeholder="Введите название или автора">
		<input class="btn btn-primary mb-2" type="submit" name="start" value="Искать">
		<?php 
		if ($searchString){
			?>
			<input class="btn btn-secondary mb-2" type="submit" name="reset" value="Сбросить">
			<?
		}
		?>
	</div>

</form>

</main>

</body>
</html>
