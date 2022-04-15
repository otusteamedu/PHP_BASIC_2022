<?php
    include_once 'db.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTUSLib</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<table class="table">
  <thead>
    <tr>
      <th>№ книги</th>
      <th>Название</th>
      <th>Автор</th>
      <th>Кол-во стр.</th>
      <th>Дата</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if(!empty($_GET['action']) && $_GET['action'] === 'filter' && !empty($_POST['filter_book']))
    {
        $data = db_get_all_book($_POST['filter_book']);
    } else {
        $data = db_get_all_book();
    }
    foreach ($data as $otus_book) {
        echo "<tr><th>{$otus_book['book_id']}</th> 
        <th>{$otus_book['book_name']}</th>  
        <th>{$otus_book['book_author']}</th> 
        <th>{$otus_book['book_page']}</th>
        <th>{$otus_book['book_created_dt']}</th></tr> ";

    }
    ?>
  </tbody>
</table>
<hr>
    <h3>Поиск книги по названию</h3>
    <form action="/index.php?action=filter" method="post">
        <label for="filter_book">Укажите название:</label>
        <input type="text" name="filter_book" /><br>
        <input type="submit" value="Найти">
    </form>
<hr>
</html>



