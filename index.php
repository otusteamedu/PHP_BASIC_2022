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
 */

// директория с изображениями
$imageDir    =  dirname(__FILE__) . '\img\album/';
if (!is_dir($imageDir))
    mkdir($imageDir);

// Массив допустимых значений типа файла
$array_types_of_photo = array(
    'image/gif', 
    'image/png',
    'image/jpeg'
);

function imageResize($imageResourceId,$width,$height) {
    $targetWidth =400;
    $targetHeight =225;
    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    return $targetLayer;
}

// Максимальный размер файла, в байтах
$max_size_of_photo = 1048576;

// загрузка фотографии
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(is_array($_FILES)) {
        if(!empty($_POST['form_token']) && $_POST['form_token'] !== 'afg37rv32')
            die('Подделка запроса!');

        // проверяем тип файла
        if (!in_array($_FILES['upload']['type'], $array_types_of_photo))
            die('Запрещённый тип файла!');

        // проверяем размер файла
        if ($_FILES['upload']['size'] > $max_size_of_photo)
            die('Слишком большой размер файла!');

        $sourceProperties = getimagesize($_FILES['upload']['tmp_name']);
        $fileNewName = time();
        $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];

        switch ($imageType) {

            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($_FILES['upload']['tmp_name']);
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$imageDir. "preview-". $fileNewName. ".". $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($_FILES['upload']['tmp_name']);
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$imageDir. "preview-". $fileNewName. ".". $ext);
                break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($_FILES['upload']['tmp_name']);
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$imageDir. "preview-". $fileNewName. ".". $ext);
                break;

            default:
                echo "Проблема с обработкой фотографии на сервере";
                break;
        }

        if (!move_uploaded_file($_FILES['upload']['tmp_name'], $imageDir. $fileNewName. ".". $ext))
            die('Что-то пошло не так');
    }
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
                        <input type="file" name="upload" accept=".jpeg, .jpg, .png, .gif" multiple/>
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
                $array_of_photos = glob($imageDir . '/preview-*.{jpg,jpeg,gif,png}', GLOB_BRACE);
                foreach ($array_of_photos as $filename) {
                    $photo_preview = './img/album/' . basename($filename);
                    $photo = str_replace('preview-', '', $photo_preview);
                    $exif = exif_read_data($photo, 0, true); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <a href="<?= $photo ?>" target="_blank"><img src="<?= $photo_preview ?>" class="img-fluid" alt="<?= $exif['FILE']['FileName'] ?>"></a>
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
                <?php }?>
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

