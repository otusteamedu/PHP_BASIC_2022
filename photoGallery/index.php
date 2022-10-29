<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Галерея фото</title>
</head>

<body style="text-align: center; background: cadetblue;">
    <h1 style="color: antiquewhite;">Галерея фотографий</h1>

    <?php
    require_once('function.php');
    $dir = "img_small";
    $dir_big = "img_big";
    $files = scandir($dir);
    $files = extension($files);
    for ($i = 0; $i < count($files); $i++) {
    ?>
        <a href="<?= $dir_big . "/" . $files[$i] ?>" target="_blank"><img src="<?= $dir . "/" . $files[$i] ?>" alt="Фото галереи" style="width: 500px; height:300px" /></a>
    <?php
    }
    ?>

    <h2 style="color:brown;">Загрузить фотографию</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="load" value="Загрузить файл">
</body>

</html>