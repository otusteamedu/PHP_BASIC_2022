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
    $files = excess($files);
    $arr = explode(".", $files['name']);
    $ext = mb_strtolower($arr[count($arr) - 1]);
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($ext, $allowed)) {
        for ($i = 0; $i < count($files); $i++) {
    ?>
            <a href="<?= $dir_big . "/" . $files[$i] ?>" target="_blank"><img style="width: 300px; height: 200px" src="<?= $dir . "/" . $files[$i] ?>" alt="Фото галереи" /></a>
    <?php
        }
    }
    ?>
</body>

</html>