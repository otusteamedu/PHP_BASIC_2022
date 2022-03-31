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
                <strong>Галерея фотографий</strong>
            </a>
        </div>
    </div>
</header>

<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <? for ($i = 2; $i < count($array_of_photos); $i++) { 
                    $photo[$i] = "/otus/img/album" . "/" . $array_of_photos[$i];?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?= $photo[$i] ?>" class="img-fluid" alt="photo">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $array_of_photos[$i] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <? } ?>
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

