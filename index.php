<?php
const DIR_IMG = 'img';

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

        $files = preg_grep('~\.(jpeg|jpg|png|gif)$~', scandir(DIR_IMG));

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
                                        src="<?= DIR_IMG . '/' . $col ?>" class="card-img-top"
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