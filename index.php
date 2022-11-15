<?php
const DIR_IMG = 'img';
const DIR_IMG_PREVIEW = 'img/preview';

/**
 * Функция для изменения размера файла
 *
 * @param string $filePath путь к файлу
 * @param int $w ширина изображения
 * @param int $h высота изображения
 * @param bool $crop
 * @return GdImage|bool
 */
function resize_image(string $filePath, int $w, int $h, bool $crop = false)
{
    list($width, $height) = getimagesize($filePath);
    $r = $width / $height;

    if ($crop) {
        if ($width > $height) {
            $width = ceil($width - ($width * abs($r - $w / $h)));
        } else {
            $height = ceil($height - ($height * abs($r - $w / $h)));
        }
        $newWidth = $w;
        $newHeight = $h;
    } else {
        if ($w / $h > $r) {
            $newWidth = $h * $r;
            $newHeight = $h;
        } else {
            $newHeight = $w / $r;
            $newWidth = $w;
        }
    }

    $extension = getExtension($filePath);
    $funcName = 'imagecreatefrom' . $extension;

    $src = $funcName($filePath);

    $dst = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    return $dst;
}

/**
 * Функция возвращает расширение файла
 *
 * @param string $filePath
 * @return string
 */
function getExtension(string $filePath): string
{
    $res = pathinfo($filePath)['extension'];
    if ($res == 'jpg') $res = 'jpeg';

    return $res;
}

/**
 * Функция собирает массив фотографий, где количество элементов строки для вывода равно значению переменной $col
 *
 * @param array $files массив всех фотографий для вывода
 * @param int $col количество фотографий для вывода в одной строке
 * @return array
 */
function getRowsData(array $files, int $col): array
{
    $res = [];
    $tmpCol = 0;
    $tmpRow = 0;
    foreach ($files as $file) {
        if ($tmpCol == $col) {
            $tmpCol = 0;
            $tmpRow++;
        }

        $res[$tmpRow][] = $file;
        $tmpCol++;
    }

    return $res;
}

/**
 * Функция проверяет отправленный файл и возвращает массив с информацией, успешная проверка или нет
 *
 * @return array array('status' => 'true or false', 'message' => 'string')
 */
function checkFile(): array
{
    $res = [
        'status' => true,
        'message' => ''
    ];

    if ($_FILES['image']['size'] === 0) {
        $res = [
            'status' => false,
            'message' => 'Не выбран файл!'
        ];
    } elseif ($_FILES['image']['error'] !== 0) {
        $res = [
            'status' => false,
            'message' => 'Ошибка при загрузке файла, попробуйте еще раз'
        ];

    } elseif (!is_uploaded_file($_FILES['image']['tmp_name'])) {
        $res = [
            'status' => false,
            'message' => 'Возможная атака с участием загрузки файла'
        ];
    } elseif ($_FILES['image']['type'] !== 'image/png' &&
        $_FILES['image']['type'] !== 'image/gif' &&
        $_FILES['image']['type'] !== 'image/jpeg') {
        $res = [
            'status' => false,
            'message' => 'Выбранный файл не является фотографией!'
        ];
    }

    return $res;
}

/**
 * Функция сохраняет файл в папку.
 *
 * @return array array('status' => 'true or false', 'message' => 'string')
 */
function uploadFile(): array
{
    $res = [
        'status' => true,
        'message' => ''
    ];

    checkUploadDir();

    $tmpName = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];

    if (!move_uploaded_file($tmpName, DIR_IMG . "/$name")) {
        $res = [
            'status' => false,
            'message' => 'Не удалось сохранить файл!'
        ];
    }

    $resizeImage = resize_image(DIR_IMG . "/$name", 500, 500);
    $funcName = 'image' . getExtension(DIR_IMG . "/$name");
    if (!$funcName($resizeImage, DIR_IMG_PREVIEW . "/$name")) {
        $res = [
            'status' => false,
            'message' => 'Не удалось сохранить превью файла!'
        ];
    }

    return $res;
}

/**
 * Функция проверяет существует ли папка для загрузки. Если нет, то создает папку
 * @return void
 */
function checkUploadDir(): void
{
    if (!is_dir(DIR_IMG)) {
        mkdir(DIR_IMG, 0755, true);
    }

    if (!is_dir(DIR_IMG_PREVIEW)) {
        mkdir(DIR_IMG_PREVIEW, 0755, true);
    }
}

/**
 * Функция для показа уведомления с ошибкой
 *
 * @param string $message
 * @return void
 */
function showAlert(string $message): void
{
    ?>
    <script>showAlert("<?=$message?>")</script>
    <?php
}

/**
 * Функция для сохранения файла
 *
 * @return void
 */
function saveFile(): void
{
    $result = checkFile();

    if ($result['status']) {
        $result = uploadFile();

        if ($result['status']) {
            return;
        }
    }

    showAlert($result['message']);
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Photo gallery</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
<div>
    <div class="alert alert-danger mt-3" role="alert" style="display: none" id="alert">

    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mx-auto mt-3" style="width: 200px">
            <input type="file" class="form-control-file" name="image" id="image"
                   accept="image/png, image/gif, image/jpeg">
        </div>
        <div class="mx-auto mt-3" style="width: 200px">
            <input type="submit" class="btn btn-success" name="submit" value="Добавить">
        </div>
    </form>
</div>

<script>
    function showAlert(message) {
        let alert = document.getElementById('alert')
        alert.innerText = message
        alert.style.display = ''
    }

    function hideAlert() {
        let alert = document.getElementById('alert')
        alert.style.display = 'none'
    }

    document.getElementById('image').addEventListener('change', function () {
        if (this.value) {
            hideAlert()
        }
    });
</script>

<?php
if ($_POST && isset($_POST['submit']) && isset($_FILES['image'])) {
    saveFile();
}
?>

<section class="container">
    <div class="mt-3">
        <?php
        checkUploadDir();

        $files = preg_grep('~\.(jpeg|jpg|png|gif)$~', scandir(DIR_IMG_PREVIEW));

        $rows = getRowsData($files, 3);

        foreach ($rows as $row) {
            ?>
            <div class="row mt-3 bg-light">
                <?php
                foreach ($row as $col) {
                    ?>
                    <div class="col-4">
                        <div class="card">
                            <a href="<?= DIR_IMG . '/' . $col ?>" target="_blank"><img
                                        src="<?= DIR_IMG_PREVIEW . '/' . $col ?>" class="card-img-top"
                                        alt="<?= $col ?>"></a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
</section>
</body>