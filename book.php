 <?php
    include_once 'db.php';

   $data = db_get_the_bookinfo($_GET['book_id']);
   foreach ($data as $otus_albom) {
        $_GET['book_name'] = $otus_albom['book_name'];
        $_GET['book_author'] = $otus_albom['book_author'];
    }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTUS Lib</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
</head>

<a href=index.php>На главную</a>

<body>
<?php echo "<h2>Информация о книге: {$_GET['book_name']}</h2> <h3>(автор: {$_GET['book_author']})</h3><br>"; ?>
<h3>Обложки изданий</h3>
<body>
  <script src="js/lightbox-plus-jquery.js"></script>
</body>
<?php
   $data = db_get_all_imgbook($_GET['book_id']);
   foreach ($data as $otus_imgbook) {
       echo "<tr><th><a href=\"/images/{$otus_imgbook['picture_full']}\" data-lightbox='oblozka' data-title='Обложки' >
       <img width=150px src=\"/images/{$otus_imgbook['picture']}\" /></a></th>   ";
    }
?>
