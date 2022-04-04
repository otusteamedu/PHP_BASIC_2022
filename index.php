<?php

/**
 * $_FILES это массив загруженных файлов
 * $_FILES['upload']['name'] – название загружаемого файла
 * $_FILES['upload']['size'] – размер файла в байтах
 * $_FILES['upload']['type'] – MIME-тип загруженного файла
 * $_FILES['upload']['tmp_name'] – название загружаемого файла во временном каталоге,
 *      Вначале он загружается во временную директорию сервера, а затем обрабатывается  * с помощью PHP интерпритатора.
 *      По окончанию сессии временный файл автоматически удаляется.
 *      Именно этот параметр и используется для перемещения файлов после загрузки.
 * $_FILES[' picture ']['error'] – код ошибки.
 */

// директория с изображениями
$imageDir    =  dirname(__FILE__) . '\img\album/';
if (!is_dir($imageDir))
    mkdir($imageDir);

// директория с уменьшенными копиями
$imageDirSmall    =  dirname(__FILE__) . '\img\albumsmall/';
if (!is_dir($imageDirSmall))
    mkdir($imageDirSmall);

// Массив допустимых значений типа файла
$array_types_of_photo = array(
    'image/gif', 
    'image/png',
    'image/jpg', 
    'image/bmp', 
    'image/jpeg'
);

// Максимальный размер файла, в байтах
$max_size_of_photo = 1048576;

// загрузка фотографии
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['form_token']) && $_POST['form_token'] !== 'afg37rv32')
        die('Подделка запроса!');

    // проверяем тип файла
    if (!in_array($_FILES['upload']['type'], $array_types_of_photo))
        die('Запрещённый тип файла!');

    // проверяем размер файла
    if ($_FILES['upload']['size'] > $max_size_of_photo)
        die('Слишком большой размер файла!');

    if (!@copy($_FILES['upload']['tmp_name'], $imageDir . $_FILES['upload']['name']))
        die('Что-то пошло не так');
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Галерея фотографий</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tyle.css">
</head>

<body>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container justify-content-between">
            <a href="#" class="navbar-brand align-items-center">
                <strong>Галерея котиков</strong>
            </a>
        </div>
    </div>
</header>

<section>
    <div class="album pt-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="file" name="upload" accept=".jpg, .jpeg, .png, .gif, .bmp" multiple/>
                        <input type="hidden" name="form_token" value="afg37rv32"/>
                        <input type="submit" value="Загрузить фото котика"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php 
                    $array_of_photos = scandir($imageDir);
                    for ($i = 2; $i < count($array_of_photos); $i++) {
                    $photo[$i] = "./img/album" . "/" . $array_of_photos[$i];
                    $exif = exif_read_data($photo[$i], 0, true); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <a href="<?= $photo[$i] ?>" target="_blank"><img src="<?= $photo[$i] ?>" class="img-fluid" alt="<?= $exif['FILE']['FileName'] ?>"></a>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php
                                    echo "Размер: ".$exif['FILE']['FileSize']." bytes<br>";
                                    echo "Дата загрузки: ".date ("d F Y",$exif['FILE']['FileDateTime'])."<br>";
                                    echo "MIME-тип: ".$exif['FILE']['MimeType']."<br>";
                                    echo "Ширина: ".$exif['COMPUTED']['Width']."<br>";
                                    echo "Высота: ".$exif['COMPUTED']['Height']."<br>";
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Наверх</a>
        </p>
        <p>© 2022-<?= date("Y") ?> OTUS онлайн-образование </p>
        <p>PHP Developer. Basic</p>
    </div>
</footer>

</body>
</html>

