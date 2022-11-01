<?php
const DIR_IMG = 'img';

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
            Не выбран файл!
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
    function showAlert() {
        let alert = document.getElementById('alert')
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
if ($_POST) {
    if (isset($_POST['submit']) && isset($_FILES['image'])) {
        if ($_FILES['image']['size'] === 0) {
            ?>
            <script>showAlert()</script>
            <?php
        } else {
            if (!is_dir(DIR_IMG)) {
                mkdir(DIR_IMG, 0755, true);
            }

            $new_file = DIR_IMG . '/' . $_FILES['image']['name'];

            copy($_FILES['image']['tmp_name'], $new_file);
        }
    }
}
?>

<section class="container">
    <div class="mt-3">
        <?php
        $directory = scandir(DIR_IMG);
        $scanned_directory = array_diff($directory, array('..', '.'));

        $rows = getRowsData($scanned_directory, 3);

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