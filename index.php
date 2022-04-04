<?php

/**
 * Задание 1
 * Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и
 * форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать
 * с помощью свойства width. Галерея должна собираться средствами PHP (scandir)
 */

$imageDir    =  dirname(__FILE__) . '\img\album';
$array_of_photos = scandir($imageDir);

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
                <?php for ($i = 2; $i < count($array_of_photos); $i++) {
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

