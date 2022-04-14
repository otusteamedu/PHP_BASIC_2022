<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first html page</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    //Создать галерею фотографий. Она должна состоять всего из одной странички, на которой
    // пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения.
    // При клике на фотографию она должна открыться в браузере в новой вкладке.
    // Размер картинок можно ограничивать с помощью свойства width.
    // Галерея должна собираться средствами PHP (scandir)

    //Критерии оценки:
    //
    //    На странице не выводятся несуществующие файлы
    //    Миниатюры имеют выравнивание по высоте
    //    Фотография полного размера должна выводиться на отдельной странице

    $imgDir = './img/';
    if(!empty($_FILES)){
        $uploadFile = $imgDir . basename($_FILES['user_image']['name']);
        echo '<pre>';
        if (move_uploaded_file($_FILES['user_image']['tmp_name'], $uploadFile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }
        echo "</pre>";
    }


    $filesArray = scandir($imgDir);
    foreach ($filesArray as $fileName){
        $filePath = $imgDir . $fileName;
        if(str_contains($fileName, '.jpg')){
            echo "<a target='_blank' href='". $filePath ."'><img src=". $filePath ." ></a>";
        }
    }

    ?>
    <p>
        Добавить изображение в галерею
    </p>
    <form enctype="multipart/form-data" method="post">
        <p>
            <input type="file" name="user_image" accept="image/jpeg">
            <input type="submit" value="Отправить">
        </p>
    </form>

</body>
</html>